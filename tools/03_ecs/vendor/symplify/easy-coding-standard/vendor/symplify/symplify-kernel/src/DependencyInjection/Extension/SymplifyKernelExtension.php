<?php

declare (strict_types=1);
namespace ECSPrefix20210918\Symplify\SymplifyKernel\DependencyInjection\Extension;

use ECSPrefix20210918\Symfony\Component\Config\FileLocator;
use ECSPrefix20210918\Symfony\Component\DependencyInjection\ContainerBuilder;
use ECSPrefix20210918\Symfony\Component\DependencyInjection\Extension\Extension;
use ECSPrefix20210918\Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
final class SymplifyKernelExtension extends \ECSPrefix20210918\Symfony\Component\DependencyInjection\Extension\Extension
{
    /**
     * @param string[] $configs
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $containerBuilder
     */
    public function load($configs, $containerBuilder) : void
    {
        $phpFileLoader = new \ECSPrefix20210918\Symfony\Component\DependencyInjection\Loader\PhpFileLoader($containerBuilder, new \ECSPrefix20210918\Symfony\Component\Config\FileLocator(__DIR__ . '/../../../config'));
        $phpFileLoader->load('common-config.php');
    }
}
