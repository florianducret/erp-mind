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

<h3 class="page-header"><i class="fa fa-street-view"></i> Membres de mon pôle</h3>
<div class="well">Vous n'êtes inscrit dans aucun pôle pour le moment.</div>

<p class="text-center">
	<a href="/pole/inscription" class="btn btn-success btn-sm">
		<i class="fa fa-plus"></i> M'inscrire à un pôle
	</a>
</p>
<br>
<!--######################################################################################################-->

<h3 class="page-header"><i class="fa fa-calendar"></i> Mon calendrier</h3>
<div class="well">En construction :(</div>
<br>
<!--######################################################################################################-->

<h3 class="page-header"><i class="fa fa-sticky-note"></i> Ma todo list</h3>

<ul id="todo-list" class="list-group">
	@foreach($todos as $todo)
		@include('layouts.todo')
	@endforeach
</ul>

<form method="post" class="todo-form"> {!! csrf_field() !!}
	<div class="col-md-6 form-group">
		<label for="date">Description</label>
		<input type="text" name="content" class="form-control" placeholder="Nouvelle tâche">
	</div>
	<div class=" col-md-6 form-group">
		<label for="date">Deadline</label>
		<input type="date" name="deadline" class="form-control" placeholder="jj-mm-aaaa">
	</div>
	<p class="text-center">
		<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Ajouter une tâche</button>
	</p>
</form>
<br>
<!--######################################################################################################-->

<h3 class="page-header"><i class="fa fa-users"></i> Mes groupes</h3>
<button class="btn btn-sm btn-primary"><i class="fa fa-users"></i>Former un groupe</button>
<button class="btn btn-sm btn-info pull-right"><i class="fa fa-user-plus"></i>Rejoindre un groupe</button>
<br>
<br>
<div class="well">Aucun groupe pour le moment.</div>



</div>
@endsection


@section('javascript')
	<script src="/js/post.js"></script>
	<script src="/js/reply.js"></script>
	<script src="/js/todo.js"></script>
@endsection