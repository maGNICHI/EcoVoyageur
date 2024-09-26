<style>
    .background-container {
        background-color: #dfe7f2; /* Couleur de fond du conteneur */
        margin: 0;
        padding: 0;
        min-height: 100vh; /* Pour s'assurer que le conteneur prend toute la hauteur de la page */
        display: flex;
        flex-direction: column; /* Pour que les éléments enfants s'empilent verticalement */
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Espacement entre les cartes */
        justify-content: center; /* Centrer les cartes dans le conteneur */
        padding: 20px; /* Espacement intérieur du conteneur de cartes */
    }

    .card {
        background-color: #f9f9f9; /* Couleur de fond de la carte */
        border: 1px solid #ddd; /* Bordure de la carte */
        border-radius: 8px; /* Coins arrondis */
        padding: 20px; /* Espacement intérieur */
        width: calc(33.33% - 20px); /* Largeur de la carte (3 par ligne) */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Ombre de la carte */
        margin: 12px 0; /* Marges verticales pour espacement */
    }

    .card-header {
        margin-bottom: 15px; /* Espacement entre le titre et le corps */
    }

    .card-body {
        margin-bottom: 15px; /* Espacement entre le corps et le pied de page */
    }

    .card-footer {
        display: flex;
        justify-content: space-between; /* Espacement entre les boutons */
    }

    .btn {
        background-color: #007bff; /* Couleur de fond du bouton */
        color: white; /* Couleur du texte du bouton */
        padding: 10px 15px; /* Espacement intérieur du bouton */
        border: none; /* Pas de bordure */
        border-radius: 5px; /* Coins arrondis */
        text-decoration: none; /* Pas de soulignement */
        cursor: pointer; /* Curseur en forme de main */
        transition: background-color 0.3s; /* Transition douce pour le changement de couleur */
    }

    .btn:hover {
        background-color: #0056b3; /* Couleur de fond au survol */
    }

    h1 {
        margin-top: 100px; /* Espace au-dessus du titre */
        margin-left: 73px; /* Espace à gauche du titre */
        color: #333; /* Couleur du texte */
        text-align: center; /* Centrer le texte du titre */
    }

    .alert {
        color: red; /* Couleur des messages d'alerte */
        margin: 15px 0; /* Espacement autour des messages d'alerte */
        font-weight: bold; /* Gras pour le message */
        text-align: center; /* Centrer le texte de l'alerte */
    }
</style>

<div class="background-container">

    @include('nav') {{-- Inclut votre fichier de navigation --}}

    <h1>Liste des Activités</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="card-container">
        @foreach($activites as $item)
            <div class="card">
                <div class="card-header">
                    <h2>{{ $item->nom }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Description :</strong> {{ $item->description }}</p>
                    <p><strong>Date :</strong> {{ $item->date }}</p>
                    <p><strong>Durée :</strong> {{ $item->duree }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('activites.edit', $item->id) }}" class="btn">Modifier</a>
                    <form action="{{ route('activites.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    @include('footer') {{-- Inclut votre fichier de pied de page --}}

</div>
