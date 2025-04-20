## Custom Bases: Add Your Own Encoding Scheme

- If you are implementing your own Base class (Base58 or Base64):
- Implement the `BaseEncoderInterface` in your class.
- Add your custom base to the `BaseFactory`.
-  Use this `config` array to define any specific configuration required for your custom base.

### Examples
```php
use Nassiry\Encoder\Bases\BaseEncoderInterface;

class Base58 implements BaseEncoderInterface
{
    public function encodeId(int|string $id, int $length): string
    {
        // Implement encoding logic for Base58
    }

    public function decodeId(string $hashed): string
    {
        // Implement decoding logic for Base58
    }
    
    public function encodeString(string $string): string;
    {
        // Implement encoding logic for Base58
    }
    
    public function decodeString(string $encoded): string;
    {
        // Implement decoding logic for Base58
    }
}
```

### Register the new base in the `BaseFactory` - `create` method:

```php
return match (strtolower($base)) {
    'base62' => new Base62($config),
    'base58' => new Base58($config),  // Register Base58 here
    default => throw EncoderException::unsupportedBase($base),
};
```

### Use your custom base like this:

```php
use Nassiry\Encoder\Encoder;

$encoder = new Encoder('base58');

$encodedId = $encoder->encodeId(12345);
echo "Base58 Encoded ID: $encodedId\n";

$decodedId = $encoder->decodeId($encodedId);
echo "Decoded ID: $decodedId\n";
```

### Documentation

#### Laravel Integration

`Encode/decode` `strings` and `IDs` using Laravel container, facades, or dependency injection.

- [Laravel Usage](laravel.md)

#### Standalone PHP Usage
Use in any PHP project, no Laravel required.

- [Standalone Guide](standalone.md)

#### Configuration
Customize encoding behavior, mappers, and defaults.

- [Configuration Guide](configuration.md)

#### Exception Handling
Covers validation, decoding issues, and base errors.

- [Exception Handling](exceptions.md)

#### Testing & Contributing
Run the test suite or contribute improvements.

- [Testing Guide](testing.md)


### Contributing
Feel free to submit issues or pull requests to improve the package. Contributions are welcome! Let’s improve it together!

### Changelog

See [CHANGELOG](../CHANGELOG.md) for release details.

### License
This package is open-source software licensed under the [MIT license](../LICENSE).
