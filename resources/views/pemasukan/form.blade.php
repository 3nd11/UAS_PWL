@extends('layouts.index')
@section('content')
    <h3>Data Pemasukan</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('pemasukan.store') }}"
            enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" autocomplete="off" maxlength="45" />
            @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" autocomplete="off" maxlength="45" />
            @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Saldo</label>
            <input type="text" name="saldo" class="form-control @error('saldo') is-invalid @enderror" autocomplete="off" maxlength="45" />
            @error('saldo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Bukti Transaksi</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"/>
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
            <a href="{{ url('/pemasukan') }}" class="btn btn-danger">Batal</a>
    </form>
@endsection