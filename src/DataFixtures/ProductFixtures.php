<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName("category ${i}");
            $category->setSlug("category ${i}");
            $category->setImage("image ${i}");
            for ($j = 0; $j < 10; $j++) {
                $product = new Product();
                $product->setName("product ${i} ${j}");
                $product->setSlug("product ${i} ${j}");
                $product->setPrice(50);
                $product->setPromo(true);
                $product->addCategory($category);
                $manager->persist($product);
            }
            $manager->persist($category);
        }
        $manager->flush();
    }
}
