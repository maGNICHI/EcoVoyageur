

@extends('dashboard')

@section('content')
    <h1>Détails de l'Activité : {{ $activite->titre }}</h1>

    <div>
        <p><strong>Titre : </strong>{{ $activite->titre }}</p>
        <p><strong>Contenu : </strong>{{ $activite->contenu }}</p>
        @if($activite->image)
            <p><strong>Image : </strong></p>
            <img src="{{ asset('uploads/' . $activite->image) }}" class="img-fluid" width="300" alt="Image de l'activité">
        @endif
    </div>

    <h2>Avis sur cette activité</h2>
    <ul>
        @foreach($activite->avis as $avis)
            <li>
                {{ $avis->contenu }}
            </li>
        @endforeach
    </ul>
    
    <a href="{{ route('activites.index') }}" class="btn btn-primary">Retour à la liste</a>
@endsection
