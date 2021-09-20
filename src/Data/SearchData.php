<?php

namespace App\Data;

use App\Entity\Category;

class SearchData
{
    /**
     * @var int
     */
    public int $page = 1;

    /**
     * @var string|null
     */
    public ?string $q = '';

    /**
     * @var Category[]
     */
    public array $categories = [];

    /**
     * @var integer|null
     */
    public ?int $max;

    /**
     * @var integer|null
     */
    public ?int $min;

    /**
     * @var bool|null
     */
    public ?bool $promo;
}
