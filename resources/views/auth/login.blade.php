@extends('layouts.app')

@section('content')

<h1 class="page-header text-center">Connexion</h1>

<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {!! csrf_field() !!}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Adresse mail</label>

        <div class="col-md-6">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Mot de passe</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Se souvenir de moi
                </label>
                <a class="btn btn-link" href="{{ url('/password/reset') }}">Mot de passe oublié ?</a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="text-center">
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-btn fa-sign-in"></i>Se connecter
            </button>

        </div>
    </div>
</form>

@endsection

@section('javascript')
    <script src="/js/form_animation.js"></script>
@endsection
