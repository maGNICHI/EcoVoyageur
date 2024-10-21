


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

    <div class="card-container">
    <h1>Modifier la Réclamation</h1>

    <form action="{{ route('reclamations.update', $reclamation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="sujet">Sujet :</label>
            <input type="text" id="sujet" name="sujet" value="{{ $reclamation->sujet }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" required>{{ $reclamation->description }}</textarea>
        </div>

        <button type="submit">Mettre à jour</button>
        <a href="{{ route('reclamations.index') }}" class="btn-retour">Retour</a>
    </form>
    </div>

    @include('footer') {{-- Include your footer file --}}
</div>

