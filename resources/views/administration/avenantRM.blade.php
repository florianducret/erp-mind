@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/datepicker.css">
@endsection

@section('content')

<h1 class="page-header text-center"><i class="fa fa-file-pdf-o"></i>Avenant au Récapitulatif de Mission</h1>

<br>
<form id="form" method="post" class="row">
    {!! csrf_field() !!}
    <div class="col-md-5">
        <h3>Entrée manuelle</h3>
        <hr>
        
        <h4>Etudiant</h4> 
   
          <div class="form-group">
              <input type="text" class="form-control" name="nometudiant" placeholder="Nom de l'étudiant">
          </div>
          <div class="form-group">
              <textarea class="form-control" name="prenometudiant" form="form" placeholder="Prenom de l'étudiant"></textarea>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="adresse" placeholder="Adresse de l'étudiant">
          </div>
        <hr>
        
        <h4>Références  <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="right" 
                              title="Si ce n'est le premier Avenant sur cette étude, remplir la référence de l'ancien avenant au récapitulatif de mission précédent.
          Sinon, laisser le champ vide."></span>  </h4>
        <div class="form-group">
            <input type="text" class="form-control" name="refrm" placeholder="Référence du récapitulatif de mission">
        </div>
      <div class="form-group">
            <input type="text" class="form-control" name="refap" placeholder="Référence de l'avant-projet">
        </div>
      <div class="form-group">
            <input type="text" class="form-control" name="refconclient" placeholder="Référence de la convention client">
        </div>
      <div class="form-group">
            <input type="text" class="form-control" name="refconvetudiant" placeholder="Référence de la convention étudiant">
        </div>
       <div class="form-group">
            <input type="text" class="form-control" name="refavenantrmprecedent" placeholder="Référence de l'avenant au récapitulatif de mission précédent">
        </div>
        
        <hr>
        
        <h4>Dates</h4>
        <div class="form-group">
            <input type="text" class="form-control" id="date-input" name="newdate" placeholder="Nouvelle date d'échéance de la mission">
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
      <h4>Indemnisations</h4> 
            <div class="form-group">
              <input type="text" class="form-control" name="salaire" placeholder="Montant de la rémunération brut">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="nbJEH" placeholder="Nombre de Jours-Etude-Homme">
            </div>     
      <hr>
         <h4>Mission</h4> 
            <div class="form-group">
                <textarea class="form-control" rows="5" name="defmission" form="form" placeholder="Definition de la mission"></textarea>       
            </div>
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
                    loadUrl='/administration/avenantaurcapitulatifdemission';
                }   
            });
        }
    });
     $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
@endsection