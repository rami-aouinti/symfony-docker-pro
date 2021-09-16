<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ECSPrefix20210825\Symfony\Component\DependencyInjection\Loader\Configurator;

use ECSPrefix20210825\Symfony\Component\DependencyInjection\Definition;
/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class InstanceofConfigurator extends \ECSPrefix20210825\Symfony\Component\DependencyInjection\Loader\Configurator\AbstractServiceConfigurator
{
    use Traits\AutowireTrait;
    use Traits\BindTrait;
    use Traits\CallTrait;
    use Traits\ConfiguratorTrait;
    use Traits\LazyTrait;
    use Traits\PropertyTrait;
    use Traits\PublicTrait;
    use Traits\ShareTrait;
    use Traits\TagTrait;
    public const FACTORY = 'instanceof';
    private $path;
    public function __construct(\ECSPrefix20210825\Symfony\Component\DependencyInjection\Loader\Configurator\ServicesConfigurator $parent, \ECSPrefix20210825\Symfony\Component\DependencyInjection\Definition $definition, string $id, string $path = null)
    {
        parent::__construct($parent, $definition, $id, []);
        $this->path = $path;
    }
    /**
     * Defines an instanceof-conditional to be applied to following service definitions.
     * @return $this
     * @param string $fqcn
     */
    public final function instanceof($fqcn)
    {
        return $this->parent->instanceof($fqcn);
    }
}
