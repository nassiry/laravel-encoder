<?php
/**
 * Copyright (c) A.S Nassiry
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/nassiry/laravel-encoder
 */

namespace Nassiry\Encoder\Bases;

use Nassiry\Encoder\Exceptions\EncoderException;

class BaseFactory
{
    /**
     * Create an encoder instance dynamically based on the base type and configuration.
     *
     * @param string $base The encoder base.
     * @param array $config Configuration options for the encoder.
     * @return BaseEncoderInterface
     * @throws EncoderException
     */
    public static function create(string $base, array $config = []): BaseEncoderInterface
    {
        return match (strtolower($base)) {
            'base62' => new Base62($config),
            default => throw EncoderException::invalidBase($base),
        };
    }
}