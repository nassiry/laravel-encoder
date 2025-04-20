## Test Coverage

The package comes with extensive test coverage for encoding and decoding methods, exception handling, and configuration. This ensures robust behavior across various use cases.

### Contributing to Tests

If you encounter a bug or add a new feature, consider writing or updating the tests. Use the following guidelines:

1. Add your test cases to the appropriate files in the `tests` directory.
2. Follow the `PSR-12` coding standards for consistency.
3. Run `composer test` again to verify that all tests pass before submitting a pull request.

### Testing

To ensure the package functions as expected and meets all requirements, you can run the included tests. Follow the steps below to execute the test suite:

### Prerequisites

1. Ensure you have all dependencies installed by running:

```bash
composer install
```

2. Verify that the required PHP extensions (`bcmath` and `mbstring`) are enabled.

### Running Tests

Execute the following command to run the test suite:

```bash
composer test
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

#### Exception Handling
Covers validation, decoding issues, and base errors.

- [Exception Handling](exceptions.md)


### Contributing
Feel free to submit issues or pull requests to improve the package. Contributions are welcome! Let’s improve it together!

### Changelog

See [CHANGELOG](../CHANGELOG.md) for release details.

### License
This package is open-source software licensed under the [MIT license](../LICENSE).
