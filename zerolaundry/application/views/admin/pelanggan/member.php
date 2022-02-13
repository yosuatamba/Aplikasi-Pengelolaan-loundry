<div class="card">
  <div class="card-action black-text">
    Data Pelanggan
  </div>
  <div class="card-content">
    <!-- Main -->
    <div class="table-responsive">
			<a class="btn btn-primary" href="<?= base_url().'admin/pelanggan/tambah' ?>" role="button">Tambah Data Pelanggan</a>
			<br><br>
      <?php
            if(isset($results))
            { ?>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
                <th scope="col"class="center">Id Pelanggan</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Telepon</th>
                <th scope="col" class="center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
                foreach($results as $m){
            ?>
            <tr>
              <td class="center"><?= $m->id_member; ?></td>
              <td><?= $m->nama_member; ?></td>
              <td><?= $m->alamat; ?></td>
              <td><?= $m->jenis_kelamin; ?></td>
              <td><?= $m->tlp; ?></td>
              <td class="text-center">
                <a href="<?= base_url().'admin/pelanggan/ubah/'.$m->id_member; ?>" class="btn btn-warning btn-sm">Ubah</a>
                <a href="<?= base_url().'admin/pelanggan/hapus/'.$m->id_member; ?>" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php
                }else{
            ?>
            <p class="text-danger center">Tidak ada data</p>
            <div class="co s12l">
              <div class="row">
                <div class="col s6"></div>
                <div class="col s6">
                <?php
            }
                if(isset($links)){
                    echo "<p>" . $links . "</p>";
            }
            ?>
                </div>
              </div>
            </div>
           
    </div>
    <!-- End Main -->
  </div>
</div>
