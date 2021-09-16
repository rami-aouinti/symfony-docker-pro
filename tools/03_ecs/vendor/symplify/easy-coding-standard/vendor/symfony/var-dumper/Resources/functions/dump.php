<?php

namespace ECSPrefix20210913;

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use ECSPrefix20210913\Symfony\Component\VarDumper\VarDumper;
if (!\function_exists('ECSPrefix20210913\\dump')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     */
    function dump($var, ...$moreVars)
    {
        \ECSPrefix20210913\Symfony\Component\VarDumper\VarDumper::dump($var);
        foreach ($moreVars as $v) {
            \ECSPrefix20210913\Symfony\Component\VarDumper\VarDumper::dump($v);
        }
        if (1 < \func_num_args()) {
            return \func_get_args();
        }
        return $var;
    }
}
if (!\function_exists('ECSPrefix20210913\\dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $v) {
            \ECSPrefix20210913\Symfony\Component\VarDumper\VarDumper::dump($v);
        }
        exit(1);
    }
}
