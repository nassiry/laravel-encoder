### Why Base62?
By default, this package uses **Base62** encoding, which is a URL-safe encoding method using a combination of upper and lowercase letters (A-Z, a-z) and digits (0-9), resulting in a character set of 62 characters.
#### Why Base62 instead of Base58 or Base64?
- **Base62** is chosen for the following reasons:
    1. **URL-Safe Encoding**: Base62 is ideal for URL-safe encoding as it avoids characters that are problematic in URLs (e.g., `/`, `+`, and `=` in Base64). Unlike Base58 (which omits similar characters like `0`, `O`, `I`, and `l`), Base62 includes the full alphanumeric set, offering a compact, human-readable encoding while remaining safe for use in URLs and paths.
    2. **Compactness**: Base62 strikes a good balance between compactness and readability. While Base64 is more compact than Base58 or Base62, it uses characters (`+`, `/`, `=`) that are not URL-safe by default, thus requiring additional encoding for safe use in URLs.
    3. **Avoiding URL Encoding/Decoding**: Base62 requires no URL encoding or decoding tricks, as opposed to Base64 or Base58, which may require escaping or translating special characters (`+`, `/`, etc.).
- **Base58**: While Base58 avoids the potential confusion of similar-looking characters like `0`, `O`, `I`, and `l`, it is less compact than Base62 and only supports a subset of characters. Base62 includes more characters, making it more efficient for encoding large numbers.
- **Base64**: Base64 is a common encoding used for binary data but includes characters such as `+` and `/` that are not URL-safe. While Base64 is more compact than Base62, it’s less human-friendly and introduces characters that require URL escaping. Base62 avoids these pitfalls, making it more suitable for URL-based applications.
