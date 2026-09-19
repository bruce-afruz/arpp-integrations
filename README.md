# PARP Integrations

Installable integration starters for the Piruz Agent Receipt Protocol (PARP),
initiated by Piruz Afruz MB. MIT licensed. Each site keeps its own signing key.

## Choose an adapter

| Platform | Install | What it does |
|---|---|---|
| Node | Copy `node/parp.js` or publish it in your app | Adds the PARP Link header and serves a signed manifest. |
| PHP | `composer require piruz-afruz/parp-php` after package publication | Header and manifest response helpers. |
| .NET | Add `dotnet/ParpMiddleware.cs` | Adds the Link header before ASP.NET Core sends its response. |
| WordPress | Upload `wordpress/piruz-parp.zip` | Adds a manifest endpoint and Link header using a configured signed token. |
| OpenCart | Upload `opencart/piruz-parp.ocmod.zip` | Adds a controller endpoint; configure the signed token. |
| Shopify | Install the custom app and theme extension in `shopify/` | Uses an app proxy for manifests and an HTML link element. |

These are beta adapters. Set a distinct signing key and content hash for each
publisher. Do not put private keys in themes, plugins, browser JavaScript or a
public repository. Test every endpoint with the verification tools in the PARP
repository before enabling it for private content.

PARP uses HTTPS; it deliberately does not need a URI scheme. Its current vendor
media type is `application/vnd.piruz.agent-rights` and its extension relation is
defined in the PARP specification.
