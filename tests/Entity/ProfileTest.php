<?php

declare(strict_types=1);

namespace  App\Tests\Entity;

use App\Entity\Profile;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProfileTest extends KernelTestCase
{
    public function testValidEntity() {
        $user = new User();
        $profile = (new Profile())
            ->setFirstname('Mohamed')
            ->setLastname('Aouinti')
            ->setUser($user);
        self::bootKernel();
        $error = self::$container->get('validator')->validate($profile);
        $this->assertCount(0, $error);
    }

    public function testNoValidEntity() {
        $user = new User();
        $profile = (new Profile())
            ->setFirstname('Mohamed Ramias23432')
            ->setLastname('Aouinti')
            ->setUser($user);
        self::bootKernel();
        $error = self::$container->get('validator')->validate($profile);
        $this->assertCount(1, $error);
    }
}
