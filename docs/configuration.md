## Custom Configuration

When using a custom configuration, ensure that the `$length` parameter in the `encodeId` function is **an index within the configuration array**. It must be smaller than the last index of the configuration array.

```php
$config = [
     1 => '1',
    41 => '59',
    2377 => '1677',
    147299 => '187507',
    9132313 => '5952585',
];

$encoder = new Encoder('base62', $config);

// $length refers to the index (0-based), not the key
$customEncodedId = $encoder->encodeId(12345, 3);

echo "Custom Encoded ID: $customEncodedId\n"; // qVX
```

### Important Notes:

1. The `$length` parameter represents the **index** in the configuration array, **not the key value**.
2. It must always be smaller than the highest index of the configuration array.
3. For example, in the above `$config`, the valid values for `$length` are `0`, `1`, `2`, `3`, or `4` (total of 5 elements, indices `0–4`).

### Encoder Configuration File

**Note:** This configuration file is applicable only when using the package with a **Laravel application**.
For standalone usage, you need to provide configuration directly while initializing the `Encoder` class.
This file allows you to set up the default base encoder and customize its behavior within Laravel.
By default, the package uses the `base62` encoder, but you can define additional configurations
for Base62 or other custom Base classes that you may add via the Factory.

### Default Base62 Configuration

If you are using the default Base62 implementation, you can override its default mappers
by specifying custom mappings in the `config` array below. These mappers are used to obfuscate
the encoding process by applying prime numbers for variable-length encoding.

Example for overriding Base62 mappers:

```php
'config' => [
    1 => '1',
    5 => '41',
    6 => '2377',
    7 => '147299',
    8 => '9132313',
],
```
### Usage in Laravel

To publish this configuration file, run the following command:

```bash
php artisan vendor:publish --provider="Nassiry\Encoder\EncoderServiceProvider"
```

After publishing, you can modify the configuration to suit your application's needs.

### Documentation

#### Laravel Integration

`Encode/decode` `strings` and `IDs` using Laravel container, facades, or dependency injection.

- [Laravel Usage](laravel.md)

#### Standalone PHP Usage
Use in any PHP project, no Laravel required.

- [Standalone Guide](standalone.md)

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
