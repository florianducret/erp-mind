@extends('layouts.app')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<h1 class="page-header text-center"><i class="fa fa-list-alt"></i>Pôle qualité</h1>
<h3><i class="fa fa-file-pdf-o"></i>Documents en attente</h3>
<hr>
<div id="contenu"></div>

<div class="pull-right">
</div>

@endsection

@section('javascript')
<script src="//js.pusher.com/3.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher("{{env('PUSHER_KEY')}}");
    var channel = pusher.subscribe('document-channel');
    channel.bind('document-event', function(data) {
        text = data.text;
        reference = data.reference;
        
        $('#contenu').append('<div class="row">' +
            '<div class="panel panel-default col-md-5 col-md-offset-4">' +
                '<div class="panel-body"><i class="fa fa-file-pdf-o"></i><strong>' + text + '</strong>' +
                    '<span class="pull-right">' +
                        '<button class="btn btn-sm btn-info apercu"><i class="fa fa-search"></i>Apercu</button>&nbsp;' +
                        '<button class="btn btn-sm btn-success approuver"><i class="fa fa-check"></i>Approuver</button>&nbsp;' +
                        '<button class="btn btn-sm btn-primary refuser"><i class="fa fa-times"></i>Refuser</button>&nbsp;' +
                    '</span>' +
                    '<iframe style="display:none; width:100%; height:500px;" frameborder="0"></iframe><div id="viewerCanvas"></div>'+
                '</div>' +
            '</div>');
        TweenMax.from(".row:last", 0.8, {
            y: 100,
            opacity: 0,
            ease: Back.easeOut,
        });
    });
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
     $('.container').on('click', '.apercu', function() {
         var url = "http://docs.google.com/gview?url=http://erp-mindje.rhcloud.com/files/shares/";

         $(this).parents('.panel').find('iframe').attr('src', url + "temp_" + reference + ".docx&embedded=true");
         $(this).parents('.panel').find('iframe').toggle('slow');
     });

    $('.container').on('click', '.approuver', function() {
        $.post('/tableauDeBord/qualite', { text: text, etat:"approuver", reference: reference});
        var ligne = $(this).parents('.row');

        TweenMax.to(ligne, 0.5, {
            opacity: 0,
            scale: 0,
            rotationZ: 20,
            ease: Back.easeIn,
            onComplete: function() {
                ligne.remove();
            }
        });
        
        return false;
    });
    
    
    $('.container').on('click', '.refuser', function() {
        $.post('/tableauDeBord/qualite', { text: text, etat: "refuser"});
        var ligne = $(this).parents('.row');

        TweenMax.to(ligne, 0.5, {
            opacity: 0,
            scale: 0,
            rotationZ: 20,
            ease: Back.easeIn,
            onComplete: function() {
                ligne.remove();
            }
        });
        
        return false;
    });
    
</script>
@endsection