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
        gap: 20px; /* Spacing between the cards */
    }

    .card {
        margin-left: 40px;
        margin-top: 12px;
        margin-bottom: 34px;
        background-color: #f9f9f9; /* Background color of the card */
        border: 1px solid #ddd; /* Border of the card */
        border-radius: 8px; /* Rounded corners */
        padding: 20px; /* Inner spacing */
        width: calc(33.33% - 20px); /* Width of the card (3 per row) */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Card shadow */
    }

    .card-header {
        margin-bottom: 15px; /* Spacing between the title and body */
    }

    .card-body {
        margin-bottom: 15px; /* Spacing between body and footer */
    }

    .card-footer {
        display: flex;
        justify-content: space-between; /* Spacing between buttons */
    }

    .btn {
        background-color: #007bff; /* Background color of the button */
        color: white; /* Text color of the button */
        padding: 10px 15px; /* Inner spacing of the button */
        border: none; /* No border */
        border-radius: 5px; /* Rounded corners */
        text-decoration: none; /* No underline */
        cursor: pointer; /* Hand cursor */
    }

    .btn:hover {
        background-color: #0056b3; /* Background color on hover */
    }
</style>

<div class="background-container">

    @include('nav') {{-- Includes your navigation file --}}

    <h1 style="margin-top: 100px; margin-left: 73px">Liste des Certificats</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div class="card-container">
        @foreach($certificats as $certificat)
            <div class="card">
                <div class="card-header">
                    <h2>{{ $certificat->nom }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Description :</strong> {{ $certificat->description }}</p>
                    <p><strong>Organisme Émetteur :</strong> {{ $certificat->organisme_emetteur }}</p>
                    <p><strong>Date d'Attribution :</strong> {{ \Carbon\Carbon::parse($certificat->date_attribution)->format('d/m/Y') }}</p>
                    <p><strong>Date d'Expiration :</strong> {{ \Carbon\Carbon::parse($certificat->date_expiration)->format('d/m/Y') }}</p>
                    <p><strong>Partenaire :</strong> {{ $certificat->partenaire ? $certificat->partenaire->nom : 'N/A' }}</p> <!-- Assuming 'nom' is the field for the partner name -->
                </div>
               
            </div>
        @endforeach
    </div>

    @include('footer') {{-- Includes your footer file --}}

</div>
