<style>
    .background-container {
        background-color: #dfe7f2; /* Background color of the container */
        margin: 0;
        padding: 0;
        min-height: 100vh; /* Ensure the container takes the full height of the page */
    }

    .main-heading {
        text-align: center; /* Center align the title */
        margin-top: 60px; /* Space below the navigation bar */
        font-size: 2em; /* Set font size for the title */
        color: #333; /* Title color */
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Spacing between cards */
        justify-content: center; /* Center align the cards */
        margin: 20px; /* Add margin around the card container */
    }

    .card {
        background-color: #f9f9f9; /* Background color of the card */
        border: 1px solid #ddd; /* Border of the card */
        border-radius: 8px; /* Rounded corners */
        padding: 20px; /* Inner spacing */
        width: calc(33.33% - 20px); /* Width of the card (3 per row) */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Card shadow */
        margin: 12px 0; /* Vertical margin for spacing between cards */
    }

    .card-body {
        margin-bottom: 15px; /* Spacing between body and footer */
    }

    .success-message {
        text-align: center; /* Center align the success message */
        color: green; /* Success message color */
        margin: 20px 0; /* Spacing around the message */
        font-size: 1.2em; /* Slightly larger font for visibility */
    }
</style>

<div class="background-container">
    @include('nav') {{-- Include your navigation file --}}

    <h1 class="main-heading">Liste de vos réclamations</h1>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <a href="{{ route('reclamations.create') }}" class="btn" style="margin-bottom: 12px;">Ajouter une Réclamation</a>
    <div class="card-container">
    @foreach($reclamations as $reclamation)
    <div class="card">
        <div class="card-body">
            <p><strong>Sujet :</strong> {{ $reclamation->sujet }}</p>
            <p><strong>Description :</strong> {{ $reclamation->description }}</p>
            @if($reclamation->reponses->isNotEmpty())
                <p><strong>Réponse(s) :</strong></p>
                <ul>
                    @foreach($reclamation->reponses as $reponse)
                        <li>{{ $reponse->message }}</li>
                    @endforeach
                </ul>
            @else
                <p><strong>Réponse :</strong> Aucune réponse associée</p>
            @endif 
        </div>

        <a href="{{ route('reclamations.edit', $reclamation->id) }}" class="btn btn-warning">Modifier</a>
    </div>
@endforeach

    </div>

    @include('footer') {{-- Include your footer file --}}
</div>

