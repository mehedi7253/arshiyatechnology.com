<div class="cta cta-horizontal cta-horizontal-box bg-dark bg-image" style="background-image: url('{{ asset('frontend') }}/assets/images/demos/demo-14/bg-1.jpg');">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-8 offset-xl-2">
                <div class="row align-items-center">
                    <div class="col-lg-5 cta-txt">
                        <h3 class="cta-title text-primary">Join Our Newsletter</h3><!-- End .cta-title -->
                        <p class="cta-desc text-light">Subscribe to get information about products and coupons</p><!-- End .cta-desc -->
                    </div><!-- End .col-lg-5 -->

                    <div class="col-lg-7">
                        <form action="#">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn" type="submit">Subscribe</button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form>
                    </div><!-- End .col-lg-7 -->
                </div><!-- End .row -->
            </div><!-- End .col-xl-8 offset-2 -->
        </div><!-- End .row -->
    </div><!-- End .container-fluid -->
</div><!-- End .cta -->
<div class="footer-middle border-0 bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="widget widget-about">
                    <img src="{{ $siteData->logo }}" class="footer-logo" alt="Footer Logo" style="width: 60%">
                    <p class="text-justify" style="width: 100%; word-wrap: break-word;">{!! $siteData->meta_description !!}</p>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="widget">
                    <h4 class="widget-title">Useful Links</h4>
                    <ul class="widget-list">
                        @foreach ($footer_url as $link)
                            <li><a href="">{{ $link->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="widget">
                    <h4 class="widget-title">Our Service's</h4>
                    <p>{!! substr($service->services, 0, 150) !!}</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="widget">
                    <h4 class="widget-title">My Account</h4>
                    <ul class="widget-list">
                        <li><a href="{{ route('login') }}">Sign In</a></li>
                        <li><a href="cart.html">View Cart</a></li>
                        <li><a href="#">My Wishlist</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- End .row -->
    </div><!-- End .container-fluid -->
</div><!-- End .footer-middle -->

<div class="footer-bottom bg-light">
    <div class="container-fluid">
        <p class="footer-copyright">{{ $siteData->copyright }}
            <br/>
        </p>
        <div class="social-icons social-icons-color">
            <a href="https://github.com/mehedi7253/" target="_blank">Developed by Md.Mehedi Hasan</a>
            {{-- <span class="social-label">Social Media</span>
            <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a> --}}
        </div><!-- End .soial-icons -->
    </div><!-- End .container-fluid -->
</div><!-- End .footer-bottom -->
