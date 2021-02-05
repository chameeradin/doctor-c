<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.admin-head')
<body>
<div class="adminx-container d-flex justify-content-center align-items-center">
    <div class="page-error">
        <div class="error-code">
            404
        </div>
        <h1>Page not found</h1>

        <p class="text-muted mb-5">
            Oops... the page you requested could not be found.
        </p>
        @if (auth()->check())
        <a href="/admin/dashboard" class="btn btn-primary">Return to the dashboard</a>
            @else
        <a href="/" class="btn btn-primary">Return to the Home page</a>
        @endif
    </div>
</div>

@include('layouts.admin.admin-footer')
</body>
</html>