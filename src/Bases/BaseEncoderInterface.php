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

interface BaseEncoderInterface
{
    /**
     * Encode an integer ID using mappers and Base62.
     *
     * @param string|int $id Numeric string or integer to encode.
     * @param int $length numeric value for length of hashing.
     * @return string Encoded string.
     */
    public function encodeId(int|string $id, int $length): string;

    /**
     * Decode a hashed string back into an ID.
     *
     * @param string $hashed The hashed Base62 string.
     * @return string Original numeric ID.
     */
    public function decodeId(string $hashed): string;

    /**
     * Encode a string into a Base62 representation.
     *
     * @param string $string Input string to encode.
     * @return string Encoded Base62 string.
     */
    public function encodeString(string $string): string;

    /**
     * Decode a Base62 string back to its original value.
     *
     * @param string $encoded Encoded Base62 string.
     * @return string Decoded original string.
     */
    public function decodeString(string $encoded): string;
}