<section style="margin-left: 30%">
    <div class="container content">
        <div class="row">
            <div class="col-lg-6">
                <form action="<?php echo base_url('tarif/cost'); ?>" method="GET">
                    <h6 class="title-bar"><i class="fa fa-caret-square-o-right"></i> <strong> KOTA ASAL</strong></h6>
                    <hr />
                    <div class="form-group">
                        <label for="originprovince">Provinsi</label>
                        <select class="form-control" name="originprovince" id="originprovince" required="" onchange="showOrig(this.value)">
                            <option value="">- Provinsi -</option>
                            <?php foreach ($province->rajaongkir->results as $prov) { ?>
                                <option value="<?php echo $prov->province_id; ?>"><?php echo $prov->province; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="origincity">Kota</label>
                        <select class="form-control" name="origincity" id="origincity" required="">
                            <option value="">- Pilih Kota -</option>
                        </select>
                    </div>
                    <h6 class="title-bar"><i class="fa fa-caret-square-o-right"></i><strong> KOTA ASAL</strong></h6>
                    <hr />
                    <div class="form-group">
                        <label for="destinationprovince">Provinsi</label>
                        <select class="form-control" name="destinationprovince" id="destinationprovince" required="" onchange="showDest(this.value)">
                            <option value="">- Provinsi -</option>
                            <?php foreach ($province->rajaongkir->results as $dest) { ?>
                                <option value="<?php echo $dest->province_id; ?>"><?php echo $dest->province; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="destinationcity">Kota</label>
                        <select class="form-control" name="destinationcity" id="destinationcity" required="">
                            <option value="">- Pilih Kota -</option>
                        </select>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="courier">Kurir</label>
                        <select class="form-control" name="courier" id="courier" required="">
                            <option value="">- Pilih Kurir -</option>
                            <option value="jne">JNE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="weight">Berat (Kg)</label>
                        <input class="form-control" type="number" name="weight" id="weight" required="">
                    </div>
                    <div class="form-group">
                        <button class="btn beranda-layanan-btn" type="submit" style="margin-left: 45%;">CEK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>