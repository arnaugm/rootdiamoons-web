<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    /**
     * @dataProvider provideUrls
     */
    public function testPageIsSuccessful($url, $title)
    {
        $client = static::createClient();

        $client->request('GET', $url);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('html head title', $title);
    }

    public function provideUrls()
    {
        return [
            ['/', 'Root Diamoons'],
            ['/ca/music', 'Root Diamoons - Música'],
            ['/ca/videos', 'Root Diamoons - Videos'],
            ['/ca/concerts', 'Root Diamoons - Concerts'],
            ['/ca/photos', 'Root Diamoons - Fotos'],
            ['/ca/band', 'Root Diamoons - Grup'],
            ['/ca/contact', 'Root Diamoons - Contacte'],
            ['/es', 'Root Diamoons'],
            ['/es/music', 'Root Diamoons - Música'],
            ['/es/videos', 'Root Diamoons - Vídeos'],
            ['/es/concerts', 'Root Diamoons - Conciertos'],
            ['/es/photos', 'Root Diamoons - Fotos'],
            ['/es/band', 'Root Diamoons - Grupo'],
            ['/es/contact', 'Root Diamoons - Contacto'],
            ['/en', 'Root Diamoons'],
            ['/en/music', 'Root Diamoons - Music'],
            ['/en/videos', 'Root Diamoons - Videos'],
            ['/en/concerts', 'Root Diamoons - Concerts'],
            ['/en/photos', 'Root Diamoons - Photos'],
            ['/en/band', 'Root Diamoons - Band'],
            ['/en/contact', 'Root Diamoons - Contact'],
        ];
    }
}
