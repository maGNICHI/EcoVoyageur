@extends('dashboard')

@section('content')
<style>
    /* Add your custom styles here or include a CSS file */
</style>

<h1>Liste des Hébergements (Stem)</h1>
<a href="{{ route('hebergements.create') }}" class="btn btn-primary" style="margin-top: 12px; margin-bottom: 29px;">Ajouter un Hébergement</a>

<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Durée</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hebergements as $item)
            <tr>
                <td>{{ $item->nom }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->duree }}</td>
                <td>{{ $item->prix }}</td>
                <td>
                    <a href="{{ route('hebergements.edit', $item->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('hebergements.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet hébergement ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
