<?php

namespace Faker\Provider;

/**
 * Depends on image generation from http://picsum.photos/
 */
class Photo extends Base
{
    /**
     * @var string
     */
    public const BASE_URL = 'https://picsum.photos';

    /**
     * @var array
     */
    protected static $formats = ['jpg', 'webp'];

    /**
     * Generate the URL that will return a random photo
     *
     * Set randomize to false to remove the random GET parameter at the end of the url.
     *
     * @example 'https://picsum.photos/640/480'
     *
     * @param int    $width
     * @param int    $height
     * @param array  $filters
     * @param string $format
     *
     * @return string
     */
    public static function photoUrl(
        $width = 640,
        $height = 480,
        $filters = [],
        $format = 'jpg'
    ) {
        if (!in_array($format, self::$formats, true)) {
            throw new \InvalidArgumentException(sprintf('Format is invalid, must be one of "%s"', implode(', ', self::$formats)));
        }
        $format = strtolower($format);
        $url = sprintf(
            '%s/%d/%d.%s',
            self::BASE_URL,
            $width,
            $height,
            $format
        );

        if (!empty($filters)) {
            $url .= '?' . http_build_query($filters);
        }

        return $url;
    }

    /**
     * Download a remote random photo to disk and return its location
     *
     * Requires curl, or allow_url_fopen to be on in php.ini.
     *
     * @example '/path/to/dir/13b73edae8443990be1aa8f1a483bc27.jpg'
     *
     * @return bool|string
     */
    public static function photo(
        $dir = null,
        $width = 640,
        $height = 480,
        $filters = [],
        $format = 'jpg',
        $fullPath = true
    ) {
        $dir = null === $dir ? sys_get_temp_dir() : $dir; // GNU/Linux / OS X / Windows compatible
        // Validate directory path
        if (!is_dir($dir) || !is_writable($dir)) {
            throw new \InvalidArgumentException(sprintf('Cannot write to directory "%s"', $dir));
        }

        // Generate a random filename. Use the server address so that a file
        // generated at the same time on a different server won't have a collision.
        $name = md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true));
        $filename = $name . '.' . $format;
        $filepath = $dir . DIRECTORY_SEPARATOR . $filename;

        $url = static::photoUrl($width, $height, $filters, $format);

        // save file
        if (function_exists('curl_exec')) {
            // use cURL
            $fp = fopen($filepath, 'w');
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Required for picsum to follow redirect.
            $success = curl_exec($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;
            fclose($fp);
            curl_close($ch);

            if (!$success) {
                unlink($filepath);

                // could not contact the distant URL or HTTP error - fail silently.
                return false;
            }
        } elseif (ini_get('allow_url_fopen')) {
            // use remote fopen() via copy()
            $success = copy($url, $filepath);
        } else {
            return new \RuntimeException('The photo formatter downloads a photo from a remote HTTP server. Therefore, it requires that PHP can request remote hosts, either via cURL or fopen()');
        }

        return $fullPath ? $filepath : $filename;
    }
}
