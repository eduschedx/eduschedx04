<!DOCTYPE html>
<html lang="en">

<head>

    <link
    rel="stylesheet"
    href="{{ asset('css/admin/admin.css') }}">

    @yield('styles')

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Font Awesome -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Admin CSS -->

    <link
        rel="stylesheet"
        href="{{ asset('css/admin/admin.css') }}">

    <link
    rel="stylesheet"
    href="{{ asset('css/admin/faculty-subjects.css') }}">
</head>

<body>

    @include('admin.partials.mobile-header')

    @include('admin.partials.sidebar')

    <div class="main">

        @yield('content')

    </div>

    <script src="{{ asset('js/admin/filters.js') }}"></script>

    <script src="{{ asset('js/admin/sidebar.js') }}"></script>

    <script src="{{ asset('js/admin/reject-modal.js') }}"></script>

    <script src="{{ asset('js/admin/edit-modal.js') }}"></script>

    <script src="{{ asset('js/admin/subjects.js') }}"></script>

    <script src="{{ asset('js/admin/admin.js') }}"></script>

</body>

</html>
