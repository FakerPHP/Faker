<?php

declare(strict_types=1);

namespace Faker\Test\Provider;

use Faker\Provider\Image;
use Faker\Test\TestCase;

/**
 * @group legacy
 */
final class ImageTest extends TestCase
{
    public function testImageUrlUses640x680AsTheDefaultSize(): void
    {
        self::assertMatchesRegularExpression(
            '#^https://placehold.co/640x480#',
            Image::imageUrl(),
        );
    }

    public function testImageUrlAcceptsCustomWidthAndHeight(): void
    {
        self::assertMatchesRegularExpression(
            '#^https://placehold.co/800x400#',
            Image::imageUrl(800, 400),
        );
    }

    public function testImageUrlAcceptsCustomCategory(): void
    {
        self::assertMatchesRegularExpression(
            '#^https://placehold.co/800x400/[\w]{6}/[\w]{6}/png\?text=nature\+.*#',
            Image::imageUrl(800, 400, 'nature'),
        );
    }

    public function testImageUrlAcceptsCustomText(): void
    {
        self::assertMatchesRegularExpression(
            '#^https://placehold.co/800x400/[\w]{6}/[\w]{6}/png\?text=nature\+Faker#',
            Image::imageUrl(800, 400, 'nature', false, 'Faker'),
        );
    }

    public function testImageUrlReturnsLinkToRegularImageWhenGrayIsFalse(): void
    {
        $imageUrl = Image::imageUrl(
            800,
            400,
            'nature',
            false,
            'Faker',
            false,
        );

        self::assertMatchesRegularExpression(
            '#^https://placehold.co/800x400/[\w]{6}/[\w]{6}/png\?text=nature\+Faker#',
            $imageUrl,
        );
    }

    public function testImageUrlReturnsLinkToRegularImageWhenGrayIsTrue(): void
    {
        $imageUrl = Image::imageUrl(
            800,
            400,
            'nature',
            false,
            'Faker',
            true,
        );

        self::assertMatchesRegularExpression(
            '#^https://placehold.co/800x400/CCCCCC/000000/png\?text=nature\+Faker#',
            $imageUrl,
        );
    }

    public function testImageUrlAddsARandomGetParameterByDefault(): void
    {
        $url = Image::imageUrl(800, 400);
        $splitUrl = explode("?text=", $url);

        self::assertCount(2, $splitUrl);
        self::assertMatchesRegularExpression('#\w*#', $splitUrl[1]);
    }

    public function testImageUrlThrowsExceptionOnInvalidImageFormat(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Image::imageUrl(
            800,
            400,
            'nature',
            false,
            'Faker',
            true,
            'foo',
        );
    }

    public function testImageUrlAcceptsDifferentImageFormats(): void
    {
        foreach (Image::getFormats() as $format) {
            $imageUrl = Image::imageUrl(
                800,
                400,
                'nature',
                false,
                'Faker',
                true,
                $format,
            );

            self::assertMatchesRegularExpression(
                "#^https://placehold.co/800x400/CCCCCC/000000/{$format}\?text=nature\+Faker#",
                $imageUrl,
            );
        }
    }

    public function testDownloadWithDefaults(): void
    {
        self::checkUrlConnection(Image::BASE_URL);

        $file = Image::image(sys_get_temp_dir());
        self::assertFileExists($file);

        self::checkImageProperties($file, 640, 480, 'png');
    }

    public function testDownloadWithDifferentImageFormats(): void
    {
        self::checkUrlConnection(Image::BASE_URL);

        foreach (Image::getFormats() as $format) {
            $width = 800;
            $height = 400;
            $file = Image::image(
                sys_get_temp_dir(),
                $width,
                $height,
                'nature',
                true,
                false,
                'Faker',
                true,
                $format,
            );
            self::assertFileExists($file);

            self::checkImageProperties($file, $width, $height, $format);
        }
    }

    private static function checkImageProperties(
        string $file,
        int $width,
        int $height,
        string $format
    ): void {
        if (function_exists('getimagesize')) {
            $imageConstants = Image::getFormatConstants();
            [$actualWidth, $actualHeight, $type, $attr] = getimagesize($file);
            self::assertEquals($width, $actualWidth);
            self::assertEquals($height, $actualHeight);
            self::assertEquals($imageConstants[$format], $type);
        } else {
            self::assertEquals($format, pathinfo($file, PATHINFO_EXTENSION));
        }

        if (file_exists($file)) {
            unlink($file);
        }
    }

    private static function checkUrlConnection(string $url): void
    {
        $curlPing = curl_init($url);
        curl_setopt($curlPing, CURLOPT_TIMEOUT, 5);
        curl_setopt($curlPing, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curlPing, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlPing, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($curlPing);
        $httpCode = curl_getinfo($curlPing, CURLINFO_HTTP_CODE);
        curl_close($curlPing);

        if ($httpCode < 200 || $httpCode > 300) {
            self::markTestSkipped(sprintf('"%s" is offline, skipping test', $url));
        }
    }
}
