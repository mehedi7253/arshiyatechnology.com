<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $siteData->fav_icon }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $siteData->fav_icon }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $siteData->fav_icon }}">
    <link rel="manifest" href="v">
    <link rel="mask-icon" href="{{ $siteData->fav_icon }}" color="#666666">
    <link rel="shortcut icon" href="{{ $siteData->fav_icon }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('frontend') }}/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    @include('frontend.layouts.header')
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-14">
            @include('frontend.layouts.nav')
        </header><!-- End .header -->

        <main class="main">
           @yield('content')
        </main><!-- End .main -->

        <footer class="footer">
           @include('frontend.layouts.footer')
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        @include('frontend.layouts.mobile')
    </div><!-- End .mobile-menu-container -->



    <!-- Plugins JS File -->
   @include('frontend.layouts.script')
</body>


<!-- molla/index-14.html  22 Nov 2019 09:59:54 GMT -->
</html>
