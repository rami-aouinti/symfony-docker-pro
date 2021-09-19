<?php

declare(strict_types=1);

namespace  App\Tests\Repository;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductRepositoryTest extends KernelTestCase
{
    public function testCount()
    {
        self::bootKernel();
        $products = self::$container->get(ProductRepository::class)->count([]);
        $this->assertSame(100, $products);
    }
}
