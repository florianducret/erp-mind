@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/datepicker.css">
<link rel="stylesheet" href="/css/sweetalert.css">
@endsection

@section('content')

<h1 class="page-header text-center"><i class="fa fa-file-pdf-o"></i>Facture d'acompte</h1>

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
            <textarea class="form-control" rows="5" name="adresse" form="form" placeholder="Adresse de l'entreprise"></textarea>
        </div>
        
        <hr>
        
        <h4>Références</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="reference-etude" placeholder="Référence de l'étude">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="reference-cc" placeholder="Référence de la convention client">
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
        
        <h4>Phases</h4>
        <div id="phase-wrapper"></div>
        
        <a id="ajouterPhase" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Ajouter une phase</a>
        <hr>
        
        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Générer !</button>
    </div>
    
    <div class="col-md-offset-1 col-md-5">
        <h3>Pré-remplissage</h3>
        <hr>
        <a href="" class="btn btn-info search"><i class="fa fa-search"></i>Rechercher l'entreprise dans la base de données</a>
      <hr>
      <p>Aperçu du document</p>
        <iframe src="" 
                style="width:100%; height:600px;" frameborder="0"></iframe><div id="viewerCanvas"></div>
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
                    nbPhases = 1;
                }   
            });
        }
    });
    
    /*
     * Bouton pour ajouter une phase
     */
    nbPhases = 1;
    $('.container').on('click', '#ajouterPhase', function(){
        $('#phase-wrapper').append('<div class="form-group">'+
                                   '<div class="input-group">'+
                                        '<input type="text" class="form-control" id="date-input" name="phase' + nbPhases + '" placeholder="Phase ' + (nbPhases++) + '">'+
                                        '<span class="input-group-addon">'+
                                            'est offert ? <input type="checkbox" name="offert' + nbPhases + '">'+
                                        '</span>'+
                                   '</div></div>');
        TweenMax.from('#phase-wrapper .form-group:last', 0.5, {
            opacity:0,
            scale: 0.5,
            ease: Back.easeOut
        });
    });
    
    /*
     * Affichage d'une alerte quand on génère le fichier
     */
    $('.container').on('submit', '#form', function(){
      //  $.post(loadUrl, $(this).serialize());
        
      //  return false;
    });
    
    /*
     * Affichage de l'aperçu du document
     */
    var url = "http://docs.google.com/gview?url=http://preview.z1w7grf14rseb3xr9gs81jq8ns1c3diyphw5z1n4z8semi.box.codeanywhere.com/files/shares/templates/tresorerie/";
    $("iframe").attr('src', url + "Facture d'acompte.docx&embedded=true");

    
    /*
     * Abonnement aux envois de la qualité
     */
    var pusher = new Pusher("{{env('PUSHER_KEY')}}");
    pusher.subscribe('document-channel')
        
    .bind('approuver-event', function(data) {
        swal("Document accepté !", "La qualité a accepté l'ajout du document" + data.reference, "success");
    })

    .bind('refuser-event', function(data) {
        swal("Document refusé !", "La qualité a refusé l'ajout d'un document" + data.reference, "error");
    });
    
</script>
@endsection