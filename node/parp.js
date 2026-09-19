/** Node/Express adapter. Supply a pre-signed PARP token from your secure CMS or build pipeline. */
export const PARP_REL = "https://github.com/bruce-afruz/piruz-agent-receipt/blob/main/SPEC.md#transport";
export const PARP_TYPE = "application/vnd.piruz.agent-rights";

export function parp({ manifestPath = "/parp", tokenFor }) {
  if (typeof tokenFor !== "function") throw new TypeError("tokenFor(request) is required");
  return (req, res, next) => {
    if (req.path === manifestPath) {
      const token = tokenFor(req);
      if (!token) return res.sendStatus(404);
      res.type(PARP_TYPE).set("Cache-Control", "private, no-store").send(token);
      return;
    }
    const token = tokenFor(req);
    if (token) res.append("Link", `<${manifestPath}>; rel="${PARP_REL}"; type="${PARP_TYPE}"`);
    next();
  };
}
