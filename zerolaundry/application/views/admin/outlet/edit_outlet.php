<a class="btn btn-primary" href="<?= base_url().'admin/outlet' ?>" role="button">kembali</a><br><br>
<div class="card">
  <div class="card-action">
    Ubah Data Outlet
  </div>
  <div class="card-content">
    <!-- Main -->
    <div class="row">
      <div class="col s115">
        <div class="card-content">
          <form method="post" action="<?= base_url('admin/outlet/aksi_ubah') ?>" enctype="multipart/form-data">
          <?php foreach($outlet as $o){ ?>
            <div class="col row1 s12">
              <div class="row">
                <div class="col s6">
                  <label for="id_outlet" class="black-text">ID Outlet</label>
                  <input id="id_outlet" type="text" class="validate invalid" name="id_outlet" value="<?= $o->id_outlet; ?>" readonly>
                </div>
                <div class="col s6">
                  <label for="nama" class="black-text">Nama Outlet</label>
                  <input id="nama" type="text" class="validate invalid" autocomplete="off" name="nama_outlet" value="<?= $o->nama_outlet; ?>" required>
                </div>
              </div>
            </div>
            <div class="col s12">
              <div class="row">
                <div class="col s6">
                  <label for="alamat" class="black-text" >Alamat</label>
                  <input id="alamat" type="text" class="validate invalid" autocomplete="off" name="alamat" value="<?= $o->alamat; ?>" required>
                </div>
                <div class="col s6">
                  <label for="tlp" class="black-text">Telephone</label>
                  <input id="tlp" type="number" class="validate invalid" autocomplete="off" name="tlp" value="<?= $o->tlp; ?>" required>
                </div>
              </div>
            </div>
            <?php } ?>
						<input type="submit" class="btn btn-success " value="Ubah Data Outlet">
          </form>
        </div>
      </div>
    </div>
        <!-- End Main -->
  </div>
</div>