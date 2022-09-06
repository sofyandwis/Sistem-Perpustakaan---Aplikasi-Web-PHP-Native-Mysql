<h1 class="mt-4">Data Buku</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">data buku</li>
</ol>
<div class="col-md-6">
    <a href="?p=buku&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Buku</a>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Buku
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Lokasi</th>
                        <th>ISBN</th>
                        <th>Jumlah Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $nomor = 1;
                        $data = new Buku(); 
                        
                        ?>
                        <?php foreach($data->read() as $key) : ?> 
                
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $key['judul_buku']; ?></td>
                            <td><?= $key['pengarang_buku']; ?></td>
                            <td><?= $key['penerbit_buku']; ?></td>
                            <td><?= $key['lokasi']; ?></td>
                            <td><?= $key['isbn']; ?></td>
                            <td><?= $key['jumlah_buku']; ?></td><td>
                            <a href="?p=buku&aksi=ubah&id_buku=<?= $key['id_buku']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="?p=buku&aksi=hapus&id_buku=<?= $key['id_buku']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Yakin ?')"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>