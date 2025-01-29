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
                </div>
            </div>
        </div>
    </div>
</div><!-- End .login-page section-bg -->
@endsection
