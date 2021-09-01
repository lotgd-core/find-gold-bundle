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

namespace Lotgd\Bundle\FindGoldBundle;

use Lotgd\Bundle\Contract\LotgdBundleInterface;
use Lotgd\Bundle\Contract\LotgdBundleTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class LotgdFindGoldBundle extends Bundle implements LotgdBundleInterface
{
    use LotgdBundleTrait;

    public const TRANSLATION_DOMAIN = 'bundle_find_gold';

    /**
     * {@inheritDoc}
     */
    public function getLotgdName(): string
    {
        return 'Find Gold Event';
    }

    /**
     * {@inheritDoc}
     */
    public function getLotgdVersion(): string
    {
        return '0.1.0';
    }

    /**
     * {@inheritDoc}
     */
    public function getLotgdDescription(): string
    {
        return 'Special event that you can find gold in forest and when travel.';
    }

    /**
     * {@inheritDoc}
     */
    public function getLotgdDownload(): ?string
    {
        return 'https://github.com/lotgd-core/find-gold-bundle';
    }
}
