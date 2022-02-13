<!DOCTYPE html>
<html><head>
    <title></title>
    <style>
    body {
    	width: 90%;
    	margin: auto;
        font-family: "helvetica";
    }

    table {
		border: 1px solid #ddd;
		width: 100%;
		margin-top: 20px;
		margin-bottom: 12px;
		border-collapse: collapse;
		text-align: left;
	}

	td, th {
		border: 1px solid #ddd;
		padding: 6px;
	}

	table th {
		font-weight: bold;
		text-align: left;
	}

	span {
		margin-left: 20px;
	}

	.center {
		text-align: center;
	}

	#no {
		width: 30px;
	}

	</style>
</head><body>
	<h1>Data Transaksi ZeroLaundry</h1>
	<?php 
		echo '<p>Transaksi Dalam Rentang Waktu</p>';
		echo '<p>Dari : '.$dari.'<span>Sampai : '.$sampai.'</span></p>';
	?>
    <table>
		<tr>
            <th style="text-align: center;">No.</th>
            <th>ID Transaksi</th>
            <th>Kode Invoice</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Bayar</th>
            <th>Biaya</th>
		</tr>
		<?php
        // var_dump($data_transaksi); die;
            $no = 1;
            $total_pendapatan = 0;
            foreach ($data_transaksi as $transaksi) {
            	$total_pendapatan += $transaksi->total_harga;
        ?>
        <tr>
        <td scope="row" style="text-align: center;"><?= $no++; ?></td>
                <td style="text-align: center;"><?= $transaksi->id; ?></td>
                <td><?= $transaksi->kode_invoice; ?></td>
                <td><?= $transaksi->nama_member; ?></td>
                <td><?= $transaksi->tgl_bayar; ?></td>
                <td><?= $transaksi->total_harga; ?></td>
		</tr>
		<?php 
			}
		?>
		<tr>
			<td colspan="5"><b>Total Pendapatan</b></td>
			<td colspan=""><b>Rp <?php echo $total_pendapatan ?></b></td>
		</tr>
	</table>
	<script type="text/javascript">
		window.print();
	</script>
</body></html>