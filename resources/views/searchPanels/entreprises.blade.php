<h1 class="page-header"><div class="fa fa-credit-card"></div>Entreprises</h1>
<hr>

<div class="row">
  <div class="col-lg-6 col-lg-offset-1">
    <div class="input-group">
      <input type="text" class="form-control search-project" placeholder="Rechercher par nom">
      <span class="input-group-btn">
        <button class="btn btn-info" type="button"><i class="fa fa-search"></i></button>
      </span>
    </div>
  </div>
</div>

<hr>



<div class="col-md-8">
    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr><th>Nom de l'entreprise</th><th>Adresse</th><th>Ville</th><th>Numéro de téléphone</th><th>Site web de l'entreprise</th></tr>
        </thead>
        <tbody>
            <tr><td>TRUK-AVEC-2012-CHIFFRES</td><td>Jean pierre</td><td>23 rue de chez toi, 59100 chémoi</td><td>REF-CC-1</td><td>01/01/2002</td></tr>
            <tr><td>TRUK-SANS-2016-CHIFFRES</td><td>Jean pierre</td><td>23 rue de chez toi, 59100 chémoi</td><td>REF-CC-1</td><td>01/01/2002</td></tr>
            <tr><td>TRUK-AVEC-2013-CHIFFRES</td><td>Jean pierre</td><td>12 rue de ta maman, 44300 Nantes</td><td>REF-CC-2</td><td>02/04/2004</td></tr>
            <tr><td>TRUK-SANS-2013-CHIFFRES</td><td>Jean pierre</td><td>12 rue de ta maman, 44300 Nantes</td><td>REF-CC-2</td><td>02/04/2004</td></tr>
            <tr><td>TRUK-AVEC-2012-CHIFFRES</td><td>Jean pierre</td><td>23 rue de chez toi, 59100 chémoi</td><td>REF-CC-1</td><td>01/01/2002</td></tr>
            <tr><td>TRUK-SANS-2012-CHIFFRES</td><td>Jean pierre</td><td>23 rue de chez toi, 59100 chémoi</td><td>REF-CC-1</td><td>01/01/2002</td></tr>
            <tr><td>TRUK-AVEC-2013-CHIFFRES</td><td>Jean pierre</td><td>12 rue de ta maman, 44300 Nantes</td><td>REF-CC-2</td><td>02/04/2004</td></tr>
        </tbody>
    </table>
    <a href="" class="retour btn btn-primary"><i class="fa fa-arrow-left"></i>Revenir où j'en étais</a>
</div>

<script>

/*
 * Fonction rechercher
 */
$('.search-project').on('input', function() {
    var value = $(this).val();
    $('.table tbody tr').show()
                        .filter(function() { return $($(this).children()[0]).text().toLowerCase().indexOf(value) < 0;})
                        .hide();
});  

/*
 * Fonction sélection d'un projet
 */
$('.container').on('click', 'tbody tr', function(){
    $('tbody tr').removeClass('danger');
    $(this).addClass('danger');
    
    referenceEtude = $($(this).children()[0]).text();
    nom = $($(this).children()[1]).text();
    adresse = $($(this).children()[2]).text();
    referenceCc = $($(this).children()[3]).text();
    dateEmission = $($(this).children()[4]).text();
});

/*
 * Bouton retour avec remplissage des champs
 */
$('.container').on('click', '.retour', function(ev){
    ev.preventDefault();
        
    TweenMax.to('.container', 0.5, {
        opacity: 0,
        x:-200,
        ease:Back.easeIn,
        onComplete: loadBack
    });

    function loadBack() {
        $('.container').load(loadUrl + ' .container', function(osef, status){
            if(status == "success") {
                TweenLite.to('.container', 0.5, { opacity: 1, x: 0, ease:Back.easeOut});
                
                $("[name = 'nom']").val(nom);
                $("[name = 'adresse']").val(adresse);
                $("[name = 'reference-cc']").val(referenceCc);
                $("[name = 'reference-etude']").val(referenceEtude);
                $("[name = 'date-emission']").val(dateEmission);
            }   
        });
    }
});
</script>