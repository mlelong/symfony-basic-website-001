<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChessboardTest extends WebTestCase
{
    public function testCheckChessboardDisplay(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/chessboard/display');

        $this->assertResponseIsSuccessful();
        $this->assertCount(1, $crawler->filter('.chessboard'));
        $this->assertCount(64, $crawler->filter('.square'));
    }
}
