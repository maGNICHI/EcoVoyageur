@extends('dashboard')

@section('content')
<style>
        form {
            max-width: 600px; /* Limiter la largeur du formulaire */
            margin: 20px auto; /* Centrer le formulaire sur la page */
            padding: 20px; /* Espacement interne */
            border: 1px solid #ccc; /* Bordure légère */
            border-radius: 5px; /* Coins arrondis */
            background-color: #f9f9f9; /* Couleur de fond */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

        h1 {
            text-align: center; /* Centrer le titre */
            color: #333; /* Couleur du texte */
        }

        div {
            margin-bottom: 15px; /* Espacement entre les champs */
        }

        label {
            display: block; /* Les étiquettes prennent toute la largeur */
            margin-bottom: 5px; /* Espacement entre l'étiquette et le champ */
            font-weight: bold; /* Gras pour l'étiquette */
        }

        input[type="text"],
        textarea {
            width: 100%; /* Prendre toute la largeur du conteneur */
            padding: 10px; /* Espacement interne */
            border: 1px solid #ccc; /* Bordure légère */
            border-radius: 5px; /* Coins arrondis */
        }

        button,
        .btn {
            background-color: #007bff; /* Couleur de fond du bouton */
            color: white; /* Couleur du texte */
            border: none; /* Pas de bordure */
            border-radius: 5px; /* Coins arrondis */
            padding: 10px 15px; /* Espacement interne du bouton */
            cursor: pointer; /* Curseur de main */
            transition: background-color 0.3s; /* Effet de transition */
        }

        button:hover,
        .btn:hover {
            background-color: #0056b3; /* Couleur du bouton au survol */
        }
    </style>
    <h1>Ajouter un Transport</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transports.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">Sélectionnez un type de transport</option>
                @foreach (App\Models\Transport::types() as $type)
                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="capacite">Capacité</label>
            <input type="number" name="capacite" id="capacite" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="itineraire_id">Itinéraire</label>
            <select name="itineraire_id" id="itineraire_id" class="form-control" required>
                <option value="">Sélectionnez un itinéraire</option>
                @foreach ($itineraire as $item)
                    <option value="{{ $item->id }}">{{ $item->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn">Ajouter le Transport</button>
        <a href="{{ route('itineraires.index') }}" class="btn">Retour</a>
    </form>
@endsection
