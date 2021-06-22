<section>
    <div class="page-header-produk-layanan">
        <div class="page-header">
            <div class="container">
                <h1 class="header-title">
                    Cek Layanan </h1>
            </div>
        </div>
    </div>
</section>

<section style="margin: 30px 0; margin-left: 45%;">
    <div class="container">
        <h1 class="header-title">
            Cek Tarif </h1>
    </div>
</section>

<?php echo $_content; ?>

<script>
    function showOrig(str) {
        if (str == "") {
            document.getElementById("origincity").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("origincity").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "<?php echo base_url('tarif/city/'); ?>?q=" + str, true);
            xmlhttp.send();
        }
    }

    function showDest(str) {
        if (str == "") {
            document.getElementById("destinationcity").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("destinationcity").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "<?php echo base_url('tarif/city/'); ?>?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>