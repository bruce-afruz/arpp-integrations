# OpenCart adapter

This beta adapter requires an OpenCart-specific event extension because OpenCart
major versions use different extension packaging. Add a public `/parp` controller
that returns a pre-signed token with `Content-Type: application/vnd.piruz.agent-rights`.
Attach the PARP Link header through the site's existing response/event layer.

Do not upload a private key or signed token through the OpenCart theme editor.
Use an environment variable or server-side secret store. A tested package requires
the exact OpenCart major version and the target site's extension structure.
