@extends('layouts.app')

@section('content')

<h1 class="page-header text-center"><i class="fa fa-archive"></i>Administration</h1>
<br>
<h2 class="text-center"><i class="fa fa-file-pdf-o"></i>Génération de fichiers</h2>
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
                <li><a>Avenant à la Convention Client</a></li>
                <li><a>Avenant au Récapitulatif de Mission</a></li>
                <li><a>Avenant de Rupture à la Convention Client</a></li>
                <li><a>Avenant de Rupture au Récapitulatif de Mission</a></li>
                <li><a>Convention Client</a></li>
                <li><a>Convention Etudiant</a></li>
                <li><a>Procès-Verbal de Recette Finale</a></li>
                <li><a>Récapitulatif Mission</a></li>
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
    var url = "http://docs.google.com/gview?url=http://erp-mindje.rhcloud.com/files/shares/templates/administration/";
    
    $(".dropdown-menu li a").click(function(){
        $('iframe').slideUp('slow').delay(500).slideDown('slow');
        $("iframe").attr('src', url + $(this).text() + ".docx&embedded=true");
        $(".generer").attr('href', "/administration/"+$(this).text().replace(/[^\w\s]/gi, '').replace(/\s+/g, '').toLowerCase());
    });
</script>
@endsection