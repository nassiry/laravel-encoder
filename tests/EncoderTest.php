<?php

namespace Nassiry\Encoder\Tests;

use Nassiry\Encoder\Encoder;
use Nassiry\Encoder\Exceptions\EncoderException;
use PHPUnit\Framework\TestCase;

class EncoderTest extends TestCase
{
    private Encoder $encoder;

    private string $testId = '12345';
    private string $testString = 'Hello World';
    private int $encoderLength = 7;

    protected function setUp(): void
    {
        $this->encoder = new Encoder();
    }

    public function testEncodeId(): void
    {
        $encodedId = $this->encoder->encodeId($this->testId);

        $this->assertNotEmpty($encodedId, 'Encoded ID should not be empty.');
        $this->assertIsString($encodedId, 'Encoded ID should be a string.');

        $decodedId = $this->encoder->decodeId($encodedId);
        $this->assertSame($this->testId, $decodedId, 'Decoded ID should match the original ID.');
    }

    public function testEncodeIdLength(): void
    {
        $encodedId = $this->encoder->encodeId($this->testId, $this->encoderLength);

        $this->assertNotEmpty($encodedId, 'Encoded ID should not be empty.');
        $this->assertIsString($encodedId, 'Encoded ID should be a string.');

        $decodedId = $this->encoder->decodeId($encodedId);
        $this->assertSame($this->testId, $decodedId, 'Decoded ID should match the original ID.');
    }

    public function testEncodeString(): void
    {
        $encodedString = $this->encoder->encodeString($this->testString);

        $this->assertNotEmpty($encodedString, 'Encoded string should not be empty.');
        $this->assertIsString($encodedString, 'Encoded string should be a string.');

        $decodedString = $this->encoder->decodeString($encodedString);
        $this->assertSame($this->testString, $decodedString, 'Decoded string should match the original string.');
    }

    public function testDecodeInvalidId(): void
    {
        $this->expectException(EncoderException::class);
        $this->expectExceptionMessage('Input string cannot be empty.');

        $this->encoder->decodeId('');
    }

    public function testDecodeInvalidString(): void
    {
        $this->expectException(EncoderException::class);
        $this->expectExceptionMessage('Invalid character');

        $this->encoder->decodeString('@@InvalidString');
    }

    public function testEncodeIdWithCustomConfig(): void
    {
        $customConfig = [
            1 => '1',
            41 => '59',
            2377 => '1677',
            147299 => '187507',
            9132313 => '5952585',
        ];

        $encoderWithConfig = new Encoder('base62', $customConfig);

        $encodedId = $encoderWithConfig->encodeId($this->testId);
        $this->assertNotEmpty($encodedId, 'Encoded ID with custom config should not be empty.');
        $this->assertIsString($encodedId, 'Encoded ID with custom config should be a string.');

        $decodedId = $encoderWithConfig->decodeId($encodedId);
        $this->assertSame($this->testId, $decodedId, 'Decoded ID with custom config should match the original ID.');
    }

    public function testEncodeWithUnsupportedBase(): void
    {
        $this->expectException(EncoderException::class);
        $this->expectExceptionMessage("Encoder base 'base100' is not supported.");

        new Encoder('base100');
    }

    public function testEncodeWithInvalidMethod(): void
    {
        $this->expectException(EncoderException::class);
        $this->expectExceptionMessage("Method 'invalidMethod' does not exist on the base encoder.");

        $this->encoder->invalidMethod($this->testId);
    }
}
