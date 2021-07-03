@php
    $judul = ['No','Tanggal','Keterangan','Saldo','Pemasukan','Pengeluaran'];
    $no = 1;
    error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
@endphp
<h3 align="center">Data Saldo Bulan ini</h3>
<table border="1px" align="center" cellpadding="5">
    <thead>
        <tr>
            @foreach ($judul as $judul)
                <th>{{ $judul }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($ar_saldo as $a)
            <tr>
            <td>{{ $no++ }}</td>
                <td>{{ $a->tanggal }}</td>   <!-- yyyy-mm-dd -->
                <td>{{ $a->keterangan }}</td>
                <td>{{ $a->saldo }}</td>
                <td>{{ $a->pem }}</td>
                <td>{{ $a->pen }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
