<section>
    <div class="page-header-tentang">
        <div class="page-header">
            <div class="container">
                <h1 class="header-title">
                    PROFILE </h1>
            </div>
        </div>
    </div>
</section>
<section>
    <section style="margin: 30px 0">
        <div class="container">
            <h1 class="header-title">
                Reward & Certificate </h1>
        </div>
    </section>

    <center>

        <div class="container">
            <div class="clearfix"></div><br>
            <div class="col-md-12 text-center">
                <img class="myImg" src="<?= base_url('assets/img/sertifikat/JNE1.jpg'); ?>" data-sert="<?= base_url('assets/img/1.jpg'); ?>" width="50%" alt="">
            </div>

            <div class="clearfix"></div><br>
            <div class="col-md-12">
                <img class="myImg" src="<?= base_url('assets/img/sertifikat/JNE2.jpg'); ?>" data-sert="<?= base_url('assets/img/2.jpg'); ?>" width="50%" alt="">
            </div>

            <div class="clearfix"></div><br>
            <div class="col-md-12">
                <img class="myImg" src="<?= base_url('assets/img/sertifikat/JNE3.jpg'); ?>" data-sert="<?= base_url('assets/img/5.jpg'); ?>" width="50%" alt="">
            </div>
        </div>
    </center>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

    <script>
        $('.myImg').click(function() {
            $("#myModal").show();
            //alert($(this).attr("data-sert"));
            $('#img01').attr('src', $(this).attr("data-sert"));
            $('#caption').html(this.alt);
        });

        $('.close').click(function() {
            $('#myModal').hide();
        });
    </script>