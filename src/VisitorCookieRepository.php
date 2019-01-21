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

namespace CyrildeWit\EloquentViewable;

use Illuminate\Support\Facades\Cookie;

class VisitorCookieRepository
{
    /**
     * The visitor cookie key.
     *
     * @var string
     */
    protected $key;

    /**
     *
     */
    protected $lifetime;

    /**
     * Create a new view visitor cookie instance.
     *
     * @param  string  $key
     * @return void
     */
    public function __construct(string $key, ?int $lifetime)
    {
        $this->key = $key;
        $this->lifetime = $lifetime;
    }

    /**
     * Determine if the visitor cookie exists on the request.
     *
     * @return string
     */
    public function has()
    {
        return Cookie::has($this->key);
    }

    /**
     * Retrieve the visitor cookie from the request.
     *
     * @return string
     */
    public function get()
    {
        return Cookie::get($this->key);
    }

    /**
     * Create a new visitor cookie if none exists.
     *
     * @return string
     */
    public function push()
    {
        if(! $this->has()) {
            $uniqueString = $this->make();
        }

        return $uniqueString ?? $this->get();
    }

    /**
     * Create a new visitor and return the unique id.
     *
     * @return string
     */
    public function make()
    {
        Cookie::queue($this->key, $uniqueString = $this->generateUniqueString(), $this->lifetime);

        return $uniqueString;
    }

    /**
     * Generate a unique visitor string.
     *
     * @return string
     */
    protected function generateUniqueString(): string
    {
        return str_random(80);
    }

    /**
     * Get the expiration in minutes.
     *
     * @return int
     */
    protected function resolveExpiration(): int
    {
        return $this->lifetime ?? 2628000; // aka 5 years
    }
}
