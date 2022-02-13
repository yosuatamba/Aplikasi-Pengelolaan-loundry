<div class="card">
    <div class="card-action black-text">
        Data Transaksi
    </div>
    <div class="card-content">
    <!-- Main -->
        <div class="card-content">
            <form name="form_filter_karyawan" action="<?php echo base_url().'kasir/transaksi/laporan_filter' ?>" method="post"novalidate>
                <!-- <div class="col s12"> -->
                    <div class="row">
                        <div class="col s3">
                            <label class="control-label black-text">Dari</label>
                            <input type="date"  class="invalid black-text" name="dari" required>
                        </div>
                        <div class="col s3">
                            <label class="control-label black-text">Sampai</label>
                            <input type="date"  class="invalid black-text" name="sampai" required>
                        </div>
                        <div class="col s3">
                            <button type="submit" class="btn btn-primary btn-sm">Cari Data</button>
                        </div>
                    </div>
                <!-- </div> -->
            </form>
			<br><br>
            <?php
            if(isset($results))
            { ?>
            <table class="table table-striped table-hover">
            <thead class="text-center black-text">
            <tr>
                <th scope="col"class="center">Id Transaksi</th>
                <th scope="col"class="center">Id Outlet</th>
                <th scope="col"class="center">Id Pelanggan</th>
                <th scope="col">Kode Invoice</th>
                <th scope="col">Nama Member</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="text-center black-text">
                <?php
                    foreach($results as $t){
                ?>                    
                <tr>
                        <td class="center"><?= $t->id; ?></td>
                        <td class="center"><?= $t->id_outlet; ?></td>
                        <td class="center"><?= $t->id_member; ?></td>
                        <td><?= $t->kode_invoice; ?></td>
                        <td><?= $t->nama_member; ?></td>
                        <td><?= $t->tgl; ?></td>
                        <td class="fw-bold
                            <?php
                                if( $t->status == 'baru'){echo "red-text";}
                                elseif( $t->status == 'proses'){echo "orange-text";}
                                elseif( $t->status == 'selesai'){echo "text-primary";}
                                elseif( $t->status == 'diambil'){echo "green-text";}
                            ?>
                        ">
                            <?= $t->status; ?>
                        </td> 
                        <td class="text-center">
                            <a href="<?= base_url().'kasir/transaksi/detail_transaksi/'.$t->id; ?>" class="btn btn-secondary btn-sm">Lihat Detail</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
            <?php
                }else{
            ?>
            <div class="alert alert-danger center"><strong>Tidak ada data</div>
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
