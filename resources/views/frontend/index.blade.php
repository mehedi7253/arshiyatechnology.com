@extends('frontend.layouts.app')
@section('content')
<div class="mb-lg-2"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9 col-xxl-8 offset-lg-3 offset-xxl-2">
            <div class="intro-slider-container slider-container-ratio mb-2">
                <div class="intro-slider owl-carousel owl-simple owl-nav-inside" id="slider">
                    @forelse ($banners as $banner)
                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)" srcset="{{ $banner->banner_image }}">
                                    <img src="{{ $banner->banner_image }}" alt="Image Desc"  style="height: 382px">
                                </picture>
                            </figure>
                        </div>
                    @empty
                        <p>No Banner</p>
                    @endforelse
                </div>

                <span class="slider-loader"></span>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="section-title text-center">
                <h2 class="section-title-heading mt-4">Our Clients</h2>
            </div>
            <div class="owl-carousel owl-simple" id="clients" style="border: 0.3px solid #70ced9; border-radius: 3px; ">
                @forelse ($clients as $client)
                    <a href="{{ $client->url }}" target="_blank" class="brand">
                        <img src="{{ $client->client_logo }}" alt="Our Client" style="height: auto; width: 87px; margin-top: 6rem; margin-bottom: 6rem">
                    </a>
                @empty
                    <p class="text-danger">Not Clients found</p>
                @endforelse
                {{-- <div class="owl-dots"></div> --}}
            </div>
        </div>
    </div>
</div>


@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#slider').owlCarousel({
                loop: false,
                items : 1,
                autoplay: false,
                autoplayTimeout: 3000,
            });
            $('#clients').owlCarousel({
                nav: true,
                dots: true,
                margin: 10,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                responsive: {
                    1920: {
                        items: 7
                    },
                    1028: {
                        items: 7
                    },
                    600: {
                        items: 3
                    },
                    320: {
                        items: 2
                    }
                }
            });
        });
    </script>
@endpush
