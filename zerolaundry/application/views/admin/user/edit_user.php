<!-- Main -->
<a class="btn btn-primary" href="<?= base_url().'admin/pengguna' ?>" role="button">kembali</a><br><br>
<div class="card">
  <div class="card-action">
    Ubah Data Pengguna
  </div>
  <div class="card-content">
      <!-- Main -->
    <div class="row">
      <div class="col s115">
        <div class="card-content">
          <form method="post" action="<?= base_url('admin/pengguna/aksi_ubah') ?>" enctype="multipart/form-data">
            <?php foreach($user as $m){ ?>
            <!-- Row 1 -->
            <div class="col s12">
              <div class="row">
                <div class="col s4">
                  <label for="id_user" class="black-text">ID Pengguna</label>
                  <input id="id_user" type="text" class="validate invalid" name="id_user" value="<?= $m->id_user; ?>" readonly>
                  <?= form_error('nama'); ?>
                </div>
                <div class="col s4">
                  <label for="nama" class="black-text">Nama</label>
                  <input id="nama" type="text" class="validate invalid" name="nama" value="<?= $m->nama; ?>" autocomplete="off" required>
                  <?= form_error('nama'); ?>
                </div>
                <div class="col s4">
                  <label for="username" class="black-text">Username</label>
                  <input id="username" type="text" class="validate invalid" name="username" value="<?= $m->username; ?>" autocomplete="off" required>
                  <?= form_error('username'); ?>
                </div>
							</div>
						</div>
            <!-- Row 2 -->
            <div class="col row1 s12">
              <div class="row">
                <div class="col s4">
                  <label for="id_outlet" class="black-text" >ID Outlet</label>
                  <select class="" aria-label="Default select example" name="id_outlet">
                    <?php foreach($outlet as $o){ ?>
                      <option value="<?= $o->id_outlet; ?>" <?= $m->id_outlet == $o->id_outlet ? 'selected' : null ?>><?= $o->nama_outlet; ?></option>
                    <?php } ?>
                  </select>
                  <?= form_error('id_outlet'); ?>
                </div>
                <div class="col s4">
                  <label for="role" class="col s12 jeniskelamin-label black-text ">Role</label>
                  <input class="with-gap" name="role" value="Admin" type="radio" id="Admin" <?= $m->role == 'Admin' ? 'checked' : null ?>>
                  <label for="Admin" class="black-text">Admin</label>
                  <input class="with-gap" name="role" value="Owner" type="radio" id="Owner" <?= $m->role == 'Owner' ? 'checked' : null ?>>
                  <label for="Owner" class="black-text">Owner</label>
                  <input class="with-gap" name="role" value="Kasir" type="radio" id="Kasir" <?= $m->role == 'Admin' ? 'checked' : null ?>>
                  <label for="Kasir" class="black-text">Kasir</label>
                  <?= form_error('role'); ?>
                </div>
              </div>
            </div>
            <?php } ?>
            <input type="submit" class="btn btn-success " value="Ubah Data Pengguna">
          </form>
				</div>
      </div>
    </div>
  </div>
        <!-- /.row (nested) -->
        <!-- End Main -->
</div>          