    <div class="row" style="background-color: rgba(0, 0, 0, 0.075);">
        <div class="footer">
            <br />
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('images/logo.png')}}" class="logo" alt="logo">
                    <p><strong>PAGAM</strong><span>&nbsp;merupakan sebuah website yang dibangun oleh suatu kelompok mahasiswa yang ada di STT Terpadu Nurul fikri angkatan 2019.
                        Website ini Dibangun pada tahun 2021, tanggal 28 Juni 2021 bertepatan dengan dilaksanakannya ujian akhir semester mata kuliah pemrograman web lanjutan.</span></p>
                </div>
                <div class="col-md-4">
                    <strong>Alamat</strong><br/><br/>
                    <p> Kampus A Jl. Situ Indah No. 116 Depok; Kampus B Jl. Lenteng Agung Raya 20 Jaksel</p>
                    <p> Telepon: (021) 7863191 | Email : mail@gmail.com</p>
                    <br/>
                    <strong>Follow Us</strong><br/><br/>
                    <table class="table">
                        <tr>
                            <th scope="col"><a href="https://www.facebook.com/"><i class="fab fa-facebook fa-2x"></i></a></th>
                            <th scope="col"><a href="https://www.instagram.com/"><i class="fab fa-instagram fa-2x"></i></a></th>
                            <th scope="col"><a href="https://www.twitter.com/"><i class="fab fa-twitter fa-2x"></i></a></th>
                            <th scope="col"><a href="https://www.youtube.com/"><i class="fab fa-youtube fa-2x"></i></a></th>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <nav class="nav flex-column">
                        <strong>Tentang Kami</strong>
                        <br />
                        <a class="nav-link active" aria-current="page" href="{{ url('/about') }}">Apa itu Pagam</a>
                        <a class="nav-link" href="{{ url('/visimisi') }}">Visi & Misi</a>
                        <a class="nav-link" href="{{ url('/manajemen') }}">Struktur Manajemen</a>
                    </nav>
                </div>
            </div>
            <br />
            <hr class="my-3">
        </div>
        <div class="row">
            <div class="col-md-6" style="background-color: rgba(0, 0, 0, 0.075);">
            <p>Made With Love and Coffe <br /> © 2019–2021 PAGAM, Inc.<a href="{{ url('/home') }}" class="alert-link">·
                    Privacy · Terms</a></p>
            </div>
            <div class="col-md-6" style="background-color: rgba(0, 0, 0, 0.075);">
                <p class="bot-footer"><a href="#">
                    <span class="fa-stack fa-1x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-angle-up fa-stack-1x fa-inverse"></i>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
</body>

</html>