@extends('layouts.app')

@section('content')

<h1 class="page-header text-center">Création d'un compte</h1>

<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {!! csrf_field() !!}

    
    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label"> <span style="color:red">*</span> Prénom</label>

        <div class="col-md-6">
            <input type="text" class="form-control"
                   name="firstname" placeholder="Prénom" value="{{ old('firstname') }}">

            @if ($errors->has('firstname'))
                <span class="help-block">
                    <strong>{{ $errors->first('firstname') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label"> <span style="color:red">*</span> Nom</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nom">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label"> <span style="color:red">*</span> Adresse e-mail</label>

        <div class="col-md-6">
            <input type="email" class="form-control" 
                    name="email" value="{{ old('email') }}" placeholder="E-mail">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label"> <span style="color:red">*</span> Mot de passe</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password" placeholder="Mot de passe">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label"><span style="color:red">*</span> Confirmer le mot de passe</label>

        <div class="col-md-6">
            <input type="password" class="form-control"
                   name="password_confirmation" placeholder="Confirmer le mot de passe">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <hr>

    <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Adresse</label>
        <div class="col-md-6">
            <textarea name="adresse" id="adresse" rows="3"
                      class="form-control" placeholder="Adresse"
                      value="{{ old('adresse') }}"></textarea>
             @if ($errors->has('adresse'))
                <span class="help-block">
                    <strong>{{ $errors->first('adresse') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Téléphone</label>
        <div class="col-md-6">
            <input type="text" name="telephone" id="telephone"
                   class="form-control" placeholder="Téléphone"
                   value="{{ old('telephone') }}">

             @if ($errors->has('telephone'))
                <span class="help-block">
                    <strong>{{ $errors->first('telephone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
    <hr>

    <div class="form-group{{ $errors->has('date_naissance') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Date de naissance</label>
        <div class="col-md-6">
            <input name="date-naissance" id="date-naissance"
                   class="form-control" placeholder="Date de naissance"
                   value="{{ old('date_naissance') }}">
             @if ($errors->has('date_naissance'))
                <span class="help-block">
                    <strong>{{ $errors->first('date_naissance') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ville_naissance') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Ville de naissance</label>
        <div class="col-md-6">
            <input name="ville-naissance" id="ville-naissance"
                   class="form-control" placeholder="Ville de naissance"
                   value="{{ old('ville_naissance') }}">
             @if ($errors->has('ville_naissance'))
                <span class="help-block">
                    <strong>{{ $errors->first('ville_naissance') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('nationalite') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Nationalité</label>
        <div class="col-md-6">
            <input name="nationalite" id="nationalite"
                   class="form-control" placeholder="Nationalité"
                   value="{{ old('nationalite') }}">
             @if ($errors->has('nationalite'))
                <span class="help-block">
                    <strong>{{ $errors->first('nationalite') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group{{ $errors->has('num_secu') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Numéro de sécurité sociale</label>
        <div class="col-md-6">
            <input name="num-secu" id="num-secu"
                   class="form-control" placeholder="Numéro de sécurité sociale"
                   value="{{ old('num_secu') }}">
             @if ($errors->has('num-secu'))
                <span class="help-block">
                    <strong>{{ $errors->first('num_secu') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('statut') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Statut</label>
        <div class="col-md-6">
            <input name="statut" id="statut"
                   class="form-control" placeholder="Statut"
                   value="{{ old('statut') }}">
             @if ($errors->has('statut'))
                <span class="help-block">
                    <strong>{{ $errors->first('statut') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('pes') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Pes</label>
        <div class="col-md-6">
            <div class="col-md-6">
                Est-ce que MiND est ton PES ?
            </div>
            <div class="col-md-6">
                <label>Oui &nbsp;<input type="radio" name="pes" value="oui"></label><br>
                <label>Non &nbsp;<input type="radio" name="pes" value="non"></label>
            </div>
             @if ($errors->has('pes'))
                <span class="help-block">
                    <strong>{{ $errors->first('pes') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <hr>
    <div class="form-group">
        <div class="text-center">
            <button type="submit" class="btn btn-danger btn-lg">
                <i class="fa fa-btn fa-user"></i>Créer le compte
            </button>
        </div>
    </div>
</form>
@endsection
<!-- 
    'pes' => $data['pes'],
 -->
    
@section('javascript')
    <script src="/js/form_animation.js"></script>
@endsection