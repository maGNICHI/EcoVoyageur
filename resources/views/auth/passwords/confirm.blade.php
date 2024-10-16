<style>
body {
    background-color: #f7f7f7; /* Couleur de fond douce */
    font-family: 'Roboto', sans-serif; /* Police moderne */
}

.container {
    margin-top: 50px;
}

/* Carte */
.card {
    border-radius: 10px; /* Coins arrondis */
    border: none; /* Suppression de la bordure par défaut */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Ombre douce */
}

/* En-tête de la carte */
.card-header {
    background-color: #007bff; /* Couleur de fond bleue */
    color: #ffffff; /* Couleur de texte blanche */
    padding: 20px;
    font-size: 1.5rem; /* Taille de police plus grande */
}

/* Corps de la carte */
.card-body {
    padding: 40px 30px; /* Espacement interne */
}

/* Étiquettes et champs de formulaire */
.form-label {
    font-weight: bold; /* Texte en gras pour l'étiquette */
}

input.form-control {
    border-radius: 5px; /* Coins arrondis pour le champ de saisie */
}

input.form-control:focus {
    box-shadow: none; /* Suppression de l'ombre par défaut lors de la mise au point */
    border-color: #007bff; /* Changer la couleur de la bordure sur le focus */
}

/* Style des erreurs de validation */
.invalid-feedback {
    display: block; /* Affichage en bloc pour les messages d'erreur */
    color: #e3342f; /* Couleur rouge pour les erreurs */
}

/* Bouton */
.btn {
    font-size: 1rem;
    padding: 10px 20px; /* Espacement interne du bouton */
    border-radius: 5px; /* Coins arrondis pour le bouton */
}

/* Lien de réinitialisation */
.btn-link {
    color: #007bff; /* Couleur bleue pour le lien */
}

.btn-link:hover {
    text-decoration: underline; /* Soulignement au survol */
}

/* Ajustements pour mobile */
@media (max-width: 768px) {
    .card-body {
        padding: 20px; /* Espacement interne réduit sur mobile */
    }
    
    .btn {
        width: 100%; /* Boutons en largeur complète sur mobile */
    }
}
    
    </style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    <p class="text-muted text-center">{{ __('Please confirm your password before continuing.') }}</p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirm Password') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>