<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title')
    </title>

    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Font Awesome -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Faculty CSS -->

    <link
        rel="stylesheet"
        href="{{ asset('css/faculty/faculty.css') }}">

</head>

<body>

    @include('faculty.partials.sidebar')

    <div class="main">

        @yield('content')

    </div>

    <script
        src="{{ asset('js/faculty/faculty.js') }}">
    </script>

</body>

</html>
