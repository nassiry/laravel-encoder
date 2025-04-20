## Laravel Integration

This package integrates seamlessly with Laravel, making it easy to encode or decode IDs and strings using the service container, dependency injection, or facades.

### Using the Service Container

```php
$encoder = app('Encoder');

// Encoding and Decoding IDs
$encodedId = $encoder->encodeId(12345);
$decodedId = $encoder->decodeId($encodedId);

// Encoding and Decoding Strings
$encodedString = $encoder->encodeString('Hello World');
$decodedString = $encoder->decodeString($encodedString);
```

### Using Dependency Injection

For better maintainability and testability, inject the encoder into your controllers or services:

```php
use Nassiry\Encoder\Encoder;

class MyController extends Controller
{
    public function __construct(protected Encoder $encoder)
    {
        // Your other codes
    }

    public function encodeData()
    {
        $encoded = $this->encoder->encodeString('my data');
        return response()->json(['encoded' => $encoded]);
    }
}
```

### Using the Facade

The package provides a facade for quick access to encoder methods:

```php
use Nassiry\Encoder\Facades\Encoder;

// Encoding and Decoding IDs
$encodedId = Encoder::encodeId(12345);
$decodedId = Encoder::decodeId($encodedId);

// Encoding and Decoding Strings
$encodedString = Encoder::encodeString('Hello World');
$decodedString = Encoder::decodeString($encodedString);
```

### Documentation

#### Standalone PHP Usage
Use in any PHP project, no Laravel required.

- [Standalone Guide](standalone.md)

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
