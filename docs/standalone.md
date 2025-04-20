## Standalone Usage

To use the package in a non-Laravel PHP project, follow these steps:

### Usage Example
```php
require __DIR__ . '/vendor/autoload.php';

use Nassiry\Encoder\Encoder;

// Create an Encoder instance
$encoder = new Encoder();

// Encoding an ID
$encodedId = $encoder->encodeId(12345);
echo "Encoded ID: $encodedId\n"; // eqwb

// Decoding an ID
$decodedId = $encoder->decodeId($encodedId);
echo "Decoded ID: $decodedId\n"; // 12345

// Encoding an ID with length
$encodedId = $encoder->encodeId(12345, 8); 
echo "Encoded ID: $encodedId\n"; // d29Buhe7

// Decoding an ID
$decodedId = $encoder->decodeId($encodedId);
echo "Decoded ID: $decodedId\n"; // 12345

// Encoding a String
$encodedString = $encoder->encodeString('Hello World');
echo "Encoded String: $encodedString\n"; // 73XpUgyMwkGr29M

// Decoding a String
$decodedString = $encoder->decodeString($encodedString);
echo "Decoded String: $decodedString\n"; // Hello World
```

### Documentation

#### Laravel Integration

`Encode/decode` `strings` and `IDs` using Laravel container, facades, or dependency injection.

- [Laravel Usage](laravel.md)

#### Configuration
Customize encoding behavior, mappers, and defaults.

- [Configuration Guide](configuration.md)

#### Custom Bases
Add your own Base58, Base64, or custom encoders.
- [Custom Bases Guide](custom-bases.md)

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
