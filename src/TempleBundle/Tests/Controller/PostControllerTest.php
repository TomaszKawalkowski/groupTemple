<?php

namespace TempleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testInputpost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/inputPost');
    }

    public function testDeletepost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deletePost');
    }

    public function testEditpost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/editPost');
    }

}
