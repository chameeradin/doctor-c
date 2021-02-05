<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.admin-head')
<body>
<div class="adminx-container d-flex justify-content-center align-items-center">
    <div class="page-error">
        <div class="error-code">
            503
        </div>
        <h1>Be patient</h1>

        <p class="text-muted mb-5">
            Oops... something went wrong.
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