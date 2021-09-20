<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProductFixtures extends Fixture
{
    protected $faker;

    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName($this->faker->name);
            $category->setSlug("slug $i");
            $category->setImage($this->faker->imageUrl());
            for ($j = 0; $j < 10; $j++) {
                $product = new Product();
                $product->setName($this->faker->name);
                $product->setSlug("slug $i $j");
                $product->setPrice($this->faker->randomFloat(5, 1000));
                $product->setPromo($this->faker->boolean());
                $product->addCategory($category);
                $manager->persist($product);
            }
            $manager->persist($category);
        }
        $manager->flush();
    }
}
