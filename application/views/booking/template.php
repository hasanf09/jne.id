<?php echo $_content; ?>

<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables').DataTable();

        $('#provinsiasal').change(function() {
            var prov = $('#provinsiasal').val();
            var province = prov.split(',');

            $.ajax({
                url: "<?= base_url(); ?>booking/origin",
                method: "POST",
                data: {
                    prov: province[0]
                },
                success: function(obj) {
                    $('#asal').html(obj);
                }

            });
        });


        $('#provinsi').change(function() {
            var prov = $('#provinsi').val();
            var province = prov.split(',');

            $.ajax({
                url: "<?= base_url(); ?>booking/city",
                method: "POST",
                data: {
                    prov: province[0]
                },
                success: function(obj) {
                    $('#kabupaten').html(obj);
                }

            });
        });

        $('#kabupaten').change(function() {
            var kabupaten = $('#kabupaten').val();
            var dest = kabupaten.split(',');
            var kurir = $('#kurir').val();
            var berat = $('#berat').val();
            var asal = $('#asal').val();
            $.ajax({
                url: "<?= base_url(); ?>booking/getcost",
                method: "POST",
                data: {
                    dest: dest[0],
                    kurir: kurir,
                    berat: berat,
                    asal: asal
                },
                success: function(obj) {
                    $('#layanan').html(obj);
                }

            });
        });

        $('#kurir').change(function() {
            var kabupaten = $('#kabupaten').val();
            var dest = kabupaten.split(',');
            var kurir = $('#kurir').val()
            var berat = $('#berat').val();
            var asal = $('#asal').val();
            $.ajax({
                url: "<?= base_url(); ?>booking/getcost",
                method: "POST",
                data: {
                    dest: dest[0],
                    kurir: kurir,
                    berat: berat,
                    asal: asal
                },
                success: function(obj) {
                    $('#layanan').html(obj);
                }

            });
        });

        $('#layanan').change(function() {
            var layanan = $('#layanan').val();


            $.ajax({
                url: "<?= base_url(); ?>booking/cost",
                method: "POST",
                data: {
                    layanan: layanan
                },
                success: function(obj) {
                    var hasil = obj.split(",");

                    $('#ongkir').val(hasil[0]);
                    $('#total').val(hasil[1]);
                }

            });
        });


        $('#berat').change(function() {
            var berat = $('#berat').val();

            if (isNaN(berat)) {
                berat = 0;
            }
            berat.val(Number(berat));

        });

    });
</script>