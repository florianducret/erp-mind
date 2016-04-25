<h1 class="page-header"><div class="fa fa-credit-card"></div>Projets</h1>

<div class="row">
  <div class="col-lg-6 col-lg-offset-6">
    <div class="input-group">
      <input type="text" class="form-control search-project" placeholder="Rechercher par référence">
      <span class="input-group-btn">
        <button class="btn btn-info" type="button"><i class="fa fa-search"></i></button>
      </span>
    </div>
  </div>
</div>

<hr>

<div class="col-md-4">
    <form action="">
        <div class="form-group">
            <label for="">Nom de l'étude</label>
            <input type="text" name="" id="" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="">Client</label>
            <input type="text" name="" id="" class="form-control">
        </div>
        <button class="btn btn-success"><span class="fa fa-plus"></span>Ajouter</button>
    </form>
</div>

<div class="col-md-8">
    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr><th>Référence de l'étude</th><th>Nom du client</th><th>Adresse</th><th>Référence CC</th><th>Date émission</th></tr>
        </thead>
        <tbody>
            <tr><td>REF-XX-2010</td><td>Jean pierre</td><td>23 rue de chez toi, 59100 chémoi</td><td>REF-CC-1</td><td>01/01/2002</td></tr>
            <tr><td>REF-XX-2011</td><td>Massinissa Mokhtari</td><td>23 rue de chez toi, 59100 chémoi</td><td>REF-CC-2</td><td>01/01/2002</td></tr>
            <tr><td>REF-XX-2012</td><td>Matyas Amrouche</td><td>12 rue de ta maman, 44300 Nantes</td><td>REF-CC-3</td><td>02/04/2004</td></tr>
            <tr><td>REF-XX-2013</td><td>Fabian Samson</td><td>12 rue de ta maman, 44300 Nantes</td><td>REF-CC-4</td><td>02/04/2004</td></tr>
            <tr><td>REF-XX-2014</td><td>Benjamin Dasse</td><td>23 rue de chez toi, 59100 chémoi</td><td>REF-CC-5</td><td>01/01/2002</td></tr>
            <tr><td>REF-XX-2015</td><td>Florian Ducret</td><td>23 rue de chez toi, 59100 chémoi</td><td>REF-CC-6</td><td>01/01/2002</td></tr>
            <tr><td>REF-XX-2016</td><td>Adrien Guillonnet</td><td>12 rue de ta maman, 44300 Nantes</td><td>REF-CC-7</td><td>02/04/2004</td></tr>
        </tbody>
    </table>
    <a href="" class="retour btn btn-primary"><i class="fa fa-arrow-left"></i>Revenir où j'en étais</a>
</div>

<script>

/*
 * Fonction rechercher
 */
$('.container').on('input', '.search-project', function() {
    var value = $(this).val();
    $('.table tbody tr').show()
                        .filter(function() { return $($(this).children()[0]).text().toLowerCase().indexOf(value) < 0;})
                        .hide();
});  

/*
 * Fonction sélection d'un projet
 */
$('.container').on('click', 'tbody tr', function(){
    $('tbody tr').removeClass('info');
    
    TweenLite.to($('tbody tr'), 0.9, {
        scale: 1,
        rotationX: 0,
        ease: Elastic.easeOut
    });
    
    $(this).addClass('info');
    
    referenceEtude = $($(this).children()[0]).text();
    nom = $($(this).children()[1]).text();
    adresse = $($(this).children()[2]).text();
    referenceCc = $($(this).children()[3]).text();
    dateEmission = $($(this).children()[4]).text();
    
    TweenLite.to($(this), 0.4, {
        scale: 1.06,
        ease: Back.easeOut
    });
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
    
/*
 * Animation lors de la sélection d'un champ
 */
    
    
</script>