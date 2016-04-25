@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Inscription !',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

        <p>{{ $nom }} souhaite s'inscrire au pole {{ $pole }}</p>
        <p>Voici la raison donnée par l'inscrit : <br> "{{ $commentaire }}"</p>

    @include('beautymail::templates.sunny.contentEnd')

    @include('beautymail::templates.sunny.button', [
            'title' => 'Voir la liste des demandes',
            'link' => 'http://google.com'
    ])

@stop