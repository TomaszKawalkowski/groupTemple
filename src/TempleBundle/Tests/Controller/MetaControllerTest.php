<?php

namespace TempleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MetaControllerTest extends WebTestCase
{
    public function testMeta()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/meta');
    }

}
