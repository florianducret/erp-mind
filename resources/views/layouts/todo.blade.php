	<form class="delete-form" action="/todo/remove/{{$todo->id}}" method="post"> {!! csrf_field() !!}
		<li class="list-group-item">
			<button type="submit" class="btn btn-sm btn-info remove"><i class="fa fa-check-circle" style="margin-right:0"></i></button>&nbsp;
			<span class="badge">&nbsp;{{ $todo->getTempsRestant() }}</span>
			{{ $todo->content }}
		</li>
	</form>