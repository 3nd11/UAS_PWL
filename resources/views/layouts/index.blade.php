<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Pelayanan</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="{{asset('fonts/fontawesome-free-5.15.3-web/css/all.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        
        <!-- (header) -->
        @include('layouts.header')
        <!-- (menu) -->
        @include('layouts.menu')
        <!-- (konten & sidebar) -->
        <div class="row" style="background-color: rgba(0, 0, 0, 0.075);">
            <div class="col-md-9" style="padding-top: 30px;">
                @yield('content')
            </div>
            @include('layouts.sidebar')
        </div><br /><br />
        @include('layouts.berita')
        <br>
        <!-- (footer) -->
        @include('layouts.footer')