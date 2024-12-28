<?php
/**
 * Copyright (c) A.S Nassiry
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/nassiry/laravel-encoder
 */

namespace Nassiry\Encoder\Exceptions;

use RuntimeException;

class EncoderException extends RuntimeException
{
    /**
     * Creates an exception for when a class does not implement the required interface.
     *
     * @param string $className The name of the class that does not implement the interface.
     * @return self
     */
    public static function invalidClass (string $className): self
    {
        return new self("Class '{$className}' must implement BaseEncoderInterface.");
    }

    /**
     * Creates an exception for invalid or unsupported bases.
     *
     * @param string $base The unsupported base.
     * @return self
     */
    public static function invalidBase(string $base): self
    {
        return new self("Encoder base '{$base}' is not supported.");
    }

    /**
     * Creates an exception for invalid or undefined methods.
     *
     * @param string $method The invalid method name.
     * @return self
     */
    public static function invalidMethod(string $method): self
    {
        return new self("Method '{$method}' does not exist on the base encoder.");
    }

    /**
     * Creates an exception for invalid IDs.
     *
     * @return self
     */
    public static function invalidId(): self
    {
        return new self('The ID must be a non-negative integer.');
    }

    /**
     * Creates a custom exception for an invalid length.
     *
     * This exception is thrown when the provided length exceeds the available configuration options.
     * Ensure that the length is within the valid range of the base encoder configuration.
     *
     * @return self
     */
    public static function invalidLength($length): self
    {
        return new self("The length must be greater than zero. Given: {$length}");
    }

    /**
     * Creates an exception for invalid characters in a Base62 string.
     *
     * @param string $char The invalid character.
     *  @param string $base The base where the invalid character was found.
     * @return self
     */
    public static function invalidBaseString(string $char, string $base): self
    {
        return new self("Invalid character '{$char}' in '{$base}' string.");
    }

    /**
     * Creates an exception for empty input strings.
     *
     * @return self
     */
    public static function emptyInput(): self
    {
        return new self('Input string cannot be empty.');
    }
}
