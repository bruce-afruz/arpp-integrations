# Contributing adapters

Each folder here is a small, copyable starter that lets a site publish a signed PARP rights
manifest. New platforms are the most welcome contribution: Cloudflare Workers, Next.js,
Django/Flask, Laravel, Rails, Go `net/http`, Caddy, Netlify/Vercel edge, Ghost, Drupal, Magento.

## An adapter is done when it

- [ ] Serves the signed manifest at `/parp` with `Content-Type: application/vnd.piruz.agent-rights`
      and `Cache-Control: private, no-store`.
- [ ] Serves the public key at `/.well-known/piruz-agent-key.json` (JWK, `kty: OKP`, `crv: Ed25519`).
- [ ] Adds `Link: </parp>; rel="https://github.com/bruce-afruz/piruz-agent-receipt/blob/main/SPEC.md#transport"; type="application/vnd.piruz.agent-rights"`
      to the resource it describes (usually `/llms.txt`).
- [ ] Generates the site's **own** key on the site's own server and never sends it anywhere.
- [ ] Only signs HTTPS subjects, and sets `contentSha256` from the exact bytes served.
- [ ] Reproduces the canonical bytes and signature in
      [`test-vectors/v0.1.json`](https://github.com/bruce-afruz/piruz-agent-receipt/blob/main/test-vectors/v0.1.json).
- [ ] Has a README with install steps and a `curl` check.

## Pull requests

Keep one platform per PR, with no build tooling beyond what that platform already uses.
By contributing you agree your work is released under the MIT licence. Report security issues
privately with GitHub's *Report a vulnerability* button on the Security tab.
