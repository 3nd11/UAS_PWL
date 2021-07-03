@extends('layouts.index')
@section('content')
    @foreach ($ar_saldo as $b)
        <div class="card-1" style="width: 19rem;">
            @php
            if(!empty($b->cover)) {
            @endphp
                <img src="{{ asset('images')}}/{{ $b->cover }}"/>
            @php
            } else {
            @endphp
                <img src="{{ asset('images')}}/no_picture.png"/>
            @php
            }
            @endphp
            <div class="card-body">
                <h3>Detail Data Saldo</h3>
                <p class="card-text">
                    Tanggal : {{ $b->tanggal }}
                    <br/>Keterangan : {{ $b->keterangan }}
                    <br/>Saldo :  {{ $b->saldo }}
                    <br/>Pemasukan : {{ $b->pem }}
                    <br/>Pengeluaran : {{ $b->pen }}
                </p>
                <a href="{{ url('/saldo') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    @endforeach
@endsection