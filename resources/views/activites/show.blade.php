<style>
    .background-container {
        background-color: #dfe7f2;
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    .card-container {
        display: flex;
        flex-direction: column; /* Empile les cartes verticalement */
        align-items: center; /* Centre les cartes horizontalement */
        gap: 20px; /* Espacement entre les cartes */
        padding: 20px;
    }

    .timeline-body {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        width: 100%; /* Ajusté pour prendre toute la largeur disponible */
        max-width: 600px; /* Limite la largeur maximum de la carte */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .timeline-body:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .timeline-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .timeline-header .userimage img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

    .username {
        font-weight: bold;
        font-size: 16px;
    }

    .text-muted {
        font-size: 12px;
        color: #999;
        margin-left: auto;
    }

    .timeline-content h4 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .timeline-content p {
        color: #555;
        margin-bottom: 10px;
    }

    .timeline-content img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 10px 0;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .timeline-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: 10px;
    }

    .timeline-footer .btn {
        background-color: #007bff;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .timeline-footer .btn:hover {
        background-color: #0056b3;
    }
</style>

<div class="background-container">
    @include('nav') 

    <h1 class="text-center my-5">Liste des Activités</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card-container">
        <h2>Détails de l'Activité</h2>
        <div class="timeline-body">
            <div class="timeline-header">
                <span class="userimage">
                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Avatar" class="user-avatar">
                </span>
                <span class="username">Créateur: </span>
                <span class="text-muted">Créé le: {{ $activite->created_at->format('d/m/Y') }}</span>
            </div>
            <div class="timeline-content">
                <h4>{{ $activite->titre }}</h4>
                <p>{{ $activite->contenu }}</p>
                @if($activite->image)
                    <img src="{{ asset('uploads/' . $activite->image) }}" alt="Image de l'activité">
                @endif
            </div>
        </div>

        <h3>Avis</h3>
        @if($activite->avis->isEmpty())
            <p>Aucun avis pour cette activité.</p>
        @else
            @foreach($activite->avis as $avis)
                <div class="timeline-body mb-3">
                    <div class="timeline-content">
                        <p>{{ $avis->contenu }}</p>
                        <small>Posté le {{ $avis->created_at->format('d/m/Y') }}</small>
                    </div>
                </div>
            @endforeach
        @endif

        <h3>Laisser un avis</h3>
        <form action="{{ route('avis.store', $activite->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="contenu">Votre avis :</label>
                <textarea name="contenu" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Soumettre</button>
        </form>
    </div>

    @include('footer') 
</div>
