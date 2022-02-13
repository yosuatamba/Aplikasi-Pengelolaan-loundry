<a class="btn btn-primary" href="<?= base_url().'admin/paket_cucian' ?>" role="button">kembali</a><br><br>
<div class="card">
  <div class="card-action">
    Tambah Data Paket Cucian
  </div>
  <div class="card-content">
      <!-- Main -->
    <div class="row">
      <div class="col s115">
        <div class="card-content">
          <form method="post" action="<?= base_url('admin/paket_cucian/tambah_aksi') ?>" enctype="multipart/form-data">
            <!-- Row 1 -->
            <div class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input id="nama_paket" type="text" class="validate" name="nama_paket" autocomplete="off" required>
                  <label for="nama_paket" class="black-text">Nama Paket</label>
                  <?= form_error('nama_paket'); ?>
                </div>
                <div class="input-field col s6">
                  <input id="harga" type="number" class="validate" name="harga" autocomplete="off" required>
                  <label for="harga" class="black-text">Harga</label>
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
                    <option value=""> -- Pilih Outlet -- </option>
                    <?php foreach($outlet as $u){ ?>
                      <option value=" <?= $u->id_outlet; ?>"> <?= $u->nama_outlet; ?>   </option>
                    <?php } ?>
                    </select>
                    <?= form_error('id_outlet'); ?>
                  </div>
                <div class="col s6">
                  <label for="jenis" class="col s12 jeniskelamin-label black-text ">Jenis Paket Cucian</label>
                  <input class="with-gap" name="jenis" value="Satuan" type="radio" id="Satuan">
                  <label for="Satuan" class="black-text">Satuan</label>
                  <input class="with-gap" name="jenis" value="Kiloan" type="radio" id="Kiloan">
                  <label for="Kiloan" class="black-text">Kiloan</label>
                  <?= form_error('jenis'); ?>
                  </div>
              </div>
            </div>
            <input type="submit" class="btn btn-success " value="Tambah Data Paket Cucian">
          </form>
				</div>
      </div>
    </div>
  </div>
  <!-- End Main -->
</div>