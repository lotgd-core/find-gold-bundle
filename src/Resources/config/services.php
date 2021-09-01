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

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Lotgd\Bundle\FindGoldBundle\OccurrenceSubscriber\FindGoldSubscriber;
use Lotgd\Core\Http\Response;

return static function (ContainerConfigurator $container)
{
    $container->services()
        //-- OccurrenceSubscriber
        ->set(FindGoldSubscriber::class)
        ->args([
            new ReferenceConfigurator('parameter_bag'),
            new ReferenceConfigurator('lotgd.core.log'),
            new ReferenceConfigurator(Response::class),
            new ReferenceConfigurator('twig'),
        ])
        ->tag('lotgd_core.occurrence_subscriber')
    ;
};
