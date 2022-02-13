<div class="card">
  <div class="card-action black-text">
    Data Outlet
  </div>
  <div class="card-content">
    <!-- Main -->
    <div class="table-responsive">
			<a class="btn btn-primary" href="<?= base_url().'admin/outlet/tambah' ?>" role="button">Tambah Data Outlet</a>
			<br><br>
      <?php
            if(isset($results))
            { ?>
      <table class="table table-striped table-hover">
        <thead class="text-center">
          <tr>
              <th scope="col" class="center">Id Outlet</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Nomor Telepon</th>
              <th scope="col" class="center">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
          <?php
              foreach($results as $o){
          ?>
          <tr>
            <td class="center"><?= $o->id_outlet; ?></td>
            <td><?= $o->nama_outlet; ?></td>
            <td maxlength="10"><?= $o->alamat; ?></td>
            <td><?= $o->tlp; ?></td>
            <td class="text-center">
            <a href="<?= base_url().'admin/outlet/ubah/'.$o->id_outlet; ?>" class="btn btn-warning btn-sm">Ubah</a>
            <a href="<?= base_url().'admin/outlet/hapus/'.$o->id_outlet; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php
                }else{
            ?>
            <p class="text-danger center">Tidak ada data</p>
            <?php
            }
                if(isset($links)){
                    echo "<p>" . $links . "</p>";
            }
            ?>
    </div>
    <!-- End Main -->
  </div>
</div>