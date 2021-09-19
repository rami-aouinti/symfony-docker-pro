<?php

declare(strict_types=1);

namespace  App\Tests\Repository;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CategoryRepositoryTest extends KernelTestCase
{
    public function testCount()
    {
        self::bootKernel();
        $categories = self::$container->get(CategoryRepository::class)->count([]);
        $this->assertSame(10, $categories);
    }
}
