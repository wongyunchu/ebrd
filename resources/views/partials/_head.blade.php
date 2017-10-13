
<head>
    <meta charset="utf-8" />
    <title>Flatkit - HTML Version | Bootstrap 4 Web App Kit with AngularJS</title>
    <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="{{ asset('assets/images/logo.png') }}">



    <!-- style -->
    <link rel="stylesheet" href="{{ asset('assets/animate.css/animate.min.css') }} " type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/glyphicons/glyphicons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/material-design-icons/material-design-icons.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets/styles/app.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/styles/myStyle.css') }}" type="text/css" />

    <!-- endbuild -->


    <link rel="stylesheet" href="{{ asset('assets/styles/font.css') }}" type="text/css" />


    {{-- 추가 --}}
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }} " type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/ui-panel.css') }} " type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/flexboxgrid.css') }} " type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.css') }} " type="text/css" />


    {{--<link rel="stylesheet" href="{{ asset('css/exentriq-bootstrap-material-ui.css') }} " type="text/css" />--}}


    {{--{{Html::style('css/font-awesome.min.css')}}--}}
    {{--{{Html::style('css/styles.css')}}--}}
    @yield('stylesheets')
</head>