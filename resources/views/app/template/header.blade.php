<html>
<title>CoBlog | {{ isset($title) ? $title : '' }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" type="public/image/ico" href="{{ asset('favicon.ico') }}"/>
<link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@yield('css')
<body class="@yield('bodyClass')">