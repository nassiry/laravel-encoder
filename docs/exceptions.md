## Handling Exceptions

The package throws meaningful exceptions for invalid input and other runtime issues, making it easier to debug and handle errors gracefully.
The `EncoderException` class extends PHP's `RuntimeException` and provides static methods for creating specific exceptions.

### Common Exceptions

- **Invalid ID**: Thrown when an ID is not a valid non-negative integer.
- **Invalid Length**: Thrown when length is not a valid non-negative integer.
- **Empty Input**: Thrown when the input string is empty.
- **Invalid Base String**: Thrown when a string contains invalid characters for the base.
- **Invalid Base**: Thrown when a base (Base58 or Base64) is not registered in the Factory.
- **Invalid Method Call**: Thrown when an undefined method is called on a base encoder.
- **Invalid Class**: Thrown when a custom base class does not implement the required `BaseEncoderInterface`.

```php
EncoderException::invalidId(); 
// Message: "The ID must be a non-negative integer."

EncoderException::invalidLength($length);
// Message: "The length must be greater than zero. Given: 0"

EncoderException::emptyInput(); 
// Message: "Input string cannot be empty."

EncoderException::invalidBaseString(string $char, string $base); 
// Message: "Invalid character '!' in 'base62' string."

EncoderException::invalidBase(string $base); 
// Message: "Encoder base 'base64' is not supported."

EncoderException::invalidMethod(string $method); 
// Message: "Method 'fooBar' does not exist on the base encoder."

EncoderException::invalidClass(string $className); 
// Message: "Class 'MyBaseEncoder' must implement BaseEncoderInterface."
```

### Example: Catching Exceptions

You can wrap your encoding/decoding logic in a `try-catch` block to handle exceptions gracefully:

```php
use Nassiry\Encoder\Exceptions\EncoderException;

try {
    $encoded = $encoder->encodeId(-1); // Invalid ID
} catch (EncoderException $e) {
    echo "Error: " . $e->getMessage();
}
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

#### Custom Bases
Add your own Base58, Base64, or custom encoders.
- [Custom Bases Guide](custom-bases.md)

#### Testing & Contributing
Run the test suite or contribute improvements.

- [Testing Guide](testing.md)


### Contributing
Feel free to submit issues or pull requests to improve the package. Contributions are welcome! Let’s improve it together!

### Changelog

See [CHANGELOG](../CHANGELOG.md) for release details.

### License
This package is open-source software licensed under the [MIT license](../LICENSE).
