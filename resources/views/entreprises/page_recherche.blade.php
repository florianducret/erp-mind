 @extends('layouts.app') @section('content')
<a role="menuitem" href="/entreprises/ajouter" type="button" class="btn btn-lg btn-primary pull-right "><i class="fa fa-plus"></i>
</a>
<h1>
      <i class="fa fa-briefcase"></i>
      Entreprises
    </h1>
<div class="container">
	<div class="row">
		<br> <br>
		<div class="col-md-4">
			<div class="form-group">
				<div class="input-group">
					<a href="" class="btn btn-info search"><i class="fa fa-search"></i>Rechercher l'entreprise dans la base de données</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<br>
		<div class="col-md-3">


			<h3 class="title" , id="nom_entreprise">Nom</h3>


			<address>
						<strong>Nom Entreprise</strong> <br> Adresse<br> Ville <br> <abbr
							title="Phone">P:</abbr> numéro

					</address>


			<a href="http://www.mind.fr">Nom de l'entreprise </a>

			<br>
			<hr>

			<h3 class="title">Dernières activités</h3> File des dernières activités <br> <br>

		</div>
		<div class="col-md-7">

			<h3 class="title">Infos générales</h3>

			<hr> Tableau de données concernant les entreprises<br> <br>
			<br> <br>
			<hr>
			<h3 class="title">Projets en cours</h3>


			<form role="search" name="searchform" method="get">


				<div class="form-group">
					<div class="input-group">
						<input type="text" placeholder="recherche" name="s" class="form-control left-rounded">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-inverse right-rounded">Chercher</button>
						</div>
					</div>
				</div>

				<br>Tableau de données concernant les entreprises<br> <br>
				<button type="button" class="btn btn_lg btn-primary">Associer un projet</button>

				<hr>

				<h3 class="title">Projets réalisés</h3>



				<div class="form-group">
					<div class="input-group">
						<input type="text" placeholder="recherche" name="s" class="form-control left-rounded">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-inverse right-rounded">Chercher</button>
						</div>
					</div>
				</div>

				<br> <br> <br> Tableau de données concernant les entreprises<br> <br>
		</div>

		<div class="col-md-2">

			<h3 class="title">Quelques contacts</h3> Quelques contacts<br>
			<br>
			<br>
			<br>
			<div class="row">
				<div class="col-md-5">
					<button type="button" class="btn btn-primary">Ajouter un contact</button>
				</div>
			</div>


		</div>



	</div>
		<br>
		 <hr>
		<br>
	
	@endsection @section('javascript')
	<script src="/js/bootstrap-datepicker.js"></script>
	<script>
		//infobulle
		$(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
		/*
		 *    Affichage de la date quand on clique sur le champ
		 */
		var checkin = $('#date-input').datepicker({
				format: "dd/mm/yyyy" // 
			})
			.on('changeDate', function() {
				checkout.date.valueOf(); // Changement de la date
				checkin.hide(); // On cache la zone
			});


		/*
		 *    Affiche la page de recherche quand on appuie sur le bouton
		 */
		$('.container').on('click', '.search', function(ev) {
			ev.preventDefault();

			TweenMax.to('.container', 0.5, {
				opacity: 0,
				x: -200,
				ease: Back.easeIn,
				onComplete: loadSearch
			});

			function loadSearch() {
				$('.container').load("/search/entreprises", function(osef, status) {
					if (status == "success") {
						TweenLite.to('.container', 0.5, {
							opacity: 1,
							x: 0,
							ease: Back.easeOut
						});
						loadUrl = '/entreprises/page_recherche';
					}
				});
			}
		});
	/* Bouton ajouter une entreprise */
function RedirectionJavascript(){
  document.location.href="http://preview.z1w7grf14rseb3xr9gs81jq8ns1c3diyphw5z1n4z8semi.box.codeanywhere.com/entreprises/ajouter"; 
}
</script>
	</script>
	@endsection