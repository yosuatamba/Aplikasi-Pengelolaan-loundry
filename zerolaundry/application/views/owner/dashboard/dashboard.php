	
	<div class="dashboard-cards"> 
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="card horizontal cardIcon waves-effect waves-dark">
                        <div class="card-image green">
                            <i class="material-icons dp48">swap_vert</i>
                        </div>
                        <div class="card-stacked green">
                            <div class="card-content">
                                <h3><?= $transaksi ?></h3> 
                            </div>
                            <div class="card-action">
                                <strong>Transaksi</strong>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
					<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image orange">
							<i class="material-icons dp48">supervisor_account</i>
						</div>
						<div class="card-stacked orange">
							<div class="card-content">
								<h3><?= $member ?></h3> 
							</div>
							<div class="card-action">
								<strong>Pelanggan</strong>
							</div>
						</div>
					</div> 
				</div>
                <div class="col-xs-12 col-sm-6 col-md-3">
					<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image blue">
						<i class="material-icons dp48">assignment_ind</i>
						</div>
						<div class="card-stacked blue">
							<div class="card-content">
								<h3><?= $user ?></h3> 
							</div>
							<div class="card-action">
							<strong>Pegawai</strong>
							</div>
						</div>
					</div> 
				</div>
                <div class="col-xs-12 col-sm-6 col-md-3">
					<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image red">
							<i class="material-icons dp48">reorder</i>
						</div>
						<div class="card-stacked red">
							<div class="card-content">
								<h3><?= $paket ?></h3> 
							</div>
							<div class="card-action">
								<strong>Paket Cucian</strong>
							</div>
						</div>
					</div>
				</div>
            </div>
		
		<!-- Transaksi Terkini -->
		<div class="card">
    <div class="card-action black-text">
        Data Transaksi Terkini
    </div>
    <div class="card-content">
    <!-- Main -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead class="text-center black-text">
            <tr>
                <th Scope="col" class="center">No </th>
                <th scope="col" class="center">ID Transaksi</th>
                <th scope="col" class="center">ID Pelanggan</th>
                <th scope="col">Kode Invoice</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Tanggal Bayar</th>
                <th scope="col">Biaya</th>
                </tr>
            </thead>
            <tbody class="text-center black-text">
                <?php
                    $no = $this->uri->segment('3') + 1;
                    if($row > 0){
                        foreach($row as $t){
                ?>                    
                <tr>
                    <th scope="row" class="center"><?= $no++; ?></th>
                        <td class="center"><?= $t->id; ?></td>
                        <td class="center"><?= $t->id_member; ?></td>
                        <td><?= $t->kode_invoice; ?></td>
                        <td><?= $t->nama_member; ?></td>
                        <td><?= $t->tgl; ?></td>
                        <td><?= $t->tgl_bayar; ?></td>
                        <td><?= $t->total_harga; ?></td>
                    </tr>
                    <?php 
                            }
                        }else{
                            echo '
                                <tr>
                                    <td colspan="6"><h4 class="text-danger">Data Tidak Ada</h4></td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
	</div>
        <!-- <div class="row">
            <div class="col">
                <?= $pagination; ?>
            </div>
        </div> -->
        <!-- End Main -->
    </div>
</div>