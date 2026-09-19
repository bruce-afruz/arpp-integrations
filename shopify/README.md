# Shopify adapter

Shopify-hosted storefront pages cannot run custom server middleware. Use a custom
Shopify app with an app proxy endpoint such as `/apps/parp` that returns the
pre-signed manifest token, plus a theme app extension that adds this HTML element:

```html
<link rel="https://github.com/bruce-afruz/piruz-agent-receipt/blob/main/SPEC.md#transport" href="/apps/parp" type="application/vnd.piruz.agent-rights">
```

The app proxy signs or retrieves manifests on your secure server. Never put signing
keys in Liquid or a theme asset. Before distribution, create the app in Shopify's
Dev Dashboard, configure its proxy, and test it on a development store.
