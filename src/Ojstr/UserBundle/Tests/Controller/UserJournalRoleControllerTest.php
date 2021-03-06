<?php

namespace Ojstr\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserJournalRoleControllerTest extends WebTestCase
{
    public function testStatus()
    {
        $client = static::createClient();
        $client->request('GET', '/admin/userjournalrole/');
        $this->assertTrue(in_array($client->getResponse()->getStatusCode(), array(302, 200)),
            "Unexpected HTTP status code for GET /admin/role/");
    }
}
