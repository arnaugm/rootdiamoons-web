<?php

namespace App\Tests\Entity;

use App\Entity\Concert;
use PHPUnit\Framework\TestCase;

class ConcertTest extends TestCase
{
    protected static $concert;

    public static function setUpBeforeClass()
    {
        self::$concert = new Concert();

        self::$concert->setTextCat('text_cat');
        self::$concert->setTextCas('text_cas');
        self::$concert->setTextEng('text_eng');

        self::$concert->setConcertCat('concert_cat');
        self::$concert->setConcertCas('concert_cas');
        self::$concert->setConcertEng('concert_eng');
    }

    /**
     * @dataProvider providerText
     */
    public function testGetText($locale, $text)
    {
        $result = self::$concert->getText($locale);

        $this->assertEquals($text, $result);
    }

    public function providerText()
    {
        return [
            ['', 'text_cat'],
            ['ca', 'text_cat'],
            ['es', 'text_cas'],
            ['en', 'text_eng'],
        ];
    }

    /**
     * @dataProvider providerConcert
     */
    public function testGetConcert($locale, $text)
    {
        $result = self::$concert->getConcert($locale);

        $this->assertEquals($text, $result);
    }

    public function providerConcert()
    {
        return [
            ['', 'concert_cat'],
            ['ca', 'concert_cat'],
            ['es', 'concert_cas'],
            ['en', 'concert_eng'],
        ];
    }
}
