<?php
/**
 * Copyright (c) A.S Nassiry
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/nassiry/laravel-encoder
 */

namespace Nassiry\Encoder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string encodeString(string $string)
 * @method static string decodeString(string $string)
 * @method static int|string encodeId(int|string $id, int $length = 7)
 * @method static string decodeId(string $string)
 */
class Encoder extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Encoder';
    }
}
