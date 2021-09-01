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

namespace Lotgd\Bundle\FindGoldBundle\OccurrenceSubscriber;

use Lotgd\Bundle\FindGoldBundle\LotgdFindGoldBundle;
use Lotgd\Core\Http\Response;
use Lotgd\Core\Log;
use Lotgd\CoreBundle\OccurrenceBundle\OccurrenceSubscriberInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Environment;

class FindGoldSubscriber implements OccurrenceSubscriberInterface
{
    public const TRANSLATION_DOMAIN = LotgdFindGoldBundle::TRANSLATION_DOMAIN;

    private $parameter;
    private $log;
    private $response;
    private $twig;

    public function __construct(
        ParameterBagInterface $parameter,
        Log $log,
        Response $response,
        Environment $twig
    ) {
        $this->parameter = $parameter;
        $this->log       = $log;
        $this->response  = $response;
        $this->twig      = $twig;
    }

    public function findGold()
    {
        global $session;

        $min = $session['user']['level'] * $this->parameter->get('lotgd_bundle.find_gold.min_gold');
        $max = $session['user']['level'] * $this->parameter->get('lotgd_bundle.find_gold.max_gold');

        $gold = mt_rand(min($min, $max), max($min, $max));

        $session['user']['gold'] += $gold;

        $this->log->debug("found {$gold} gold in the dirt");

        $params = [
            'translation_domain' => self::TRANSLATION_DOMAIN,
            'gold'               => $gold,
        ];

        $this->response->pageAddContent($this->twig->render('@LotgdFindGold/find.html.twig', $params));
    }

    public static function getSubscribedOccurrences()
    {
        return [
            'forest' => ['findGold', 10000, OccurrenceSubscriberInterface::PRIORITY_INFO],
            'travel' => ['findGold', 2000, OccurrenceSubscriberInterface::PRIORITY_INFO],
        ];
    }
}
