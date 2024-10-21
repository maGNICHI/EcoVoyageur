<style>
/* Styles généraux pour la page */
body {
    background-color: #f7f7f7;
    font-family: 'Roboto', sans-serif;
}

.container {
    margin-top: 50px;
}

/* Carte */
.card {
    border-radius: 10px;
    border: none;
    overflow: hidden;
}

.card-header {
    background-color: #4e63d7;/* Dark theme */
    color: #ffffff;
    padding: 20px;
    text-align: center;
    font-size: 1.5rem;
    border-bottom: none;
}

.card-body {
    padding: 40px 30px;
}

/* Champs de formulaire */
.input-group-text {
    background-color: #f8f9fa; /* Light grey background for the icon */
    border: none;
    border-right: 1px solid #ced4da;
}

input.form-control {
    border-left: none;
    padding-left: 10px;
}

input.form-control:focus {
    box-shadow: none;
    border-color: #343a40; /* Dark border when focused */
}

/* Style des erreurs de validation */
.invalid-feedback {
    display: block;
    color: #e3342f; /* Red color for errors */
}

/* Bouton */
.btn {
    font-size: 1rem;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-dark {
    background-color: #4e63d7;
    border-color: #4e63d7;
}

.btn-dark:hover {
    background-color: #4e63d7;
    border-color: #4e63d7;
}

/* Lien retour */
.text-dark a {
    color: #4e63d7;
    font-weight: bold;
    text-decoration: none;
}

.text-dark a:hover {
    text-decoration: underline;
}

/* Ajustements pour mobile */
@media (max-width: 768px) {
    .card-body {
        padding: 20px;
    }
    
    .btn {
        width: 100%;
    }
}


</style>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white text-center">
                    <h4>{{ __('Reset Password') }}</h4>
                </div>

                <div class="card-body py-5">
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-dark btn-block">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Optional section for social logins or additional actions -->
            <div class="text-center mt-4">
                <p>{{ __('Back to') }} <a href="{{ route('login') }}" class="text-dark"><strong>{{ __('Login') }}</strong></a></p>
            </div>
        </div>
    </div>
</div>

@endsection
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>
