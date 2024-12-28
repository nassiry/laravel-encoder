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

class Base62 implements BaseEncoderInterface
{
    private array $chars62;
    protected array $config;

    /**
     * Default mappers to be used if no config is provided.
     */
    private array $defaultMappers = [
        1 => '1',
        41 => '59',
        2377 => '1677',
        147299 => '187507',
        9132313 => '5952585',
        566201239 => '643566407',
        35104476161 => '22071637057',
        2176477521929 => '294289236153',
        134941606358731 => '88879354792675',
        8366379594239857 => '7275288500431249',
        518715534842869223 => '280042546585394647',
    ];

    /**
     * Encoder constructor.
     *
     * Initializes the Base62 characters and sets up the configuration.
     *
     * @param array $config Configuration options for the encoder.
     */
    public function __construct(array $config)
    {
        $this->initializeBase62();

        $this->config = !empty($config) ? $config : $this->defaultMappers;
    }

    /**
     * {@inheritdoc}
     * @throws EncoderException
     */
    public function encodeId(int|string $id, int $length = 4): string
    {
        if (bccomp((string)$id, '0') < 0) {
            throw EncoderException::invalidId();
        }

        if ($length <= 0) {
            throw EncoderException::invalidLength($length);
        }

        $keys = array_keys($this->config);
        $keysLength = count($keys);

        if ($length >= $keysLength) {
            $length = ($keysLength - 1);
        }

        $prime = $keys[$length];

        $ceil = bcpow('62', (string)$length);

        $hashed = bcmod(bcmul((string)$id, (string)$prime), $ceil);

        $base62Encoded = $this->encode($hashed);

        return str_pad($base62Encoded, $length, '0', STR_PAD_LEFT);
    }

    /**
     * {@inheritdoc}
     * @throws EncoderException
     */
    public function decodeId(string $hashed): string
    {
        if ($hashed === '') {
            throw EncoderException::emptyInput();
        }

        $length = strlen($hashed);
        $ceil = bcpow('62', (string)$length);
        $prime = array_values($this->config)[$length];
        $number = $this->decode($hashed);

        return bcmod(bcmul($number, (string)$prime), $ceil);
    }

    /**
     * {@inheritdoc}
     * @throws EncoderException
     */
    public function encodeString(string $string): string
    {
        if ($string === '') {
            throw EncoderException::emptyInput();
        }

        $num = $this->stringToNumber($string);
        return $this->encode($num);
    }

    /**
     * {@inheritdoc}
     * @throws EncoderException
     */
    public function decodeString(string $encoded): string
    {
        if ($encoded === '') {
            throw EncoderException::emptyInput();
        }

        $num = $this->decode($encoded);
        return $this->numberToString($num);
    }

    /**
     * Initializes the Base62 character set.
     */
    private function initializeBase62(): void
    {
        $this->chars62 = array_merge(
            range(48, 57),
            range(65, 90),
            range(97, 122)
        );
    }

    /**
     * Encodes an integer into a Base62 string.
     *
     * @param int|string $int The integer to encode. Must be a non-negative numeric value.
     * @return string The Base62 encoded string.
     * @throws EncoderException If the input is not a valid non-negative numeric value.
     */
    private function encode(int|string $int): string
    {
        if (!is_numeric($int) || bccomp((string)$int, '0') < 0) {
            throw EncoderException::invalidId();
        }

        $key = '';
        while (bccomp((string)$int, '0') > 0) {
            $mod = bcmod((string)$int, '62');
            $key .= chr($this->chars62[(int)$mod]);
            $int = bcdiv((string)$int, '62');
        }

        return strrev($key);
    }

    /**
     * Decodes a Base62 string back into an integer.
     *
     * @param string $key The Base62 encoded string to decode.
     * @return string The decoded integer as a string.
     * @throws EncoderException If the input string contains invalid Base62 characters.
     */
    private function decode(string $key): string
    {
        $int = '0';
        foreach (str_split(strrev($key)) as $i => $char) {
            $dec = array_search(ord($char), $this->chars62, true);
            if ($dec === false) {
                throw EncoderException::invalidBaseString($char, 'base62');
            }
            $int = bcadd(bcmul((string)$dec, bcpow('62', (string)$i)), $int);
        }

        return $int;
    }

    /**
     * Converts a string into a numeric representation.
     *
     * @param string $string Input string.
     * @return string Numeric representation.
     */
    private function stringToNumber(string $string): string
    {
        $bytes = unpack('C*', mb_convert_encoding($string, 'UTF-8'));
        $number = '0';

        foreach ($bytes as $byte) {
            $number = bcmul($number, '256');
            $number = bcadd($number, (string)$byte);
        }

        return $number;
    }

    /**
     * Converts a numeric representation back to its original string.
     *
     * @param string $num Numeric representation.
     * @return string Decoded string.
     */
    private function numberToString(string $num): string
    {
        $string = '';

        while (bccomp($num, '0') > 0) {
            $byte = bcmod($num, '256');
            $string = chr((int)$byte) . $string;
            $num = bcdiv($num, '256');
        }

        return mb_convert_encoding($string, 'UTF-8');
    }
}