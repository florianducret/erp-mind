@extends('layouts.app')

@section('content')

<!--######################################## PREMIERE COLONNE ############################################-->
<!--######################################################################################################-->

<div class="col-md-6">
<h3>Salut {{Auth::user()->firstname }} !</h3>
<hr>
	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="{{ Auth::user()->getProfilePic(100) }}" alt="Image">
		</a>
		<div class="media-body">
			<form class="status-form" method="post"> {!! csrf_field() !!}
				<div class="form-group">
					<textarea name="status" rows="3" class="form-control" placeholder="Poster un nouveau statut"></textarea>
				</div>
					&nbsp;<button class="btn btn-primary"><i class="fa fa-file-pdf-o"></i>Document</button>
					
					<label for="pole" class="pull-right"><input type="checkbox" name="pole" id="pole">&nbsp; Poster au nom du pôle</label>

					<button type="submit" class="btn btn-info pull-left"><i class="fa fa-comment"></i>Poster</button>
			</form>
		</div>
	</div>
<br>
<!--######################################################################################################-->

<form class="row">
	<label for="" class="col-md-4"><input type="radio" name="voir" id=""> Ne voir que mon pôle</label>
	<label for="" class="col-md-4"><input type="radio" name="voir" id=""> Tout voir</label>
</form>

<hr>
<!--######################################################################################################-->

<section id="statuses">
	@if(!$statuses->count())
		<div class="well">Pas de statut pour le moment</div>
	@else
		@foreach($statuses as $status)
			@include('layouts.status')
		@endforeach
	@endif
</section>

</div>

<!--######################################## DEUXIEME COLONNE ############################################-->
<!--######################################################################################################-->

<div class="col-md-5 col-md-offset-1">

<h3 class="page-header"><i class="fa fa-users"></i> Membres de mon pôle</h3>
<div class="well">Nous n'êtes inscrit dans aucun pôle pour le moment.</div>

<a href="/pole/inscription" class="btn btn-success"><i class="fa fa-plus"></i> M'inscrire à un pôle</a>
<br>
<!--######################################################################################################-->

<h3 class="page-header"><i class="fa fa-sticky-note"></i> Ma todo list</h3>
<ul class="list-group">
	<li class="list-group-item">Item 1 <label class="pull-right" > Terminé ? &nbsp;<input type="checkbox"></label></li>
</ul>
<div class="input-group">
	<input type="text" class="form-control" placeholder="Nouvelle tâche">
	<span class="input-group-btn">
		<button type="button" class="btn btn-danger"><i class="fa fa-plus"></i>Ajouter</button>
	</span>
</div>

<br>
<!--######################################################################################################-->

<h3 class="page-header"><i class="fa fa-calendar"></i> Mon calendrier</h3>

</div>
@endsection


@section('javascript')
	<script src="/js/post.js"></script>
	<script src="/js/reply.js"></script>
@endsection