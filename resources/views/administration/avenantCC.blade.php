@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/datepicker.css">
@endsection

@section('content')

<h1 class="page-header text-center"><i class="fa fa-file-pdf-o"></i>Avenant à la Convention Client</h1>

<br>
<form id="form" method="post" class="row">
    {!! csrf_field() !!}
    <div class="col-md-5">
        <h3>Entrée manuelle</h3>
        <hr>
        
        <h4>Entreprise</h4> 
   
          <div class="form-group">
              <input type="text" class="form-control" name="nomentreprise" placeholder="Nom de l'entreprise">
          </div>
          <div class="form-group">
              <textarea class="form-control" rows="5" name="adresseclient" form="form" placeholder="Adresse de l'entreprise"></textarea>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="nomfonction" placeholder="Nom et fonction du signataire">
          </div>
        <hr>
        
        <h4>Références  <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="right" 
                              title="Si c'est le premier Avenant sur cette étude, remplir les référenes de convention client et d'avant-projet.
          Sinon, remplir les références de convetion client et de l'Avenant client précédent."></span>  </h4>
        <div class="form-group">
            <input type="text" class="form-control" name="refcc" placeholder="Référence de la convention client">
        </div>
      <div class="form-group">
            <input type="text" class="form-control" name="refap" placeholder="Référence de l'avant-projet">
        </div>
      <div class="form-group">
            <input type="text" class="form-control" name="refavenantclientprecedent" placeholder="Référence de l'avenant client précédent">
        </div>
        
        <hr>
        
        <h4>Dates</h4>
        <div class="form-group">
            <input type="text" class="form-control" id="date" name="date-emission" placeholder="Date d'émission">
        </div>
      <h4></h4>
        
        <hr>
        
        <h4>Causes <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="right" 
                              title="Exposez ici les causes de l’Avenant. Il s'agit de détailler l'historique de l'étude et des relations avec le Client,
                              et d'exprimer les responsabilités de chacun dans les raisons qui ont conduit à l'Avenant. Par exemple : il ne suffit pas de dire que `l'étude nécessite un délai supplémentaire', 
                              mais d'expliquer les causes qui sont à l'origine de ce retard."></span></h4>
        <div class="form-group">
              <textarea class="form-control" rows="5" name="causeavenant" form="form" placeholder="Causes de l'avenant"></textarea>
         </div>
      <hr>
      <h4>Articles modifiés</h4> 
          <div id="aDupliquer" style="display:none;">
            <div class="form-group">
              <input type="text" class="form-control" name="titrearticlemodif0" placeholder="Titre de l'article modifié">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="numarticlemodif0" placeholder="Numéro de l'article modifié">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="5" name="contenuarticlemodif0" form="form" placeholder="Nouveau contenu de l'article modifié"></textarea>
            </div>   
        <hr class="number">
      </div>
      <div id="vide">
        <div class="form-group">
              <input type="text" class="form-control" name="titrearticlemodif0" placeholder="Titre de l'article modifié">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="numarticlemodif0" placeholder="Numéro de l'article modifié">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="5" name="contenuarticlemodif0" form="form" placeholder="Nouveau contenu de l'article modifié"></textarea>
            </div>   
        <hr class="number">
        
      </div>
      
      <a id="generateButton" class="btn btn-primary"><i class="fa fa-plus"></i>Ajouter un article</a>
        <hr>
        
        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Générer !</button>
    </div>
    
    <div class="col-md-offset-2 col-md-5">
        <h3>Pré-remplissage</h3>
        <hr>
        <a href="" class="btn btn-info search"><i class="fa fa-search"></i>Rechercher l'entreprise dans la base de données</a>
    </div>
    
</form>

@endsection

@section('javascript')
<script src="/js/bootstrap-datepicker.js"></script>
<script>
    /*
     *    Affichage de la date quand on clique sur le champ
     */
    var checkin = $('#date-input').datepicker({
        format: "dd/mm/yyyy" // 
    })
    .on('changeDate', function() {
        checkout.date.valueOf();    // Changement de la date
        checkin.hide();             // On cache la zone
    });
    
    
    /*
     *    Affiche la page de recherche quand on appuie sur le bouton
     */
    $('.container').on('click','.search', function(ev){
        ev.preventDefault();
        
        TweenMax.to('.container', 0.5, {
            opacity: 0,
            x:-200,
            ease:Back.easeIn,
            onComplete: loadSearch
        });
            
        function loadSearch() {
            $('.container').load("/search/projets", function(osef, status){
                if(status == "success") {
                    TweenLite.to('.container', 0.5, { opacity: 1, x: 0, ease:Back.easeOut});
                    loadUrl='/administration/avenantlaconventionclient';
                }   
            });
        }
    });
   $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
  $('#generateButton').on('click',function(){
    count = $('#vide').find('.number').length;
    console.log(count);
    var dup = $('#aDupliquer');
    dup.find('[name="titrearticlemodif'+(count-1)+'"]').attr('name','titrearticlemodif'+count);
    dup.find('[name="numarticlemodif'+(count-1)+'"]').attr('name','numarticlemodif'+count);
    dup.find('[name="contenuarticlemodif'+(count-1)+'"]').attr('name','contenuarticlemodif'+count);
    $('#vide').append($(dup).html());
  });
$("form").on('submit', function()
{
var count = $(this).serialize()
count.i = ($('#vide').find('.number').length)

$.post('/administration/avenantlaconventionclient', count);
});
</script>
@endsection