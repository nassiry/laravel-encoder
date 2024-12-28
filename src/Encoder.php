<?php
/**
 * Copyright (c) A.S Nassiry
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/nassiry/laravel-encoder
 */

namespace Nassiry\Encoder;

use Nassiry\Encoder\Bases\BaseEncoderInterface;
use Nassiry\Encoder\Bases\BaseFactory;
use Nassiry\Encoder\Exceptions\EncoderException;

/**
 * Encoder class for encoding and decoding strings and IDs with various base encodings.
 *
 * @method string encodeString(string $string)
 * @method string decodeString(string $string)
 * @method int|string encodeId(int|string $id, int $length = 6)
 * @method string decodeId(string $string)
 */

class Encoder
{
    public const BASE_62 = 'Base62';

    private array $config;
    private string $base;

    /**
     * Encoder class constructor.
     *
     * Initializes the encoder with a base encoding type and optional configuration.
     *
     * @param string|null $base   The base encoding type. Default is Base62.
     * @param array       $config Configuration options for the encoder. Keys and values must be numeric.
     *
     * @throws EncoderException If the base is invalid or the configuration is invalid.
     */
    public function __construct(string $base = null, array $config = [])
    {
        if (is_string($base)) {
            $this->validateBase($base);
        }

        $this->config = $config;
        $this->base = $base ?? self::BASE_62;
    }

    /**
     * Magic method to dynamically call encoding/decoding methods on the base encoder.
     *
     * @param string $method Name of the method to call.
     * @param array  $args   Arguments to pass to the method.
     * @return mixed The result of the method call.
     * @throws EncoderException If the method does not exist.
     */
    public function __call(string $method, array $args)
    {
        $baseInstance = $this->getBaseInstance();

        if (method_exists($baseInstance, $method)) {
            return call_user_func_array([$baseInstance, $method], $args);
        }

        throw EncoderException::invalidMethod($method);
    }

    /**
     * Validates the base encoding type.
     *
     * Ensures that the provided base encoding type is supported.
     *
     * @param string $base The base encoding type to validate.
     *
     * @throws EncoderException If the base encoding type is unsupported.
     */
    private function validateBase(string $base): void
    {
        try {
            BaseFactory::create($base);
        } catch (EncoderException $e) {
            throw EncoderException::invalidBase($base);
        }
    }

    /**
     * Get the base encoder instance using the factory.
     *
     * @return BaseEncoderInterface The base encoder instance.
     */
    private function getBaseInstance(): BaseEncoderInterface
    {
        return BaseFactory::create($this->base, $this->config);
    }
}
