<aside id="sidebar-wrapper">

		<img src="{{ Auth::user()->getProfilePic(200) }}" class="block img-responsive img-circle" />

		<div class="text-center block">
			<h3 class="text-center">{{ Auth::user()->firstname }} {{ Auth::user()->name }}</h3>
			@if(Auth::user()->currentTeam)
				<small>Membre du pôle {{ Auth::user()->currentTeam->name }}</small>
				<hr>
				<p>
					@if (Auth::user()->isTeamOwner())
						Tu es responsable de ton pôle !!!
					@else
						Responsable : <br>{{ Auth::user()->currentTeam->owner->firstname }} {{ Auth::user()->currentTeam->owner->name }}
					@endif
				</p>
				<p class="text-center">
					<a href="tableauDeBord/{{strtolower(Auth::user()->currentTeam->name)}}"
					   class="btn btn-danger block">
						<i class="fa fa-users"></i>Tableau de bord de mon pôle
					</a>
				</p>
				<p class="text-center">
					<a href="{{ url('/pole/inscription') }}" class="btn btn-success block"><i class="fa fa-refresh"></i>Changer de pôle</a>
				</p>
			@else
				<p class="text-center">
					<a href="{{ url('/pole/inscription') }}" class="btn btn-success block"><i class="fa fa-plus"></i>M'inscrire à un pôle</a>
				</p>
			@endif
		</div>

		<hr />

		<ul class="sidebar-nav nav nav-pills nav-stacked">
			<li class="block">
				<a href="#">
					<i class="glyphicon glyphicon-briefcase"></i>&nbsp; Mon compte OVH
				</a>
			</li>
			<li class="block">
				<a href="#">
					<i class="glyphicon glyphicon-cog"></i>&nbsp; Paramètres de mon profil
				</a>
			</li>
			<li class="block">
				<a id="lfm" href="#">
					<i class="fa fa-folder-open"></i>Accès aux fichiers</button>
				</a>
			</li>
		</ul>

		<hr />
		
		<p class="text-center"><button class="btn btn-danger"><i class="fa fa-users"></i>&nbsp; Former un groupe de travail</button></p>

		<hr>

		<ul class="list-group block">
			@foreach(Auth::user()->todos as $todo)
				<li class="list-group-item">
					<span class="badge">{{ $todo->getTempsRestant() }}</span>
					{{ $todo->content }}
				</li>
			@endforeach
		</ul>


	</aside>

	<!-- 	Content -->