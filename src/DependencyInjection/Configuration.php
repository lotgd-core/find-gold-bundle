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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('lotgd_find_gold');

        $treeBuilder->getRootNode()
            ->addDefaultsIfNotSet()
            ->children()
                ->integerNode('min_gold')
                    ->min(0)
                    ->max(50)
                    ->defaultValue(10)
                    ->info('Minimum gold to find (multiplied by level)')
                ->end()
                ->integerNode('max_gold')
                    ->min(20)
                    ->max(150)
                    ->defaultValue(50)
                    ->info('Maximum gold to find (multiplied by level)')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
