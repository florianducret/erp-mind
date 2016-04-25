<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ERP MiND</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://bootswatch.com/journal/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/sidebar.css">
    @yield('css')
</head>
<body>

    @include('layouts.navigation')

    <div id="wrapper">
        @if(Auth::user())
            @include('layouts.notification')
            @include('layouts.sidebar')
        @endif
        
        <div id="page-content-wrapper">
            <div class="container">
                @yield('content')
            </div>
        </div>

    </div>
    
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js"></script>
    <script src="/js/sidebar.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm').filemanager('file');
    </script>
    <script type="text/javascript">
        $('.navbar button').on('click', function() { 
            $(this).popover({ 
                html : true,
                placement: 'bottom',
                content: function() {
                  return $('.popover_content').html();
                }
            });
        });
    </script>
    
     @yield('javascript')
</body>
</html>
