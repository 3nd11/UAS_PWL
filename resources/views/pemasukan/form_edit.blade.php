@extends('layouts.index')
@section('content')
    <h3>Form Edit Pemasukan</h3>
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('pemasukan.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" value="{{ $rs->tanggal }}" class="form-control" autocomplete="off" maxlength="45" required/>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" value="{{ $rs->keterangan }}" class="form-control" autocomplete="off" maxlength="45" required/>
            </div>
            <div class="form-group">
                <label>Saldo</label>
                <input type="text" name="saldo" value="{{ $rs->saldo }}" class="form-control" autocomplete="off" maxlength="15" required/>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" value="{{ $rs->foto }}" class="form-control"/>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <a href="{{ url('/pemasukan') }}" class="btn btn-danger">Batal</a>
        </form>
    @endforeach
@endsection