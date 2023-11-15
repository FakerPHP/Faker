<?php

namespace Faker\Test\Provider\zh_CN;

use Faker\Provider\zh_CN\Lorem;
use Faker\Test\TestCase;

final class LoremTest extends TestCase
{
    /**
     * word 的最大长度
     *
     * $this->>faker->word() 返回 1-4 个汉字
     */
    public const WORD_MAX_LENGTH = 4;

    public function testWord(): void
    {
        $word = $this->faker->word();

        self::assertTrue($this->isAllChineseWithPunctuation($word));
        self::assertLessThanOrEqual(self::WORD_MAX_LENGTH, self::strlen($word));
    }

    public function testWords(): void
    {
        $paramNb = 3;
        $words = $this->faker->words($nb = $paramNb, $asText = false);

        self::assertIsArray($words);
        self::assertCount($paramNb, $words);

        foreach ($words as $word) {
            self::assertTrue($this->isAllChineseWithPunctuation($word));
            self::assertLessThanOrEqual(self::WORD_MAX_LENGTH, self::strlen($word));
        }
    }

    public function testSentence(): void
    {
        $paramNbWords = 6;
        $sentence = $this->faker->sentence($nbWords = $paramNbWords, $variableNbWords = false);

        self::assertTrue($this->isAllChineseWithPunctuation($sentence));
        self::assertLessThanOrEqual(($paramNbWords * self::WORD_MAX_LENGTH), self::strlen($sentence));
    }

    public function testSentences(): void
    {
        $paramNb = 3;
        $sentences = $this->faker->sentences($nb = $paramNb, $asText = false);

        self::assertIsArray($sentences);
        self::assertCount($paramNb, $sentences);

        foreach ($sentences as $sentence) {
            self::assertTrue($this->isAllChineseWithPunctuation($sentence));
        }
    }

    public function testParagraph(): void
    {
        $paragraph = $this->faker->paragraph();

        self::assertTrue($this->isAllChineseWithPunctuation($paragraph));
    }

    public function testParagraphs(): void
    {
        $paragraphs = $this->faker->paragraphs();

        self::assertIsArray($paragraphs);

        foreach ($paragraphs as $paragraph) {
            self::assertTrue($this->isAllChineseWithPunctuation($paragraph));
        }
    }

    public function testText(): void
    {
        $text = $this->faker->text(200);
        self::assertTrue($this->isAllChineseWithPunctuation($text));
        self::assertLessThanOrEqual(200, self::strlen($text));

        $text = $this->faker->text(2000);
        self::assertTrue($this->isAllChineseWithPunctuation($text));
        self::assertLessThanOrEqual(2000, self::strlen($text));
    }

    /**
     * 判断给定的字符串是否全是中文和标点符号
     *
     * @param string $str
     */
    public function isAllChineseWithPunctuation($str): bool
    {
        return (bool) preg_match('/^[\x{4e00}-\x{9fa5}\p{P}\p{Z}]+$/u', $str);
    }

    /**
     * Get string length
     *
     * @param $str
     *
     * @return int
     */
    protected static function strlen($str)
    {
        if (function_exists('mb_strlen')) {
            return mb_strlen($str, 'UTF-8');
        } else {
            return (int) ceil(strlen($str) / 3);
        }
    }

    protected function getProviders(): iterable
    {
        yield new Lorem($this->faker);
    }
}
