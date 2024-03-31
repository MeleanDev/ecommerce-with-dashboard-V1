<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda Online</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("assets/css/elegant-icons.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("assets/css/nice-select.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("assets/css/jquery-ui.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("assets/css/owl.carousel.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("assets/css/slicknav.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}" type="text/css">
</head>

<body>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('tienda.componentes.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @include('tienda.componentes.hero')
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    @include('tienda.componentes.breadcrumb')
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    @yield('contenido')
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    @include('tienda.componentes.footer')
    <!-- Footer Section End -->

    <script src="{{ asset("assets/js/jquery-3.3.1.min.js") }}"></script>
    <script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.nice-select.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery-ui.min.js") }}"></script>
    <script src="{{ asset("assets/js/jquery.slicknav.js") }}"></script>
    <script src="{{ asset("assets/js/mixitup.min.js") }}"></script>
    <script src="{{ asset("assets/js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("assets/js/main.js") }}"></script>


</body>

</html>