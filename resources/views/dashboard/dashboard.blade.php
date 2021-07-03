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
        <br/><br/>
        <div class="row">
            <div class="menu-icon">
                <div class="col-md-4">
                    <div class="icon">
                        <a class="icon-link" href="{{ url('/saldo') }}">
                            <span class="fa-stack fa-3x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-pen-square fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                        <br/><h3>Saldo</h3><br/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon">
                        <a class="icon-link" href="{{ url('/pengeluaran') }}">
                            <span class="fa-stack fa-3x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-arrow-up fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                        <br/><h2>Pengeluaran</h2><br/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon">
                        <a class="icon-link" href="{{ url('/pemasukan') }}">
                            <span class="fa-stack fa-3x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-arrow-down fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                        <br/><h2>Pemasukan</h2><br/>
                    </div>
                </div>
            </div>
        </div>
        <br /><br />
        <hr class="my-3">
        @include('layouts.berita')
        <br>


        <!-- (footer) -->
        @include('layouts.footer')