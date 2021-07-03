<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Form Pendaftaran</title>

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
        <div class="row">
            <div class="konten">
                <div class="kepala">
                    <h2 class="judul">Form Pendaftaran</h2>
                </div>

                <div class="artikel">
                    <form class="horizontal" action="MemberAccount.html" method="post">
                        <fieldset>
                            <legend>Data Keanggotaan</legend>
                            <div class="grup">
                                <label for="username">Username/ID<span class="required">*</span></label>
                                <input type="text" name="username" required placeholder="Masukkan Username">
                            </div>
                            <div class="grup">
                                <label for="password">Password<span class="required">*</span></label>
                                <input type="password" name="password" required placeholder="Masukkan password">
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Data Pribadi</legend>
                            <div class="grup">
                                <label for="nama">Nama Lengkap<span class="required">*</span></label>
                                <input type="text" name="Nama" required placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="grup">
                                <label for="email">Alamat E-mail<span class="required">*</span></label>
                                <input type="email" name="email" required placeholder="Masukkan Alamat Email">
                            </div>
                            <div class="grup">
                                <label for="no.telp">No Handphone<span class="required">*</span></label>
                                <input type="tel" name="No.Hp" pattern="\d\d\d\d\d\d\d\d\d\d\d\d" required
                                    placeholder="+62 8xxxxxxxx">
                            </div>
                            <div class="grup-offset">
                                <label for="JK">Jenis Kelamin<span class="required">*</span><br></label>
                                <input type="radio" name="JK" value="Laki-Laki" required>Laki-laki
                                <input type="radio" name="JK" value="Perempuan" required>Perempuan
                            </div>
                            <div class="grup-offset">
                                <button type="submit" value="Sign In"><a href="{{ url('/') }}">Submit</a></button>
                                <button type="reset" value="Reset">Reset</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>