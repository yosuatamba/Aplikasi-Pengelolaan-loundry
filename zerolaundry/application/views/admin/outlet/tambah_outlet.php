<a class="btn btn-primary" href="<?= base_url().'admin/outlet' ?>" role="button">kembali</a><br><br>
<div class="card">
  <div class="card-action">
    Tambah Data Outlet
  </div>
  <div class="card-content">
    <!-- Main -->
    <div class="row">
      <div class="col s115">
        <div class="card-content">
          <form method="post" action="<?= base_url('admin/outlet/aksi_tambah') ?>" enctype="multipart/form-data">
            <div class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input id="nama" type="text" class="validate" name="nama_outlet" autocomplete="off" required>
                  <label for="nama" class="black-text">Nama Outlet</label>
                </div>
                <div class="input-field col s6">
                  <input id="tlp" type="number" class="validate" name="tlp" autocomplete="off" required>
                  <label for="tlp" class="black-text">Telephone</label>
                </div>
              </div>
            </div>
            <div class="col row1 s12">
              <div class="row">
                <div class="input-field col s6">
                  <input id="alamat" type="text" class="validate" name="alamat" autocomplete="off" required></input>
                  <label for="alamat" class="black-text" >Alamat</label>
                </div>
              </div>
            </div>
						<input type="submit" class="btn btn-success" value="Tambah Data Outlet">
          </form>
        </div>
      </div>
    </div>
        <!-- End Main -->
  </div>
</div>