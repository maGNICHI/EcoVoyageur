
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
    width: calc(33.33% - 20px);
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

    @include('nav') {{-- Inclure le fichier de navigation --}}

    <h1 style="margin-top: 100px; margin-left: 73px">Liste des Activités</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div class="card-container">
        @foreach($activites as $activite)
            <div class="timeline-body card">
                <div class="timeline-header card-header">
                    <span class="userimage">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Avatar" class="user-avatar">
                    </span>
                    <span class="username">Créateur: Manar</span>
                    <span class="text-muted">Créé le : {{ $activite->created_at->format('F j, Y, g:i a') }}</span>
                </div>
                <div class="timeline-content card-body">
                    <h4>{{ $activite->titre }}</h4>
                    <p>{{ $activite->contenu }}</p>
                    @if($activite->image)
                    <p>
                        <img src="{{ asset('uploads/' . $activite->image) }}" class="img-fluid" width="300" alt="Image de l'activité">
                    </p>
                    @endif
                </div>
                <div class="timeline-footer card-footer">
                    <a href="{{ route('activites.show', $activite->id) }}" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
        @endforeach
    </div>

    @include('footer') {{-- Inclure le fichier de pied de page --}}
</div>
