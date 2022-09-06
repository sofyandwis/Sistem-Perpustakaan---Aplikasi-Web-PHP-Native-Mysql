<?php 
require_once 'function.php';
?>
<h1 class="mt-4">Data Transaksi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">data transaksi</li>
</ol>
<div class="col-md-6">
    <a href="?p=transaksi&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Transaksi</a>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Transaksi
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Judul</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Terlambat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $data = new Transaksi(); 
                     
                     ?>
                     <?php foreach($data->read() as $key) :
                    
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $key['nim']; ?></td>
                        <td><?= $key['judul_buku']; ?></td>
                        <td><?= $key['tgl_pinjam']; ?></td>
                        <td><?= $key['tgl_kembali']; ?></td>
                        <td>
                        	<?php 
                        	$denda = 1000;
                        	$tgl_dateline = $key['tgl_kembali'];
                        	$tgl_kembali = date('d-m-Y');

                        	$lambat = terlambat($tgl_dateline, $tgl_kembali);
                        	$denda1 = $lambat * $denda;

                        	if($lambat > 0) { ?>
                        		<div style='color:red;'><?= $lambat ?> hari<br> (Rp. <?= number_format($denda1) ?>)</div>
                        	<?php
                        	} else {
                        		echo $lambat . "Hari";
                        	}
                        	?>
                        </td>
                        <td><?= $key['status']; ?></td>
                        <td>
                            <a href="?p=transaksi&aksi=kembali&id_transaksi=<?= $key['id_transaksi']; ?>&judul=<?= $key['judul_buku']; ?>" class="btn btn-info btn-sm">Kembali</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>