<?php

namespace Faker\Test\Provider;

use Faker\Provider\Photo;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class PhotoTest extends TestCase
{
    public function testPhotoUrlUses640x680AsTheDefaultSize()
    {
        self::assertMatchesRegularExpression(
            '#^https://picsum.photos/640/480.jpg#',
            Photo::photoUrl()
        );
    }

    public function testPhotoUrlAcceptsCustomWidthAndHeight()
    {
        self::assertMatchesRegularExpression(
            '#^https://picsum.photos/800/400.jpg#',
            Photo::photoUrl(800, 400)
        );
    }

    public function testPhotoUrlAcceptsFilters()
    {
        self::assertMatchesRegularExpression(
            '#^https://picsum.photos/800/400.jpg\?grayscale=1.*#',
            Photo::photoUrl(800, 400, ['grayscale' => '1'])
        );

        self::assertMatchesRegularExpression(
            '#^https://picsum.photos/800/400.jpg\?grayscale=1&blur=1.*#',
            Photo::photoUrl(800, 400, ['grayscale' => '1', 'blur' => '1'])
        );
    }

    public function testPhotoUrlAcceptsSupportedFormats()
    {
        self::assertMatchesRegularExpression(
            '#^https://picsum.photos/800/400.jpg#',
            Photo::photoUrl(800, 400, [], 'jpg')
        );

        self::assertMatchesRegularExpression(
            '#^https://picsum.photos/800/400.webp#',
            Photo::photoUrl(800, 400, [], 'webp')
        );
    }

    public function testPhotoUrlSetsFormatToJpgByDefault()
    {
        self::assertMatchesRegularExpression(
            '#^https://picsum.photos/800/400.jpg#',
            Photo::photoUrl(800, 400)
        );
    }

    public function testPhotoUrlThrowsExceptionOnInvalidFormat()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf('Format is invalid, must be one of "%s"', implode(', ', ['jpg', 'webp'])));
        Photo::photoUrl(800, 400, [], 'png');
    }

    public function testDownloadWithDefaults()
    {
        $curlPing = curl_init(Photo::BASE_URL);
        curl_setopt($curlPing, CURLOPT_TIMEOUT, 5);
        curl_setopt($curlPing, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curlPing, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlPing, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($curlPing);
        $httpCode = curl_getinfo($curlPing, CURLINFO_HTTP_CODE);
        curl_close($curlPing);

        if ($httpCode < 200 | $httpCode > 400) {
            self::markTestSkipped('picsum.photos is offline, skipping photo download');
        }

        $file = Photo::photo(sys_get_temp_dir());
        self::assertFileExists($file);

        if (function_exists('getphotosize')) {
            [$width, $height, $type, $attr] = getphotosize($file);
            self::assertEquals(640, $width);
            self::assertEquals(480, $height);
            self::assertEquals(constant('IMAGETYPE_JPG'), $type);
        } else {
            self::assertEquals('jpg', pathinfo($file, PATHINFO_EXTENSION));
        }

        if (file_exists($file)) {
            unlink($file);
        }
    }
}
