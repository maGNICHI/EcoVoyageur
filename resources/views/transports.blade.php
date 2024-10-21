@extends('dashboard')

@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            color: black; 
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

    </style>

    <h1>Liste des Transports</h1>
    <a href="{{ route('transports.create') }}" class="btn btn-primary" style="margin-top: 12px; margin-bottom: 29px;">Ajouter un Transport</a>

    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Description</th>
                <th>Capacité</th>
                <th>Itinéraire</th>
                <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
            </tr>
        </thead>
        <tbody>
            @foreach ($transports as $transport)
                <tr>
                    <td>{{ $transport->type }}</td>
                    <td>{{ $transport->description }}</td>
                    <td>{{ $transport->capacite }}</td>
                    <td>{{ $transport->itineraire ? $transport->itineraire->nom : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('transports.edit', $transport->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('transports.destroy', $transport->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce transport ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
