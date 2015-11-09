<?php

namespace TempleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testShowuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showUser');
    }

    public function testShowtechnology()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showTechnology');
    }

    public function testChat()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/chat');
    }

    public function testSendemail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/sendEmail');
    }

    public function testAddtiptechnology()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addTipTechnology');
    }

}
