<?php

namespace TempleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AvatarControllerTest extends WebTestCase
{
    public function testShowavatar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAvatar');
    }

}
