<?php

namespace TempleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TechnologyControllerTest extends WebTestCase
{
    public function testTechnologypage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/technologyPage');
    }

}
