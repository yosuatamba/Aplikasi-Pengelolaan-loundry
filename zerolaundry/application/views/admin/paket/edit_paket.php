<a class="btn btn-primary" href="<?= base_url().'admin/paket' ?>" role="button">kembali</a><br><br>
<div class="card">
  <div class="card-action">
    Ubah Data Paket Cucian
  </div>
  <div class="card-content">
      <!-- Main -->
    <div class="row">
      <div class="col s115">
        <div class="card-content">
          <form method="post" action="<?= base_url('admin/paket_update') ?>" enctype="multipart/form-data">
          <?php foreach($paket as $m){ ?>
            <!-- Row 1 -->
            <div class="col s12">
              <div class="row">
                <div class="col s4">
                  <label for="id_paket" class="black-text">ID Paket</label>
                  <input id="id_paket" type="text" class="validate invalid" name="id_paket" value="<?= $m->id_paket; ?>" readonly>
                  <?= form_error('id_paket'); ?>
                </div>
                <div class="col s4">
                  <label for="nama_paket" class="black-text">Nama Paket</label>
                  <input id="nama_paket" type="text" class="validate invalid" name="nama_paket" value="<?= $m->nama_paket; ?>" autocomplete="off" required>
                  <?= form_error('nama_paket'); ?>
                </div>
                <div class="col s4">
                  <label for="harga" class="black-text">Harga</label>
                  <input id="harga" type="number" class="validate invalid" name="harga" value="<?= $m->harga; ?>" autocomplete="off" required>
                  <?= form_error('harga'); ?>
                </div>
							</div>
						</div>
            <!-- Row 2 -->
            <div class="col row1 s12">
              <div class="row">
                <div class="col s6">
                  <label for="id_outlet" class="black-text" >ID Outlet</label>
                  <select class="" aria-label="Default select example" name="id_outlet">
                    <?php foreach($outlet as $o){ ?>
                      <option value="<?= $o->id_outlet; ?>" <?= $m->id_outlet == $o->id_outlet ? 'selected' : null ?>><?= $o->nama_outlet; ?></option>
                    <?php } ?>
                  </select>
                  <?= form_error('id_outlet'); ?>
                </div>
                <div class="col s6">
                <label for="jenis" class="col s12 jeniskelamin-label black-text ">Jenis Paket Cucian</label>
                  <input class="with-gap" name="jenis" value="Satuan" type="radio" id="Satuan" <?= $m->jenis == 'Satuan' ? 'checked' : null ?>>
                  <label for="Satuan" class="black-text">Satuan</label>
                  <input class="with-gap" name="jenis" value="Kiloan" type="radio" id="Kiloan" <?= $m->jenis == 'Kiloan' ? 'checked' : null ?>>
                  <label for="Kiloan" class="black-text">Kiloan</label>
                  <?= form_error('jenis'); ?>
                  </div>
              </div>
            </div>
            <?php } ?>
            <input type="submit" class="btn btn-success " value="Ubah Data Paket Cucian">
          </form>
				</div>
      </div>
    </div>
  </div>
  <!-- End Main -->
</div>