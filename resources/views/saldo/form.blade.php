@extends('layouts.index')
@section('content')
@php
    $rs1 = App\Models\Pemasukan::all();
    $rs2 = App\Models\Pengeluaran::all();
@endphp
    <h3>Form Saldo</h3>
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
    <form method="POST" action="{{ route('saldo.store') }}"
            enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror" autocomplete="off" />
            @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" value="{{ old('keterangan') }}" class="form-control @error('keterangan') is-invalid @enderror" autocomplete="off" />
            @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Saldo</label>
            <input type="text" name="saldo" value="{{ old('saldo') }}" class="form-control @error('saldo') is-invalid @enderror" autocomplete="off" maxlength="45" />
            @error('saldo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Pemasukan</label>
            <select class="form-control @error('idpemasukan') is-invalid @enderror" name="idpemasukan" />
            <option value="">-- Pilih Pemasukan --</option>
            @foreach ($rs1 as $p)
                <option value="{{ $p->id }}">{{ $p->keterangan }}</option>
            @endforeach
            </select>
            @error('idpemasukan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Pengeluaran</label>
            <select class="form-control @error('idpengeluaran') is-invalid @enderror" name="idpengeluaran" />
            <option value="">-- Pilih Pengeluaran --</option>
            @foreach ($rs2 as $q)
                <option value="{{ $q->id }}">{{ $q->keterangan }}</option>
            @endforeach
            </select>
            @error('idpengeluaran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" value="{{ old('foto') }}" class="form-control @error('foto') is-invalid @enderror"/>
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
            <a href="{{ url('/saldo') }}" class="btn btn-danger">Batal</a>
    </form>
@endsection