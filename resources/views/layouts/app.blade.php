<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                     
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script>
    jQuery('select[name="school_id"]').on('change',function(){
        var schoolID = jQuery(this).val();
        if(schoolID)
            {
                $('select[name="class_id"]').empty().append($('<option>').text('Select Class').attr('value', ''));
                
                $.post("{{route('GetClasses')}}", { "_token": "{{ csrf_token() }}",schoolID: schoolID } ).done(function( result ) {

                    $.each(result.data, function(i, value){
                        $('select[name="class_id"]').append($('<option>').text(value.class_name).attr('value', value.id));
                    });

                });
            } else {

                $('select[name="class_id"]').empty().append($('<option>').text('Select Class').attr('value', ''));

            }
        });

        jQuery('select[name="class_id"]').on('change',function(){
        var classID = jQuery(this).val();
        if(classID)
            {
                $('select[name="subject_id"]').empty().append($('<option>').text('Select Subject').attr('value', ''));
                
                $.post("{{route('GetSubjects')}}", { "_token": "{{ csrf_token() }}",classID: classID } ).done(function( result ) {

                    $.each(result.data, function(i, value){
                        $('select[name="subject_id"]').append($('<option>').text(value.subject_name).attr('value', value.id));
                    });

                });
            } else {

                $('select[name="subject_id"]').empty().append($('<option>').text('Select Subject').attr('value', ''));

            }
        });

        $('.js-example-basic-multiple').select2();

</script>