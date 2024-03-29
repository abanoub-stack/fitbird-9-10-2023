<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <link rel="icon" type="image/x-icon" href="{{asset('fav.png')}}">



    <title>FitBird Admin Panel | @yield('title')</title>


    <!-- Custom fonts for this template-->
    <link href="{{asset('dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/sb-admin-2.css')}}" rel="stylesheet">


    @yield('css')

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">


    {{-- Tiny MCE  // WYSWG --}}
    <script src="https://cdn.tiny.cloud/1/649a0o47mong5x2eyz3fy0fw1ru8poehvw59emmxhr0wxzxh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>



    {{-- Crisp Chat --}}
    {{-- <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="5ee9e208-2ff0-4a6d-8f98-55e85e173dac";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script> --}}
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="d6d1c0ae-e4f0-494d-bd83-b1c8c62add73";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
