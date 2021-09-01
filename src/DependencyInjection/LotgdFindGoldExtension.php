<?php

/**
 * This file is part of "LoTGD Bundle Find Gold".
 *
 * @see https://github.com/lotgd-core/find-gold-bundle
 *
 * @license https://github.com/lotgd-core/find-gold-bundle/blob/master/LICENSE.txt
 * @author IDMarinas
 *
 * @since 0.1.0
 */

namespace Lotgd\Bundle\FindGoldBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

final class LotgdFindGoldExtension extends ConfigurableExtension
{
    public function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new PhpFileLoader($container, new FileLocator(\dirname(__DIR__).'/Resources/config'));

        $loader->load('services.php');

        $container->setParameter('lotgd_bundle.find_gold.min_gold', $mergedConfig['min_gold']);
        $container->setParameter('lotgd_bundle.find_gold.max_gold', $mergedConfig['max_gold']);
    }
}
