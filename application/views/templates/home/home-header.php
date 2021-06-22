<!DOCTYPE html>
<html lang="en">

<!-- <base href="https://www.jne.id"> -->
<meta charset="UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="title" content="JNE Online">
<meta property="og:description" name="description" content="Untuk mengatur pengiriman paket Anda mulai dari cek tarif, cek lokasi gerai JNE terdekat dan info produk">
<meta name="description" content="Untuk mengatur pengiriman paket Anda mulai dari cek tarif, cek lokasi gerai JNE terdekat dan info produk">
<meta name="keywords" content="cek resi, tracking, cek resi jne, jne">
<meta name="robots" content="index, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>JNE Express</title>


<!-- Bootstrap -->
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap-theme.min.css">

<!-- Font -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"><!-- <link rel="stylesheet" href="/assets/css/font-awesome.css"> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">

<!-- Custom CSS -->
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/main.css">
<link href="<?= base_url('assets/'); ?>css/aos.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/swiper.min.css">
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery-ui.css">
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/auto-complete.css" />
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery-ui.css">

<script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery-ui.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/carousel.js"></script>
<script src="<?= base_url('assets/'); ?>js/aos.js"></script>
<script src="<?= base_url('assets/'); ?>js/swiper.min.js"></script>
<script src="<?= base_url('assets/'); ?>/js/autocomplete.min.js"></script>

<!-- Script cek tarif -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<style>
    .col-centered {
        float: none;
        margin: 0 auto;
    }

    .sub-menu {
        position: absolute;
        top: 0;
        margin: -7px -267px 0 0;
        border-radius: 0;
    }

    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }

    /* IE 6 doesn't support max-height
     * we use height instead, but this forces the menu to always be this tall
     */
    * html .ui-autocomplete {
        height: 200px;
    }
</style>
</head>


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
    <section id="header-top">
        <div class="container-fluid header-top-bg hidden-xs">
            <div class="container">
                <div class="col-md-9 col-sm-9 col-xs-9 header-top-left">
                    <ul class="list-inline">
                        <li><i class="fa fa-map-marker"></i> &nbsp;
                        Jl. Tomang Raya No. 11 </li>&nbsp;&nbsp;
                        <li><a href="tel:1500125"><span style="color: #fff"><i class="fa fa-phone" style="transform: scaleX(-1);"></i> &nbsp;(62-21) 2927 8888</span></a></li>&nbsp;&nbsp;
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 header-top-right">
                    <div class="social-top">
                        <ul class="list-inline pull-right">
                            <li><a href="https://www.facebook.com/JNEPusat/" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                            <li><a href="https://twitter.com/JNE_ID" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                            <li><a href="https://www.instagram.com/jne_id/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Header Top -->

    <!-- Navigation -->
    <section>
        <div class="container">
            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed nav-res" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" style="background-color: #333"></span>
                        <span class="icon-bar" style="background-color: #333"></span>
                        <span class="icon-bar" style="background-color: #333"></span>
                    </button>
                   <a class="navbar-brand" href="<?= base_url('home'); ?>"><img src="<?= base_url('assets/img/logo/logo jne.png'); ?>" width="20%" style="padding-bottom: 10px" alt=""></a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right custom-nav">
                        <li><a href="<?= base_url('home'); ?>">HOME</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">PROFILE &nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown">
                                    <a onclick="return false;">COMPANY<b style="margin-top: 3px" class="pull-right fa fa-caret-right"></b></a>
                                    <ul class="dropdown-menu sub-menu">
                                        <!-- <li><a href="/id/profil">PROFIL PERUSAHAAN</a></li> -->
                                        <li><a href="<?= base_url('id/visimisi'); ?> ">VISI, MISI DAN NILAI PERUSAHAAN</a></li>
                                        <li><a href="<?= base_url('id/sejarah'); ?> ">SEJARAH</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url('id/penghargaan'); ?> ">REWARD & CERTIFICATE</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">PRODUCT & SERVICES &nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url('id/produk'); ?> ">PRODUCT</a></li>
                                <li><a href="<?= base_url('id/layanan'); ?> ">SERVICES</a></li>
                            </ul>
                        </li>
                        <li><a href="http://localhost/jne.id/id/kontak">CONTACT US</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>