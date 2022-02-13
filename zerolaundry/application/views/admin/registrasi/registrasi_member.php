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
                        <form method="post" action="<?= base_url('admin/registrasi/aksi_tambah') ?>" enctype="multipart/form-data">
                            <div class="col s12">
								<div class="row">
									<div class="input-field col s6">
									    <input id="nama" type="text" class="validate black-text" name="nama_member" autocomplete="off" required>
									    <label for="nama" class="black-text">Nama</label>
									</div>
									<div class="input-field col s6">
									    <input id="tlp" type="number" class="validate black-text" name="tlp" autocomplete="off" required>
								        <label for="tlp" class="black-text">Telepon</label>
									</div>
								</div>
							</div>
							<div class="col s12">
								<div class="row">
									<div class="input-field col s12">
									    <input id="alamat" type="text" class="validate black-text" name="alamat" autocomplete="off" required>
									    <label for="alamat" class="black-text" >Alamat</label>
									</div>
								</div>
                            </div>
							<div class="col s12">
								<div class="row">
                                    <label for="jenis_kelamin" class="col s12 jeniskelamin-label black-text ">Jenis Kelamin</label>
									<div class="col s12">
                                    <input class="with-gap" name="jenis_kelamin" value="Laki-Laki" type="radio" id="laki"  />
                                        <label for="laki" class="black-text">Laki-Laki</label>
                                        <input class="with-gap" name="jenis_kelamin" value="Perempuan" type="radio" id="perempuan">
                                        <label for="perempuan" class="black-text">Perempuan</label>
									</div>
								</div>
							</div>
                            <input type="submit" class="btn btn-success " value="Selanjutnya">
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row (nested) -->
        <!-- End Main -->
    </div>
</div>