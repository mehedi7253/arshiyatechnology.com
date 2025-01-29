<!DOCTYPE html>
<html lang="en">
@php
    $siteData = App\Models\SiteSetting::find(1);
    $getMenus = App\Models\Menu::where('is_active', true)
        ->whereNull('parent_id')
        ->orderBy('order', 'ASC')
        ->with('children')
        ->get();
@endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', $siteData->name )</title>
    <meta name="description" content="@yield('meta_description', $siteData->meta_description)">
    <meta name="keywords" content="@yield('meta_keywords', $siteData->meta_keywords)">
    <meta name="author" content="{{ $siteData->name }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="hostname" content="{{ $siteData->name }}">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="3 days">
    <meta name="language" content="English">
    <meta name="rating" content="general">
    <meta name="distribution" content="global">
    <meta name="theme-color" content="#e65467">
    <link rel="icon" type="image/png" href="{{ $siteData->favicon  }}">

    {{-- for social platform --}}
    <meta property="og:locale" content="en_US">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('meta_title', isset($siteData) ? $siteData->name : '')">
    <meta property="og:type" content="website">
    <meta property="og:description" content="@yield('meta_description', isset($siteData) ? $siteData->meta_description : '')">
    <meta property="og:image" content="@yield('meta_image', '')">
    <link rel="canonical" href="{{ url()->current() }} ">

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
