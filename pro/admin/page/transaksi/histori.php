<?php 
require_once 'function.php';
?>
<h1 class="mt-4">Histori Transaksi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">Histori Transaksi</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Histori Transaksi
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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $data = new Transaksi(); 
                     
                     ?>
                     <?php foreach($data->tampilHistori() as $key) :
                    
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $key['nim']; ?></td>
                        <td><?= $key['judul_buku']; ?></td>
                        <td><?= $key['tgl_pinjam']; ?></td>
                        <td><?= $key['tgl_kembali']; ?></td>
                        <td><?= $key['status']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>