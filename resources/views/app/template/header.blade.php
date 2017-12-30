<html>
<title>CoBlog | {{ isset($title) ? $title : '' }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" type="public/image/ico" href="{{ asset('favicon.ico') }}"/>
<link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.js"></script>
@yield('css')
<body class="@yield('bodyClass')">