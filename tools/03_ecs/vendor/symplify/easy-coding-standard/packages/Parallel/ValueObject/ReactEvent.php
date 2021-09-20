<?php

declare (strict_types=1);
namespace Symplify\EasyCodingStandard\Parallel\ValueObject;

/**
 * @enum
 */
final class ReactEvent
{
    /**
     * @var string
     */
    public const EXIT = 'exit';
    /**
     * @var string
     */
    public const DATA = 'product';
    /**
     * @var string
     */
    public const ERROR = 'error';
}
