@extends('layouts.app')

@section('content')
    <h1>Liste des Activités</h1>
    <ul>
        @foreach($activites as $activite)
            <li>
                <a href="{{ route('activites.show', $activite->id) }}">{{ $activite->titre }}</a>
            </li>
        @endforeach
    </ul>
@endsection
