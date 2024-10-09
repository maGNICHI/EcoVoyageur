@extends('dashboard')

@section('content')
    <h1>Liste des Hébergements</h1>
    <a href="{{ route('hebergements.create') }}" class="btn btn-primary" style="margin: 20px 0;">Ajouter un Hébergement</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($hebergements->isEmpty())
        <div class="alert alert-warning">Aucun hébergement trouvé.</div>
    @else
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
                @foreach ($hebergements as $item)  <!-- Corrected variable name -->
                    <tr>
                        <td>{{ $item->nom }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->duree }}</td>
                        <td>{{ number_format($item->prix, 2, ',', ' ') }} €</td> <!-- Format price -->
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
    @endif
@endsection
