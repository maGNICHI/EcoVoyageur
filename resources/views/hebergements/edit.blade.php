@extends('dashboard')

@section('content')
    <h1>Modifier un Hébergement</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hebergements.update', $hebergement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $hebergement->nom) }}" required>
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required>{{ old('description', $hebergement->description) }}</textarea>
        </div>

        <div>
            <label for="duree">Durée :</label>
            <input type="text" id="duree" name="duree" value="{{ old('duree', $hebergement->duree) }}" required>
        </div>

        <div>
            <label for="prix">Prix :</label>
            <input type="text" id="prix" name="prix" value="{{ old('prix', $hebergement->prix) }}" required>
        </div>

        <button type="submit">Modifier</button>
        <a href="{{ route('hebergements.index') }}" class="btn-retour">Retour</a>
    </form>
@endsection
