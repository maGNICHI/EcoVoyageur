<!DOCTYPE html>
<html>
<head>
    <title>Liste des Destinations</title>
    <style>
        .background-container {
            background-color: #dfe7f2; 
            margin: 0;
            padding: 0;
            min-height: 100vh; 
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            margin-left:40px;
            margin-top: 12px;
            margin-bottom: 34px;
            background-color: #f9f9f9; 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            padding: 20px; 
            width: calc(33.33% - 20px); 
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
        }

        .card-header {
            margin-bottom: 15px; 
        }

        .card-body {
            margin-bottom: 15px; 
        }

        .card-footer {
            display: flex;
            justify-content: space-between; 
        }

        .btn {
            background-color: #007bff; 
            color: white; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 5px; 
            text-decoration: none; 
            cursor: pointer; 
        }

        .btn:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <div class="background-container">
        @include('nav') {{-- Inclut votre fichier de navigation --}}

        <h1 style="margin-top: 100px; margin-left:73px">Liste des Destinations</h1>

        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif

        <div class="card-container">
            @foreach($destinations as $destination)
                <div class="card">
                    <div class="card-body">
                        <p><strong>Nom :</strong> {{ $destination->nom }}</p>
                        <!-- <p><strong>Pays :</strong> {{ $destination->pays }}</p> -->
                        <p><strong>Description :</strong> {{ $destination->description }}</p>
                        <!-- <p><strong>Activité Locale :</strong> {{ $destination->activite_locale }}</p> -->
                        <!-- <p><strong>Images :</strong> {{ $destination->images }}</p> -->
                        <p><strong>Adresse :</strong> {{ $destination->adresse }}</p>
                        <p><strong>Latitude :</strong> {{ $destination->latitude }}</p>
                        <p><strong>Longitude :</strong> {{ $destination->longitude }}</p>
                    </div>

                </div>
            @endforeach
        </div>

        @include('footer') {{-- Inclut votre fichier de pied de page --}}
    </div>
</body>
</html>