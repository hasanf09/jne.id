<body>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '1987369491335473',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v3.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Header Top -->

    <!-- End of Header Top -->

    <!-- Navigation -->

    <!-- End of Navigation -->
    <!-- Slider -->
    <?php foreach ($slider as $s) : ?>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="<?= base_url('assets/img/slider/') . $s['image']; ?>" style="width:100%">
            </div>
        </div>
    <?php endforeach; ?>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 3000); // Change image every 2 seconds

        }
    </script>
    <!-- End of Slider -->

    <!-- Layanan -->
    <section id="layanan">
        <div class="container">
            <div class="text-center">
                <h1><strong><span style="color: #ED3B49">Cek Layanan</span></strong></h1>
                <h4>Disini kamu bisa menikmati kemudahan fitur cek tarif dan cek resi</h4>
            </div>
            <div class="row">
                <div class="col-md-2 text-center"></div>
                <div class="col-md-4 text-center">
                    <div class="beranda-layanan-box">
                        <img src="<?= base_url('assets/img/icon/layanan-logo-2.png'); ?>" height="80px" alt="">
                        <h3><strong>Cek Tarif</strong></h3>
                        <div class="layanan-divider"></div>
                        <div class="form-group">
                            <a href="<?= base_url('tarif'); ?>">
                                <button class="btn beranda-layanan-btn">CEK</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <form action="<?= base_url('id/tracking'); ?>" method="post">
                        <input type="hidden" name="token" id="token_resi">
                        <div class="beranda-layanan-box">
                            <img src="<?= base_url('assets/img/icon/layanan-logo-1.png'); ?>" height="80px" alt="">
                            <h3>
                                <strong>Cek Resi</strong>
                            </h3>
                            <div class="layanan-divider"></div>
                            <div class="form-group">
                                <input name="cari" type="text" class="form-control bs-none" placeholder="Masukan No Resi" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="no_resi" class="btn beranda-layanan-btn">CEK</button>
                            </div>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </section>
    <!-- End of Layanan -->



    <!-- About Us -->
    <!-- Layout for medium device -->
    <section>
        <div class="container">
            <div class="col-md-5 hidden-xs text-center" style="margin-top: 18%;">
                <a href="<?= base_url('id/layanan'); ?>">
                    <div class="code code--small code--right aos-init">
                        <img src="<?= base_url('assets/img/tentang/jne kurir .png'); ?>" width="100%" alt="">
                    </div>
                </a>
            </div>
            <div class="col-md-7">
                <div class="col-md-9 section-about-lg">

                    <h1>Profile</h1>
                    <br>
                    <p><span style="font-size: 15px;">Jalur Nugraha Ekakurir atau biasa dikenal dengan JNE adalah perusahaan jasa pengiriman barang yang Berdiri pada tanggal 26 November tahun 1990. PT. Jalur Nugraha Ekakurir atau JNE memulai kegiatan usahanya yang terpusat pada penanganan kegiatan kepabeanan/impor kiriman barang/dokumen serta pengantarannya dari luar negeri ke Indonesia. Saat ini JNE telah memiliki lebih dari 400 cabang, 4500+ gerai dan melayani 453 kabupaten atau kota dan 98% kode pos di seluruh Indonesia dan terus memperluas jaringannya. <br>Sejak awal didirikan JNE selalu amanah dan professional melayani dengan mengedepankan kebutuhan pelanggan, mitra agen dan menjaga semangat kekeluargaan diantara karyawan dan mitra usahanya.</span></p>
                    <br>
                </div>
                <div class="col-md-3 section-about-md">
                    <ul>
                        <li>
                            <h1>31</h1>
                            <h4>Tahun JNE Melayani Anda</h4>
                        </li>
                        <li>
                            <h1>400+</h1>
                            <h4>Kantor Cabang</h4>
                        </li>
                        <li>
                            <h1>4500+</h1>
                            <h4>Gerai</h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End layout for medium device -->

    <br><br><br><br>

    <!-- Aplikasi jne.id -->
    <section>
        <div class="container">
            <div class="col-md-6 hidden-xs text-center">
                <a href="<?= base_url('id/layanan'); ?>">
                    <div class="code code--small code--left aos-init">
                        <img src="<?= base_url('assets/img/tentang/jne-app.png'); ?>" alt="">
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <br><br>
                <span style="color: #ED3B49">
                    <h1><strong>Download Aplikasi JNE</strong></h1>
                </span>
                <br>
                <span style="font-size: 18px">
                    <p>Aplikasi JNE: Untuk mengatur pengiriman paket Anda mulai dari cek tarif, cek lokasi gerai JNE terdekat, info produk, semua didalam genggaman. Download aplikasi JNE di google play atau App store.</p>
                </span>
                <br>
                <ul class="list-inline">
                    <li>
                        <a href="https://play.google.com/store/apps/details?id=com.indivara.jneone" target="_blank" title="Dapatkan di Google Play">
                            <img src="<?= base_url('assets/img/icon/googleplay.png'); ?>" width="150px" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://apps.apple.com/id/app/my-jne/id1447606780?l=id" target="_blank" title="Unduh di App Store">
                            <img src="<?= base_url('assets/img/icon/appstore1.png'); ?>" width="150px" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

</body>

</html>