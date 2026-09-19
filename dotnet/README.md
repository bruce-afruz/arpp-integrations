# ASP.NET Core

Copy `ParpMiddleware.cs` into the application, then add before MVC/static file
handlers: `app.UseMiddleware<ParpMiddleware>(context => tokens.GetValueOrDefault(context.Request.Path));`.
The middleware uses `OnStarting` so the Link header is set before the response
has begun.
