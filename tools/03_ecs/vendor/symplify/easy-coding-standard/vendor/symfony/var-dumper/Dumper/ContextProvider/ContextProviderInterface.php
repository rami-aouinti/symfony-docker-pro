<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ECSPrefix20210918\Symfony\Component\VarDumper\Dumper\ContextProvider;

/**
 * Interface to provide contextual product about dump product clones sent to a server.
 *
 * @author Maxime Steinhausser <maxime.steinhausser@gmail.com>
 */
interface ContextProviderInterface
{
    /**
     * @return array|null Context product or null if unable to provide any context
     */
    public function getContext() : ?array;
}
