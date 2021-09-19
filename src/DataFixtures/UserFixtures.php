<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 10; $i++) {
            $user = (new User())
                ->setEmail("user$i@gmail.com")
                ->setPassword("password");
            $manager->persist($user);
        }
        $manager->flush();
    }
}
