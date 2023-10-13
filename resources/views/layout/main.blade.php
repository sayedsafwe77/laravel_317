<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Clinic')</title>
</head>

<body>
    <nav>
        <ul>
            <li>Home</li>
            <li>Category</li>
            <li>Products</li>
            <li>User</li>
            <li>orders</li>
        </ul>
    </nav>

    <section>
        @yield('content')
    </section>

    <footer>
        @copyrights reserved
    </footer>

</body>

</html>
