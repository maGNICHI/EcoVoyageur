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

        button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-retour {
            display: inline-block;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-retour:hover {
            background-color: #0056b3;
        }
    </style>

    <h1>Ajouter un Hébergement</h1>

    <form action="{{ route('hebergements.store') }}" method="POST">
        @csrf
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <div>
            <label for="duree">Durée :</label>
            <input type="text" id="duree" name="duree" required>
        </div>

        <div>
            <label for="prix">Prix :</label>
            <input type="text" id="prix" name="prix" required>
        </div>

        <button type="submit">Ajouter</button>
        <a href="{{ route('hebergements.index') }}" class="btn-retour">Retour</a>
    </form>
@endsection
