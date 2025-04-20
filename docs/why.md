## Why I Created This Package
In one of my Laravel projects, I needed a way to `encode` & `decode` some strings. Initially, I tried using Laravel's built-in `encrypt` and `decrypt` functions, but they returned very long strings, which were not ideal for my use case.
Next, I turned to Base64 encoding, but I still needed to make it URL-safe, which added complexity. After looking around, I realized that there wasn't a straightforward package that supported encoding both **IDs** and **strings** while providing a customizable approach and URL-safe encoding.
So, I decided to create this package. It started as a solution for my Laravel project, but I quickly realized its usefulness beyond that and made it a standalone package that can be used in any PHP project.
With this package, I aimed to provide a simple, secure, and customizable `encoding/decoding` mechanism with support for Base62 encoding (which is URL-safe), and the ability to easily add more bases like Base58, Base64, or even your own custom encoding schemes.

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
