# WordPress install

Zip the `piruz-parp` directory, upload it through Plugins → Add New → Upload,
then activate it. Add this to a private must-use plugin or server configuration:

```php
add_filter('piruz_parp_token', function ($token, $url) {
  return getenv('PARP_SIGNED_TOKEN') ?: '';
}, 10, 2);
```

Do not place the private signing key in WordPress. Store only pre-signed tokens.
