@extends('frontend.layouts.app')
@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="login-page pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-color: #70ced9">
    <div class="container">
        <div class="form-box">
            <div class="form-tab">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="singin-email-2">Email Address *</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="singin-email-2" name="email" placeholder="Enter Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="singin-password-2">Password *</label>
                        <input type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" id="singin-password-2" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-outline-primary-2">
                            <span>LOG IN</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                            <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                        </div>
                        <a href="#" class="forgot-link">Forgot Your Password?</a>
                    </div>
                </form>
                <div class="form-choice">
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            <a href="{{ route('register') }}" class="btn btn-outline-primary-2">
                                New User? Registration
                            </a>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4 mt-2">
                            <a class="btn btn-primary" href="{{ route('auth.facebook') }}" style="display: block;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 32 32">
                                    <path fill="#FFFFFF" d="M32 16.084c0-8.837-7.162-16-16-16S0 7.247 0 16.084c0 8.013 5.873 14.644 13.568 15.843v-11.22h-4.087v-4.623h4.087v-3.489c0-4.041 2.423-6.279 6.118-6.279 1.775 0 3.628.312 3.628.312v3.985h-2.046c-2.017 0-2.637 1.255-2.637 2.539v2.931h4.467l-.713 4.623h-3.754v11.22C26.127 30.728 32 24.097 32 16.084z"/>
                                </svg>
                                Login with Facebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End .login-page section-bg -->
@endsection
