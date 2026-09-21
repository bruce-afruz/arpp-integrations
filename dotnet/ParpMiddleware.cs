using Microsoft.AspNetCore.Http;

namespace PiruzAfruz.Parp;
public sealed class ParpMiddleware(RequestDelegate next, Func<HttpContext, string?> tokenFor)
{
    const string Type = "application/vnd.piruz.agent-rights";
    const string Rel = "https://github.com/bruce-afruz/arpp/blob/main/SPEC.md#transport";
    public async Task InvokeAsync(HttpContext context)
    {
        var token = tokenFor(context);
        if (context.Request.Path == "/parp" && token is not null) {
            context.Response.ContentType = Type;
            context.Response.Headers.CacheControl = "private, no-store";
            await context.Response.WriteAsync(token); return;
        }
        context.Response.OnStarting(() => { if (token is not null) context.Response.Headers.Append("Link", $"</parp>; rel=\"{Rel}\"; type=\"{Type}\""); return Task.CompletedTask; });
        await next(context);
    }
}
