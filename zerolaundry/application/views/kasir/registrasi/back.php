<!-- Main -->
<div class="card">
    <div class="card-action black-text">
        Tambah Data Transaksi
    </div>
    <div class="card-content">
        <!-- Main -->
            <div class="row">
                <div class="col s115">
                    <div class="card-content">
                        <form method="post" action="<?= base_url('kasir/registrasi/aksi_ubah') ?>" enctype="multipart/form-data">
                        <?php foreach($member as $m){ ?>
                            <div class="col s12">
								<div class="row">
                                <input type="hidden" name="id_member" value="<?= $m->id_member; ?>"y>
									<div class="col s6">
									    <label for="nama" class="black-text">Nama</label>
									    <input id="nama" type="text" class="validate invalid black-text" name="nama" value="<?= $m->nama_member; ?>" autocomplete="off" required>
									</div>
									<div class="col s6">
								        <label for="tlp" class="black-text">Telepon</label>
									    <input id="tlp" type="number" class="validate invalid black-text" name="tlp" value="<?= $m->tlp; ?>" autocomplete="off" required>
									</div>
								</div>
							</div>
							<div class="col s12">
								<div class="row">
									<div class="col s12">
									    <label for="alamat" class="black-text" >Alamat</label>
									    <input id="alamat" type="text" class="validate invalid black-text" name="alamat" value="<?= $m->alamat; ?>" autocomplete="off" required>
									</div>
								</div>
                            </div>
							<div class="col s12">
                                <div class="row">
                                    <label for="jenis_kelamin" class="col s12 jeniskelamin-label black-text ">Jenis Kelamin</label>
                                    <div class="col s12">
                                        <input class="with-gap" name="jenis_kelamin" value="Laki-Laki" type="radio" id="laki" <?= $m->jenis_kelamin == 'Laki-Laki' ? 'checked' : null ?>>
                                        <label for="laki" class="black-text">Laki-Laki</label>
                                        <input class="with-gap" name="jenis_kelamin" value="Perempuan" type="radio" id="perempuan" <?= $m->jenis_kelamin == 'Perempuan' ? 'checked' : null ?>>
                                        <label for="perempuan" class="black-text">Perempuan</label>
                                    </div>
                                    <?= form_error('id_member'); ?>
                                </div>
							</div>
                            <?php } ?>
                            <input type="submit" class="btn btn-success " value="Selanjutnya">
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row (nested) -->
        <!-- End Main -->
    </div>
</div>