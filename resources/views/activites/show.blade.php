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
        margin-top: 10px;
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

    .timeline-comment-box {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        .timeline-comment-box .user img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .timeline-comment-box .input {
            flex-grow: 1;
            margin-left: 10px;
        }

        .input-group {
            display: flex;
        }
        .input-group input {
            flex-grow: 1;
            border-radius: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .input-group button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            cursor: pointer;
            margin-left: 10px;
        }

        .input-group button:hover {
            background-color: #0056b3;
        }




</style>

<div class="background-container">
    @include('nav')

    <h1 class="text-center my-5">Détails de l'Activité</h1>

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
                <span class="username">Manar </span>
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
        <div class="timeline-likes">
            <div class="stats-right">
                
                <span class="stats-text">{{ $activite->avis()->count() }} Avis</span>
            </div>
            
        </div>
        <div class="comment-section">
            @foreach($activite->avis as $avis)
            <div class="timeline-body">
                <div class="timeline-header">
                    <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt=""></span>
                    <span class="username">Manar</span>
                    <span class="text-muted">{{ $avis->created_at->format('d/m/Y') }}</span>
                </div>
                <div class="timeline-content">
                    <p>{{ $avis->contenu }}</p>
                </div>
             </div>
            @endforeach
        </div>
                
                
        <div class="timeline-comment-box">
           
            
        <div class="input">
        <form action="{{ route('avis.store', ['activite' => $activite->id])  }}" method="POST">
            @csrf
            <input type="hidden" name="activite_id" value="{{ $activite->id }}">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Écrire votre avis..." name="contenu">
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>

    @include('footer')
</div>
