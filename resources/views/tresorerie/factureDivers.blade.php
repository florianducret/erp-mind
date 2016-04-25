@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/datepicker.css">
<link rel="stylesheet" href="/css/sweetalert.css">
@endsection

@section('content')

<h1 class="page-header text-center"><i class="fa fa-file-pdf-o"></i>Facture divers</h1>

<br>
<form id="form" method="post" class="row">
    {!! csrf_field() !!}
    <div class="col-md-5">
        <h3>Entrée manuelle</h3>
        <hr>
        
        <h4>Entreprise</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="nom" placeholder="Nom de l'entreprise">
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="2" name="adresse" form="form" placeholder="Adresse de l'entreprise"></textarea>
           <input type="text" class="form-control" name="codePostal" placeholder="Code postal">
           <input type="text" class="form-control" name="ville" placeholder="Ville">
        </div>
        
        <hr>
        
        <h4>Dates</h4>
        <div class="form-group">
            <input type="text" class="form-control" id="date-input" name="date-emission" placeholder="Date d'émission">
        </div>
            <label for="#radio">Date d'échéance</label>
        <div class="form-group">
            <label class="radio-inline"><input type="radio" name="date-echeance" value="30">30 jours</label>
            <label class="radio-inline"><input type="radio" name="date-echeance" value="60">60 jours</label>
        </div>
        
        <hr>
        
        <h4>Detail</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="objet" placeholder="Objet de la facture">
        </div>
      <div class='detailArticle'>
        <div class="form-group">
            <input type="text" class="form-control" name="article" placeholder="Nom de l'article">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="montant" placeholder="Montant HT">
        </div>
      <label for="#radio">Taux TVA</label>
       <div class="form-group">
          <label class="radio-inline"><input type="radio" name="Taux TVA" value="0">0%</label>
         <label class="radio-inline"><input type="radio" name="Taux TVA" value="5.5">5,5%</label>
         <label class="radio-inline"><input type="radio" name="Taux TVA" value="10">10%</label>
         <label class="radio-inline"><input type="radio" name="Taux TVA" value="20">20%</label>
         </div>
        </div>
      <button class="add_field_button">+</button>
      <button class="remove_field_button">-</button>
      <hr>
        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Générer !</button>
      
    </div>
    
    <div class="col-md-offset-2 col-md-5">
        <h3>Pré-remplissage</h3>
        <hr>
        <a href="" class="btn btn-info search"><i class="fa fa-search"></i>Rechercher l'entreprise dans la base de données</a>
      <hr>
      <p>Aperçu du document</p>
        <iframe src="" 
                style="width:100%; height:500px;" frameborder="0"></iframe><div id="viewerCanvas"></div>
    </div>
    
</form>
@endsection

@section('javascript')
<script src="/js/bootstrap-datepicker.js"></script>
<script src="/js/sweetalert.min.js"></script>
<script src="//js.pusher.com/3.0/pusher.min.js"></script>
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
                    loadUrl='/tresorerie/facturedacompte';
                }   
            });
        }
    });
    
    /*
     * Affichage d'une alerte quand on génère le fichier
     */
    $('.container').on('submit', '#form', function(){
        $.post(loadUrl, $(this).serialize());
        swal("Document généré !", "Le document a été envoyé à la prospection et à la présidence pour vérification.", "success");
        return false;
    });
     /*
     * Affichage de l'aperçu du document
     */
      var url = "http://docs.google.com/gview?url=http://preview.z1w7grf14rseb3xr9gs81jq8ns1c3diyphw5z1n4z8semi.box.codeanywhere.com/files/shares/templates/tresorerie/";
      $("iframe").attr('src', url + "Facture divers.docx&embedded=true");
   /*
     * Creation des champs pour les articles
     */
$(document).ready(function() {
    var max_fields      = 30; //maximum input boxes allowed
    var wrapper         = $(".detailArticle"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    var remove_button      = $(".remove_field_button"); //remove button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><input type="text" class="form-control" name="article" placeholder="Nom de l\'article"></div>');//add input box
            $(wrapper).append('<div class="form-group"><input type="text" class="form-control" name="montant" placeholder="Montant HT"></div>');
            $(wrapper).append('<label for="#radio">Taux TVA</label><div class="form-group"><label class="radio-inline"><input type="radio" name="Taux TVA" value="0">0%</label><label class="radio-inline"><input type="radio" name="Taux TVA" value="5.5">5,5%</label><label class="radio-inline"><input type="radio" name="Taux TVA" value="10">10%</label><label class="radio-inline"><input type="radio" name="Taux TVA" value="20">20%</label></div>');
        }
    });
   
    $(remove_button).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
@endsection