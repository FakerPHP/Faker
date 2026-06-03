<?php

namespace Faker\Provider;

/**
 * Depends on image generation from https://picsum.photos/
 */
class Image extends Base
{
    /**
     * @var string
     */
    public const BASE_URL = 'https://picsum.photos';

    public const FORMAT_JPG = 'jpg';
    public const FORMAT_JPEG = 'jpeg';
    public const FORMAT_PNG = 'png';

    /**
     * @var array
     *
     * @deprecated Categories are no longer used as a list in the placeholder API but referenced as string instead
     */
    protected static $categories = [];

    /**
     * Generate the URL that will return a random image
     *
     * Set randomize to false to remove the random GET parameter at the end of the url.
     *
     * @example 'https://picsum.photos/640/480'
     *
     * @param int         $width
     * @param int         $height
     * @param string|null $category
     * @param bool        $randomize
     * @param string|null $word
     * @param bool        $gray
     * @param string      $format
     *
     * @return string
     */
    public static function imageUrl(
        $width = 640,
        $height = 480,
        $category = null,
        $randomize = true,
        $word = null,
        $gray = false,
        $format = 'jpg'
    ) {
        trigger_deprecation(
            'fakerphp/faker',
            '1.20',
            'Provider is deprecated and will no longer be available in Faker 2. Please use a custom provider instead',
        );

        $imageFormats = static::getFormats();

        if (!in_array(strtolower($format), $imageFormats, true)) {
            throw new \InvalidArgumentException(sprintf(
                'Invalid image format "%s". Allowable formats are: %s',
                $format,
                implode(', ', $imageFormats),
            ));
        }

        $url = sprintf('%s/%d/%d', self::BASE_URL, $width, $height);

        if (in_array(strtolower($format), ['jpg', 'jpeg'])) {
            $url .= '.jpg';
        } elseif (strtolower($format) === 'png') {
            $url .= '.png';
        }

        $queryParams = [];

        if ($gray === true) {
            $queryParams['grayscale'] = true;
        }

        if ($randomize === true) {
            $queryParams['random'] = mt_rand(1, 100000);
        }

        if (!empty($queryParams)) {
            $url .= '?' . http_build_query($queryParams);
        }

        return $url;
    }

    /**
     * Download a remote random image to disk and return its location
     *
     * Requires curl, or allow_url_fopen to be on in php.ini.
     *
     * @example '/path/to/dir/13b73edae8443990be1aa8f1a483bc27.png'
     *
     * @return bool|string
     */
    public static function image(
        $dir = null,
        $width = 640,
        $height = 480,
        $category = null,
        $fullPath = true,
        $randomize = true,
        $word = null,
        $gray = false,
        $format = 'jpg'
    ) {
        trigger_deprecation(
            'fakerphp/faker',
            '1.20',
            'Provider is deprecated and will no longer be available in Faker 2. Please use a custom provider instead',
        );

        $dir = null === $dir ? sys_get_temp_dir() : $dir;

        if (!is_dir($dir) || !is_writable($dir)) {
            throw new \InvalidArgumentException(sprintf('Cannot write to directory "%s"', $dir));
        }

        $name = md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true));
        $filename = sprintf('%s.%s', $name, $format);
        $filepath = $dir . DIRECTORY_SEPARATOR . $filename;

        $url = static::imageUrl($width, $height, $category, $randomize, $word, $gray, $format);

        if (function_exists('curl_exec')) {
            $fp = fopen($filepath, 'w');
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $success = curl_exec($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;
            fclose($fp);
            curl_close($ch);

            if (!$success) {
                if (file_exists($filepath)) {
                    unlink($filepath);
                }
                return false;
            }
        } elseif (ini_get('allow_url_fopen')) {
            $success = @copy($url, $filepath);

            if (!$success) {
                return false;
            }
        } else {
            return new \RuntimeException('The image formatter downloads an image from a remote HTTP server. Therefore, it requires that PHP can request remote hosts, either via cURL or fopen()');
        }

        return $fullPath ? $filepath : $filename;
    }

    public static function getFormats(): array
    {
        trigger_deprecation(
            'fakerphp/faker',
            '1.20',
            'Provider is deprecated and will no longer be available in Faker 2. Please use a custom provider instead',
        );

        return array_keys(static::getFormatConstants());
    }

    public static function getFormatConstants(): array
    {
        trigger_deprecation(
            'fakerphp/faker',
            '1.20',
            'Provider is deprecated and will no longer be available in Faker 2. Please use a custom provider instead',
        );

        return [
            static::FORMAT_JPG => constant('IMAGETYPE_JPEG'),
            static::FORMAT_JPEG => constant('IMAGETYPE_JPEG'),
            static::FORMAT_PNG => constant('IMAGETYPE_PNG'),
        ];
    }
}