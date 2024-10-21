<style>
    .background-container {
        background-color: #dfe7f2; /* Background color of the container */
        margin: 0;
        padding: 0;
        min-height: 100vh; /* Ensures the container takes the full height of the page */
    }
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Spacing between cards */
    }

    .card {
        margin-left: 40px;
        margin-top: 12px;
        margin-bottom: 34px;
        background-color: #f9f9f9; /* Background color of the card */
        border: 1px solid #ddd; /* Border of the card */
        border-radius: 8px; /* Rounded corners */
        padding: 20px; /* Inner spacing */
        width: calc(33.33% - 20px); /* Card width (3 per row) */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Card shadow */
    }

    .card-body {
        margin-bottom: 15px; /* Spacing between body and footer */
    }

    .btn {
        background-color: #007bff; /* Button background color */
        color: white; /* Button text color */
        padding: 10px 15px; /* Button inner spacing */
        border: none; /* No border */
        border-radius: 5px; /* Rounded corners */
        text-decoration: none; /* No underline */
        cursor: pointer; /* Pointer cursor */
    }

    .btn:hover {
        background-color: #0056b3; /* Background color on hover */
    }
</style>

<div class="background-container">
    @include('nav') {{-- Include your navigation file --}}

    <h1 style="margin-top: 100px; margin-left: 73px">Liste des Hébergements</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div class="card-container">
        @foreach($hebergements as $hebergement)
            <div class="card">
                <div class="card-body">
                    <p><strong>Nom :</strong> {{ $hebergement->nom }}</p>
                    <p><strong>Description :</strong> {{ $hebergement->description }}</p>
                    <p><strong>Durée :</strong> {{ $hebergement->duree }}</p>
                    <p><strong>Prix :</strong> {{ number_format($hebergement->prix, 2, ',', ' ') }} €</p>
                </div>
                <!-- Uncomment the section below to add Edit and Delete buttons -->
                <!--
                <div class="card-footer">
                    <a href="{{ route('hebergements.edit', $hebergement->id) }}" class="btn">Modifier</a>
                    <form action="{{ route('hebergements.destroy', $hebergement->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">Supprimer</button>
                    </form>
                </div>
                -->
            </div>
        @endforeach
    </div>

    @include('footer') {{-- Include your footer file --}}
</div>
