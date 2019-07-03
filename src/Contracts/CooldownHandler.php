<?php

declare(strict_types=1);

/*
 * This file is part of the Eloquent Viewable package.
 *
 * (c) Cyril de Wit <github@cyrildewit.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CyrildeWit\EloquentViewable\Contracts;

interface CooldownHandler
{
    /**
     * Determine if the cooldown is active.
     *
     * @return bool
     */
    public function isActive(): bool;
    // public function inCooldown(): bool;

    public function push()
}
