@extends('layouts.app')

@section('content')
<h1 class="page-header">Inscription à un pôle</h1>

<p class="alert alert-warning"><b><i class="fa fa-exclamation-triangle"></i>Attention,</b> vous êtes libre de vous inscrire à n'importe quel pôle.
    Une notification sera envoyée au responsable actuel qui aura la possibilité de vous supprimer du pôle.</p>

<form class="form-horizontal" role="form" method="POST" action="{{ url('/pole/inscription') }}">
    {!! csrf_field() !!}
    <div class="row">
        <div class="col-md-4">
            <div class="radio">
                <label><input type="radio" name="radio" value="Présidence">Présidence</label>
            </div>

            <div class="radio">
                <label><input type="radio" name="radio" value="Administration">Administration</label>
            </div>

            <div class="radio ">
                <label><input type="radio" name="radio" value="Communication">Communication</label>
            </div>

            <div class="radio ">
                <label><input type="radio" name="radio" value="Trésorerie">Trésorerie</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="radio">
                <label><input type="radio" name="radio" value="Suivi de projet">Suivi de projet</label>
            </div>

            <div class="radio">
                <label><input type="radio" name="radio" value="Prospection">Prospection</label>
            </div>

            <div class="radio ">
                <label><input type="radio" name="radio" value="Qualite">Qualité</label>
            </div>

            <div class="radio ">
                <label><input type="radio" name="radio" value="Informatique">Informatique</label>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label for="commentaire">Commentaire</label>
        <textarea class="form-control" rows="3" name="commentaire" id="commentaire"></textarea>
    </div>
    <hr>
    <p class="text-center"><button class="btn btn-info" type="submit"><i class="fa fa-check"></i>M'inscrire</button></p>
</form>


@endsection