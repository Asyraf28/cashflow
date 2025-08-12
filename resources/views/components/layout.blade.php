<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cash Flow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">

    <style>
        * {
            font-family: "Montserrat";
        }

        .vertical-nav {
            min-height: 100vh;
            width: 250px;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .nav-link {
            transition: background-color 0.2s, color 0.2s;
            border-radius: 0.375rem;
        }

        .nav-link:hover,
        .nav-link.active {
            background: linear-gradient(90deg, #309EE6, #4BC6B5, #65EE83);
            color: #fff !important;
            font-weight: 500;
        }

        .user-info {
            font-size: 0.875rem;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="d-flex">
        <nav class="vertical-nav bg-body-secondary border-end">
            <div class="p-3">
                <a class="navbar-brand fw-bold mt-3 d-block d-flex align-items-center justify-content-center"
                    href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" width="40" height="40"
                        class="me-2">
                    <span class="fs-5">Cash Flow</span>
                </a>
                <div class="my-3 text-center user-info">User: {{ auth()->user()->name }}</div>
                <hr>
                <div class="navbar-nav flex-column">
                    <a class="nav-link px-3 my-1 {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        aria-current="page" href="{{ route('dashboard') }}">
                        <i class="pe-2 bi bi-speedometer"></i>
                        Dashboard
                    </a>
                    <a class="nav-link px-3 my-1 {{ request()->routeIs('orders.index', 'orders.create', 'orders.create.detail', 'orders.show') ? 'active' : '' }}"
                        href="{{ route('orders.index') }}">
                        <i class="pe-2 bi bi-cart"></i>
                        Orders
                    </a>
                    <a class="nav-link px-3 my-1 {{ request()->routeIs('categories.index', 'categories.create', 'categories.edit') ? 'active' : '' }}"
                        href="{{ route('categories.index') }}">
                        <i class="pe-2 bi bi-card-checklist"></i>
                        Categories
                    </a>
                    <a class="nav-link px-3 my-1 {{ request()->routeIs('products.index', 'products.create', 'products.edit') ? 'active' : '' }}"
                        href="{{ route('products.index') }}">
                        <i class="pe-2 bi bi-box-seam"></i>
                        Products
                    </a>
                    <a class="nav-link px-3 my-1 {{ request()->routeIs('users.index', 'users.create', 'users.edit') ? 'active' : '' }}"
                        href="{{ route('users.index') }}">
                        <i class="pe-1 bi bi-people"></i>
                        Users
                    </a>
                </div>

                <div class="mt-auto mb-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 my-1 text-start">
                            <i class="pe-1 bi bi-box-arrow-in-right"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="content bg-body-tertiary">
            @isset($title)
                <div class="border-bottom mb-3">
                    <h4 class="container py-4 fw-bold">{{ $title }}</h4>
                </div>
            @endisset

            {{ $slot }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
