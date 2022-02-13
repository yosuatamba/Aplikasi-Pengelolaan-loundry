<!-- Main -->
<a class="btn btn-primary" href="<?= base_url().'admin/pelanggan' ?>" role="button">kembali</a><br><br>
<div class="card">
    <div class="card-action">
        Ubah Data Pelanggan
    </div>
    <div class="card-content">
        <!-- Main -->
            <div class="row">
                <div class="col s115">
                    <div class="card-content">
                        <form method="post" action="<?= base_url('admin/pelanggan/aksi_ubah') ?>" enctype="multipart/form-data">
                            <div class="col s12">
                            <?php foreach($member as $m){ ?>
                              <div class="row">
                                <div class="col s4">
                                  <label for="id_member" class="black-text" >ID Pelanggan</label>
                                  <input id="id_member" type="text" class="validate invalid" name="id_member" value="<?= $m->id_member; ?>" readonly>
                                  <?= form_error('id_member'); ?>
                                </div>
                                <div class="col s4">
                                  <label for="nama" class="black-text">Nama</label>
                                    <input id="nama" type="text" class="validate invalid" name="nama" value="<?= $m->nama_member; ?>" autocomplete="off" required>
                                    <?= form_error('id_member'); ?>
                                </div>
                                <div class="col s4">
                                  <label for="tlp" class="black-text">Telepon</label>
                                    <input id="tlp" type="number" class="validate invalid" name="tlp" value="<?= $m->tlp; ?>" autocomplete="off" required>
                                    <?= form_error('id_member'); ?>
                                </div>
                              </div>
                            </div>
                            <div class="col s12">
                              <div class="row">
                                <div class="col s12">
                                  <label for="alamat" data-error="wrong" data-success="right" class="black-text" >Alamat</label>
                                    <input id="alamat" type="text" class="validate invalid" name="alamat" value="<?= $m->alamat; ?>" autocomplete="off" required></input>
                                  </div>
                                  <?= form_error('id_member'); ?>
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
                              <?php } ?>
                            </div>
                            <input type="submit" class="btn btn-success " value="Ubah Pelanggan">
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row (nested) -->
        <!-- End Main -->
    </div>
</div>