<!-- Main -->
<a class="btn btn-primary" href="<?= base_url().'kasir/transaksi' ?>" role="button">kembali</a><br><br>
<div class="card">
    <div class="card-action">
        Data Detail Transaksi
    </div>
    <div class="card-content">
        <!-- Card -->
        <div class="row">
            <div class="col s115">
                <div class="card-content">
                    <form method="post" action="<?= base_url('kasir/transaksi/dt_aksi') ?>" enctype="multipart/form-data">
                        <?php foreach($transaksi as $row){ ?>
                        <!-- Row 1 -->
                        <div class="col row1 s12">
                            <div class="row">
                                <div class="col s3">
                                    <label for="id" class="black-text">ID Transaksi</label>
                                    <input type="text" class="validate invalid" name="id" value="<?= $row->id; ?>" readonly>
                                    <?= form_error('id'); ?>
                                </div>
                                <div class="col s3">
                                    <label for="kode_invoice" class="black-text">Kode Invoice</label>
                                    <input id="kode_invoice" type="text" class="validate invalid" name="kode_invoice" value="<?= $row->kode_invoice; ?>" readonly>
                                    <?= form_error('kode_invoice'); ?>
                                </div>
                                <div class="col s3">
                                    <label for="tgl" class="black-text">Tanggal Masuk</label>
                                    <input id="tgl" type="text" class="validate invalid" name="tgl" value="<?= $row->tgl; ?>" readonly>
                                    <?= form_error('tgl'); ?>
                                </div>
                                <div class="col s3">
                                    <label for="tgl" class="black-text">Tanggal Bayar</label>
                                    <input id="tgl_bayar" type="text" class="validate invalid" name="tgl_bayar" value="<?= date('Y-m-d'); ?>" readonly>
                                    <?= form_error('tgl'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- Row 2 -->
                        <div class="col row2 s12">
                            <div class="row  row2">
                                <div class="col s4">
                                <label for="id_outlet" class="black-text" >ID Outlet</label>
                                <select class="" aria-label="Default select example" name="id_outlet">
                                    <?php foreach($outlet as $o){ ?>
                                        <option value="<?= $o->id_outlet; ?>" <?= $row->id_outlet == $o->id_outlet ? 'selected' : null ?>><?= $o->nama_outlet; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_outlet'); ?>
                            </div>
                            <div class="col s4">
                                <label for="id_user" class="black-text" >ID Pengguna</label>
                                <select class="" aria-label="Default select example" name="id_user">
                                    <?php foreach($user as $u){ ?>
                                        <option value="<?= $u->id_user; ?>" <?= $row->id_user == $u->id_user ? 'selected' : null ?>><?= $u->nama; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_user'); ?>
                            </div>
                            <div class="col s4">
                                <label for="id_member" class="black-text" >ID Pelanggan</label>
                                <select class="" aria-label="Default select example" name="id_member">
                                    <?php foreach($member as $m){ ?>
                                        <option value="<?= $m->id_member; ?>" <?= $row->id_member == $m->id_member ? 'selected' : null ?>><?= $m->nama_member; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_member'); ?>
                            </div>
                                
                            </div>
                        </div>
                        <!-- Row 3 -->
                        <div class="col row2 s12">
                            <div class="row">
                            <div class="col s6">
                                    <label for="harga_awal" class="black-text" >Nama Paket</label>
                                    <select class="" aria-label="Default select example" name="harga_awal">
                                        <?php foreach($paket as $m){ ?>
                                            <option value="<?= $m->harga; ?>" <?= $row->id_paket == $m->id_paket ? 'selected' : null ?>><?= $m->nama_paket; ?> : <?= $m->harga; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('harga_awal'); ?>
                                </div>
                                <div class="col s6">
                                    <label for="status" class="black-text" >Status</label>
                                    <select class="" aria-label="Default select example" name="status">
                                        <option value="baru" <?= $row->status == 'baru' ? 'selected' : null ?>>Baru</option>
                                        <option value="proses" <?= $row->status == 'proses' ? 'selected' : null ?>>Proses</option>
                                        <option value="selesai" <?= $row->status == 'selesai' ? 'selected' : null ?>>Selesai</option>
                                        <option value="diambil" <?= $row->status == 'diambil' ? 'selected' : null ?>>Diambil</option>
                                    </select>
                                    <?= form_error('status'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- Row 4 -->
                        <div class="col row2 s12">
                            
                            <div class="row">
                                <div class="col s6">
                                    <label for="biaya_tambahan" class="black-text">Biaya Tambahan</label>
                                    <input id="biaya_tambahan" type="number" class="validate invalid" name="biaya_tambahan" autocomplete="off" value="<?= $row->biaya_tambahan; ?>" required>
                                    <?= form_error('biaya_tambahan'); ?>
                                </div>
                                <div class="col s6">
								    <label for="diskon" class="black-text">Diskon <small class="red-text"> * Tanpa %</small> </label>
                                    <input id="diskon" type="number" class="validate invalid" name="diskon"  value="<?= $row->diskon; ?>" autocomplete="off" required>
                                    <?= form_error('diskon'); ?>
                                </div>
                            </div>
                        <!-- Row 4 -->
                        <div class="col row2 s12">
                        </div>
                        <div class="col s12">
                            <div class="row">
                                <div class="col s6">
                                    <h4 for="harga" class="black-text"><strong>Total Harga</strong> </h4>
                                    <input id="harga" type="number" class="validate bold invalid" name="total_harga" value="<?= $row->total_harga; ?>" autocomplete="off" readonly>
                                    <?= form_error('harga'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                        <?php } ?>
                    </div>
                    <input type="submit" class="btn btn-success " value="Simpan Data">
                    <a target="blank" href="<?php echo base_url().'kasir/transaksi/print_nota/'.$row->id?>" class="btn btn-sm btn-primary"> Cetak Nota</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
<!-- End Main -->