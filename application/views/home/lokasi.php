<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Latihan Google map</title>
    <style type='text/css'>
        #peta {
            width: 50%;
            height: 400px;

        }
    </style>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        (function() {
            window.onload = function() {
                var map;
                //Parameter Google maps
                var options = {
                    zoom: 12, //level zoom
                    //posisi tengah peta
                    center: new google.maps.LatLng(-6.311369, 107.181852),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                // Buat peta di 
                var map = new google.maps.Map(document.getElementById('peta'), options);
                // Tambahkan Marker 
                var locations = [
                    ['CILEMAHABANG (0877 4142 8388) <br> JL. PUSPA VI NO. 40 E PERUMAHAN MEKAR INDAH <br> DESA MEKAR MUKTI, CIKARANG UTARA, KAB. BEKASI', -6.307923199999999, 107.172085],
                    ['CIKARANG BARU (0813 1778 2193) <br> JL. RUSA RAYA NO. 34 RT001/004 PERUM<br> CIKARANG BARU, KAB. BEKASI', -6.308911, 107.169243],
                    ['PASIR GOMBONG (0852 1092 4989) <br> JL. PASIR GOMBONG RT003/006,<br>DESA PASIR GOMBONG, CIKARANG UTARA, KAB. BEKASI', -6.294131, 107.147348],
                    ['TEGAL GEDE (021 - 8935 515) <br> JL. RAYA INDUSTRI NO. 48 TEGAL GEDE<br>CIKARANG UTARA, KAB. BEKASI', -6.298649, 107.145667],
                    ['GEMALAPIK (0813 1636 9924) <br> JL. GEMALAPIK RAYA NO. 29 RUKO MEGAH MAS, <br>DESA PASIR SARI, CIKARANG SELATAN, KAB. BEKASI', -6.317627, 107.144423],
                    ['TAMAN SENTOSA (0857 7768 6885) <br> PERUM. TAMAN SENTOSA BLOK C4 NO. 11 <br>DESA PASIR SARI, CIKARANG SELATAN, KAB. BEKASI', -6.321526, 107.145988],
                    ['STATION CIKARANG (021 - 8971 555) <br> JL. RAYA SERANG CIBARUSAH (RUKO MEGA SURYA),<br> BLOK S NO. 16 CIKARANG, KAB. BEKASI', -6.317637, 107.135858],
                    ['CIFEST (0852 1110 0089) <br> <br> CIKARANG SELATAN, KAB. BEKASI', -6.326011, 107.124433],
                    ['SUKARESMI ( 0895333235172) <br> JL. RAYA SERANG CIBARUSAH CIKARANG DEPAN GIANT CIFEST,<br> CIKARANG SELATAN, KAB. BEKASI', -6.341074, 107.118564],


                ];
                var infowindow = new google.maps.InfoWindow();

                var marker, i;
                /* kode untuk menampilkan banyak marker */
                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                    });
                    /* menambahkan event clik untuk menampikan
                        infowindows dengan isi sesuai denga
                     marker yang di klik */

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }


            };
        })();
    </script>
</head>

<body>
    <center>
        <div id="peta"></div>
    </center>

</body>

</html>