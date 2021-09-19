<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use App\Tests\FunctionalTestCase;

class ExampleTest extends FunctionalTestCase
{
    /**
     * A basic test example.
     */
    public function testBasicTest(): void
    {
        $client = static::createClient();
        $client->request('GET', '/command-scheduler/list');
        // check for 401 due to allow only for user with admin role
        $this->assertSame(401, $client->getResponse()->getStatusCode());
    }

    public function testHome(): void
    {
        $client = static::createClient();
        $client->request('GET', '/home');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }
}
