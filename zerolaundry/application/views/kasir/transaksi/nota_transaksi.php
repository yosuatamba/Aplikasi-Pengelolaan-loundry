<!DOCTYPE html>
<html><head>
    <title></title>
    <style>
    body {
    	width: 80%;
    	margin: auto;
    	text-align: center;
        font-family: "helvetica";
    }

    table {
		width: 100%;
		margin-top: 20px;
		border-collapse: collapse;
		text-align: left;
	}

	td {
		padding: 12px;
	}

	.line {
		border-bottom: 1px solid black;
	}

	table td {
		font-weight: bold;
		text-align: left;
	}

	span {
		margin-left: 20px;
	}

	.right {
		text-align: right;
	}

	</style>
</head><body>
	<h4>ZeroLaundry</h4>
	<h1 class="line">Nota Transaksi</h1>
    <table>
		<tr>
            <td>Nomor Transaksi</td>
            <td class="right"><?= $data_transaksi[0]->id ?></td>
        </tr>
        <tr>
            <td>Kode Invoice</td>
            <td class="right"><?= $data_transaksi[0]->kode_invoice ?></td>
        </tr>
        <tr class="">
            <td>Tanggal Masuk</td>
            <td class="right"><?= $data_transaksi[0]->tgl ?></td>
        </tr>
        <tr class="line">
            <td>Tanggal Keluar</td>
            <td class="right"><?= $data_transaksi[0]->tgl_bayar ?></td>
        </tr>
        <tr>
            <td>Nama Outlet</td>
            <td class="right"><?= $data_transaksi[0]->nama_outlet ?></td>
        </tr>
        <tr>
            <td>Nama Pengguna</td>
            <td class="right"><?= $data_transaksi[0]->nama ?></td>
        </tr>
        <tr>
            <td>Nama Pelanggan</td>
            <td class="right"><?= $data_transaksi[0]->nama_member ?></td>
        </tr>
        <tr class="line">
            <td>Nama Paket</td>
            <td class="right"><?= $data_transaksi[0]->nama_paket ?></td>
        </tr>
        <tr>
            <td>Biaya Adm</td>
            <td class="right"><?= $data_transaksi[0]->biaya_tambahan ?></td>
        </tr>
        <tr>
            <td>Diskon</td>
            <td class="right"><?= $data_transaksi[0]->diskon ?>%</td>
        </tr>
        <tr class="line">
            <td>Harga Paket</td>
            <td class="right"><?= $data_transaksi[0]->harga ?></td>
        </tr>
        <tr class="">
            <td><b>Total Harga</b></td>
            <td class="right"><b>Rp <?= $data_transaksi[0]->total_harga ?></b></td>
        </tr>
	</table>
	<p>Terima kasih telah menggunakan pelayan kami. <br> Kami tunggu kunjungan Anda berikutnya.</p>
	<script type="text/javascript">
		window.print();
	</script>
</body
></html>