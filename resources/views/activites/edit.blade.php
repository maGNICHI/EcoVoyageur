@extends('dashboard')

@section('content')
    <style>
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button,
        .btn-retour {
            display: inline-block;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        button:hover,
        .btn-retour:hover {
            background-color: #0056b3;
        }

        .alert {
            color: red;
            margin: 15px 0;
            font-weight: bold;
        }

        img {
            max-width: 100px; /* Limite la taille de l'image */
            margin-top: 10px;
        }
    </style>

    <h1>Modifier une Activité</h1>

    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('activites.update', $activite->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $activite->nom) }}" required>
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required>{{ old('description', $activite->description) }}</textarea>
        </div>

        <div>
            <label for="duree">Durée :</label>
            <input type="text" id="duree" name="duree" value="{{ old('duree', $activite->duree) }}" required>
        </div>

        <!-- Section pour l'upload d'image -->
        <div>
            <label for="image">Image :</label>
            <input type="file" id="image" name="image">

            @if($activite->image)
                <img src="{{ asset('uploads/' . $activite->image) }}" alt="Image actuelle">
            @endif
        </div>

        <button type="submit">Modifier</button>
        <a href="{{ route('activites.index') }}" class="btn-retour">Retour</a>

    </form>
@endsection
