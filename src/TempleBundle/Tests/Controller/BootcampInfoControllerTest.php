<?php

namespace TempleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BootcampInfoControllerTest extends WebTestCase
{
    public function testBootcaminfo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/BootcamInfo');
    }

}
