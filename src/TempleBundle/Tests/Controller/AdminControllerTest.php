<?php

namespace TempleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testAdmin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'course_management');
    }

}
