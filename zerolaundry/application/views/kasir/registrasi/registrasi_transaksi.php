<!-- Main -->
<a class="btn btn-primary" href="<?= base_url().'kasir/registrasi/back' ?>" role="button">kembali</a><br><br>
<div class="card">
    <div class="card-action">
        Tambah Data Transaksi
    </div>
    <div class="card-content">
        <!-- Card -->
            <div class="row">
                <div class="col s115">
                    <div class="card-content">
                        <form method="post" action="<?= base_url('kasir/registrasi/aksi') ?>" enctype="multipart/form-data">
                        <!-- Row 1 -->
                            <div class="col row1 s12">
                                <div class="row">
                                    <div class="col s4">
                                        <label for="id_outlet" class="black-text" >Outlet</label>
                                        <select class="" aria-label="Default select example" name="id_outlet">
                                            <option value=""> -- Pilih Outlet -- </option>
                                            <?php foreach($outlet as $u){ ?>
                                                <option value=" <?= $u->id_outlet; ?>"><?= $u->nama_outlet; ?>   </option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('id_outlet'); ?>
                                    </div>
                                    <div class="col s4">
                                        <label for="id_user" class="black-text" >Pengguna</label>
                                        <select class="" aria-label="Default select example" name="id_user">
                                            <option value=""> -- Pilih Pengguna -- </option>
                                            <?php foreach($user as $u){ ?>
                                                <option value=" <?= $u->id_user; ?>"><?= $u->nama; ?>   </option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('id_user'); ?>
                                    </div>
                                    <div class="col s4">
                                        <label for="id_paket" class="black-text" >Paket Cucian</label>
                                        <select class="" aria-label="Default select example" name="id_paket">
                                            <option value=""> -- Pilih paket -- </option>
                                            <?php foreach($paket as $u){ ?>
                                                <option value=" <?= $u->id_paket; ?>"><?= $u->nama_paket; ?> = Rp <?= $u->harga; ?>   </option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('id_paket'); ?>
                                    </div>
                                    <!-- Hidden Input -->
                                    <input name="status" type="hidden" value="baru">
                                    <select hidden name="id_member">
                                        <?php foreach($member as $u){ ?>
                                            <option value=" <?= $u->id_member; ?>"></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('id_outlet'); ?>
                                </div>
                            </div>
                        <!-- Row 2 -->
                            <div class="col s12">
                                <div class="row">
                                    <div class="col s6">
                                        <label for="kode_invoice" class="black-text">Kode Invoice</label>
                                        <input id="kode_invoice" type="text" class="validate invalid" name="kode_invoice" value="<?php $mt_rand = mt_rand(10000, 9999999999); echo 'INVC-'.$mt_rand;?>" readonly>
                                        <?= form_error('kode_invoice'); ?>
                                    </div>
                                    <div class="col s6">
                                        <label for="tgl" class="black-text">Tanggal Masuk</label>
                                        <input type="text" class="validate invalid" name="tgl" value="<?= date('Y-m-d'); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        <!-- End Row -->
                        <input type="submit" class="btn btn-success " value="Tambah Data Transaksi">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
</div>
<!-- End Main -->