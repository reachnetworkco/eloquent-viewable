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

namespace CyrildeWit\EloquentViewable\Cooldown;

use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Cooldown
{
    protected $key;

    protected $viewable;

    protected $period;

    protected $unique;

    protected $collection;

    // $period = null, bool $unique = false, string $collection = null

    public function __construct(CooldownKey $key)
    {
        $this->key = $key;
    }

    public function key(): CooldownKey
    {
        return $this->key;
    }
}
