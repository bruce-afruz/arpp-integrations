# Node / Express

```js
import express from "express";
import { parp } from "./parp.js";
const app = express();
const tokens = new Map([["/docs", process.env.PARP_DOCS_TOKEN]]);
app.use(parp({ tokenFor: req => tokens.get(req.path) }));
```

Generate `PARP_DOCS_TOKEN` only in trusted server/build infrastructure. The
endpoint returns the signed token, not a private signing key.
