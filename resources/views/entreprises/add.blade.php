@extends('layouts.app')

@section('content')

<h1 class="page-header text-center">Ajouter une entreprise</h1>

<form class="form-horizontal" role="form" method="POST" action="{{ url('/entreprises/ajouter') }}">
    {!! csrf_field() !!}

    
    <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Nom de l'entreprise</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="nom" value="{{ old('nom') }}">

            @if ($errors->has('nom'))
                <span class="help-block">
                    <strong>{{ $errors->first('nom') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Adresse</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="adresse" value="{{ old('adresse') }}">

            @if ($errors->has('adresse'))
                <span class="help-block">
                    <strong>{{ $errors->first('adresse') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Ville</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="ville" value="{{ old('ville') }}">

            @if ($errors->has('ville'))
                <span class="help-block">
                    <strong>{{ $errors->first('ville') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Numero de telephone</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="numero">

            @if ($errors->has('numero'))
                <span class="help-block">
                    <strong>{{ $errors->first('numero') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('web_site') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Web site de l'entreprise</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name=web_site>

            @if ($errors->has('web_site'))
                <span class="help-block">
                    <strong>{{ $errors->first('web_site') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <hr>
    <div class="form-group">
        <div class="text-center">
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-btn fa-user"></i>Ajouter l'entreprise
            </button>
        </div>
    </div>
</form>
@endsection

@section('javascript')
<script>
    TweenMax.from('.container ', 1, {
        y : -500,
        opacity:0,
        ease: Back.easeOut
    });
</script>
@endsection