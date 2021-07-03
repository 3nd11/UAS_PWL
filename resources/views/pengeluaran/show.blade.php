@extends('layouts.index')
@section('content')
@php
    $judul = ['No','Tanggal','Keterangan','Saldo','Foto','Action'];
    $no = 1;
@endphp
    <h3>Data Pengeluaran Bulan Tahun ini</h3>
    <a class="btn btn-primary btn-md" href="{{ route('pengeluaran.create') }}" role="button"><i class="fas fa-plus-circle"></i> Add Data</a>
    <br/>
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach ($judul as $judul)
                    <th>{{ $judul }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ar_pengeluaran as $a)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $a->tanggal }}</td>
                    <td>{{ $a->keterangan }}</td>
                    <td>{{ $a->saldo }}</td>
                    <td width="15%" align="center">
                        @php
                        if(!empty($a->foto)) {
                        @endphp
                            <img src="{{ asset('images')}}/{{ $a->foto }}" width="50%" />
                        @php
                        } else {
                        @endphp
                            <img src="{{ asset('images')}}/no_picture.png" width="50%" />
                        @php
                        }
                        @endphp
                    </td>
                    <td>
                        <form method="POST" action="{{ route('pengeluaran.destroy',$a->id) }}">
                            @csrf
                            @method('delete')
                            <a class="btn btn-outline-info" href="{{ route('pengeluaran.show',$a->id) }}" title="klik untuk melihat secara detail"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                            <a class="btn btn-outline-warning" href="{{ route('pengeluaran.edit',$a->id) }}" title="klik untuk mengedit data"><i class="fas fa-pen-square fa-2x"></i></a>
                            <button class="btn btn-outline-danger" onclick="return confirm('Data ini akan hilang, Anda yakin?')" title="klik untuk menghapus data"><i class="fas fa-trash fa-2x"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection