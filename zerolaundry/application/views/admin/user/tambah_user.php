<!-- Main -->
<a class="btn btn-primary" href="<?= base_url().'admin/pengguna' ?>" role="button">kembali</a><br><br>
<div class="card">
  <div class="card-action">
    Tambah Data Pengguna
  </div>
  <div class="card-content">
      <!-- Main -->
    <div class="row">
      <div class="col s115">
        <div class="card-content">
          <form method="post" action="<?= base_url('admin/pengguna/aksi_tambah') ?>" enctype="multipart/form-data">
            <!-- Row 1 -->
            <div class="col s12">
              <div class="row">
                <div class="input-field col s4">
                  <input id="nama" type="text" class="validate" name="nama" autocomplete="off" required>
                  <label for="nama" class="black-text">Nama</label>
                  <?= form_error('nama'); ?>
                </div>
                <div class="input-field col s4">
                  <input id="username" type="text" class="validate" name="username" autocomplete="off" required>
                  <label for="username" class="black-text">Username</label>
                  <?= form_error('username'); ?>
                </div>
                <div class="input-field col s4">
                  <input id="password" type="text" class="validate" name="password" autocomplete="off" required>
                  <label for="password" class="black-text">Password</label>
                  <?= form_error('password'); ?>
                </div>
							</div>
						</div>
            <!-- Row 2 -->
            <div class="col row1 s12">
              <div class="row">
                <div class="col s4">
                  <label for="id_outlet" class="black-text" >ID Outlet</label>
                  <select class="" aria-label="Default select example" name="id_outlet">
                    <option value=""> -- Pilih Outlet -- </option>
                    <?php foreach($user as $u){ ?>
                      <option value=" <?= $u->id_outlet; ?>"><?= $u->nama_outlet; ?>   </option>
                    <?php } ?>
                  </select>
                  <?= form_error('id_outlet'); ?>
                </div>
                <div class="col s4">
                  <label for="role" class="col s12 jeniskelamin-label black-text ">Role</label>
                  <input class="with-gap" name="role" value="Admin" type="radio" id="Admin"  />
                  <label for="Admin" class="black-text">Admin</label>
                  <input class="with-gap" name="role" value="Owner" type="radio" id="Owner">
                  <label for="Owner" class="black-text">Owner</label>
                  <input class="with-gap" name="role" value="Kasir" type="radio" id="Kasir">
                  <label for="Kasir" class="black-text">Kasir</label>
                  <?= form_error('role'); ?>
                </div>
              </div>
            </div>
            <input type="submit" class="btn btn-success " value="Tambah Data Pengguna">
          </form>
				</div>
      </div>
    </div>
  </div>
        <!-- /.row (nested) -->
        <!-- End Main -->
</div>