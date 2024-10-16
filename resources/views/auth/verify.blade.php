<style>
    body {
    background-image: linear-gradient(to right, #4e63d7 0%, #76bfe9 100%) !important;
    margin-top: 20px;
}

/* ===== LOGIN PAGE ===== */
.login-box {
    box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.login-box .form-wrap {
    padding: 30px 25px;
    border-radius: 10px;
    box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
}

.form-group .zmdi {
    position: absolute;
    z-index: 1;
    color: #fff;
    background-color: #4e63d7;
    border-radius: 5px;
    height: 100%;
    width: 45px;
    text-align: center;
    font-size: 20px;
    padding-top: 13px;
}

.form-group input {
    padding-left: 60px;
    border: 1px solid #e1e1e1;
    box-shadow: none;
    border-radius: 5px;
    transition: all 0.3s ease;
    background-color: #fff;
    color: #858585;
    font-weight: 400;
    position: relative;
}

.socials a {
    width: 35px;
    height: 35px;
    background-color: #6893e1;
    border-radius: 50%;
    box-shadow: 0 3px 2px 0 #516cd9;
    text-align: center;
    color: #fff;
    padding-top: 10px;
    font-size: 16px;
    margin-right: 10px;
    transition: all 0.3s ease;
}

</style>
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />

<div class="container login-section">
    <div class="row">
        <div class="col-md-11 mt-60 mx-md-auto">
            <div class="login-box bg-white pl-lg-5 pl-0">
                <div class="row no-gutters align-items-center">

                    <!-- Social Section on the left -->
                    <div class="col-md-6">
                        <div class="content text-center">
                            <div class="border-bottom pb-5 mb-5">
                                <h3 class="c-black">Want to explore more?</h3>
                                <a href="{{ route('register') }}" class="btn btn-custom">Register</a>
                            </div>
                            <h5 class="c-black mb-4 mt-n1">Or Connect With</h5>
                            <div class="socials">
                                <a href="#" class="zmdi zmdi-facebook"></a>
                                <a href="#" class="zmdi zmdi-twitter"></a>
                                <a href="#" class="zmdi zmdi-google"></a>
                                <a href="#" class="zmdi zmdi-instagram"></a>
                            </div>
                        </div>
                    </div>

                    <!-- Email Verification Section on the right -->
                    <div class="col-md-6">
                        <div class="form-wrap bg-white">
                            <h4 class="btm-sep pb-3 mb-5">Verify Your Email Address</h4>
                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif

                                <p class="mb-4">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                                <p>{{ __('If you did not receive the email') }},
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>
