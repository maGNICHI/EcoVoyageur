
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
            padding: 10px 15px; 
            border: none; 
            border-radius: 5px; 
            text-decoration: none; 
            cursor: pointer; 
        }

        .btn:hover {
            background-color: #0056b3; 
        }
    </style>

    <h1 style="margin-top: 20px;">Liste des Réclamations</h1>


    <table>
        <thead>
            <tr>
                <th>Sujet</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reclamations as $reclamation)
                <tr>
                    <td>{{ $reclamation->sujet }}</td>
                    <td>{{ $reclamation->description }}</td>
                    <td>
                        <a href="{{ route('reclamations.show', $reclamation->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('reclamations.edit', $reclamation->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('reclamations.destroy', $reclamation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réclamation ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
