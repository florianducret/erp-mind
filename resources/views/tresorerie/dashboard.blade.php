@extends('layouts.app')

@section('content')

<h1 class="page-header"><i class="fa fa-credit-card"></i>Trésorerie</h1>
<br>

<h2 class=""><i class="fa fa-file-pdf-o"></i>Génération de fichiers</h2>
<hr>
<div class="alert alert-info"><i class="fa fa-info"></i>Veuillez sélectionner le fichier que vous souhaitez générer dans le champ suivant</div>
<div class="row">
    <div class="col-md-3">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Sélectionner un fichier
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a>Facture d'acompte</a></li>
                <li><a>Facture divers</a></li>
                <li><a>Facture de solde</a></li>
                <li><a>Note de frais kilométrique</a></li>
                <li><a>Note de frais</a></li>
                <li><a>Reconnaissance de dette</a></li>
                <li><a>Refacturation</a></li>
                <li><a>Relance de facture</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-7">
        <p id="selectedElement"></p>
        
        <p>Aperçu du document</p>
        <iframe src="" 
                style="display:none; width:100%; height:500px;" frameborder="0"></iframe><div id="viewerCanvas"></div>
    </div>
</div>

<hr>
<p class="text-center"><a href="#" class="btn btn-info generer"><i class="fa fa-forward"></i>Commencer la génération de ce document</a></p>


@endsection

@section('javascript')
<script>
    var url = "http://docs.google.com/gview?url=http://erp-mindje.rhcloud.com/files/shares/templates/tresorerie/";
    
    $(".dropdown-menu li a").click(function(){
        $('iframe').slideUp('slow').delay(500).slideDown('slow');
        $("iframe").attr('src', url + $(this).text() + ".docx&embedded=true");
        $(".generer").attr('href', "/tresorerie/"+$(this).text().replace(/[^\w\s]/gi, '').replace(/\s+/g, '').toLowerCase());
    });
</script>
@endsection