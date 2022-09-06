<h1 class="mt-4">Data Anggota</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li> 
    <li class="breadcrumb-item active">data anggota</li>
</ol>
<div class="col-md-12">
    <a href="?p=anggota&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Anggota</a>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Anggota
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Program Studi</th>
                        <th>Aksi</th>
                    </tr> 
                </thead>
                <tbody>    
                <?php 
                //    include "../config/Anggota.php";
                   $nomor = 1;
                   $data = new Anggota(); 
                    
                    ?>
                    <?php foreach($data->read() as $key) :
                    $jk = ($key['jk'] == 'L') ? 'Laki-Laki' : 'Perempuan';
                  
                    ?> 
            
                    <tr>
                        <td><?= $nomor++; ?></td>
                        <td><?= $key['nim']; ?></td>
                        <td><?= $key['nama_anggota']; ?></td>
                        <td><?= $key['tempat_lahir']; ?></td>
                        <td><?= $jk; ?></td>
                        <td><?= $key['prodi']; ?></td>
                        <td>
                           <a href="?p=anggota&aksi=ubah&act=update&cek=anggota&id_anggota=<?= $key['id_anggota']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                           <a href="?p=anggota&aksi=hapus&act=delete&cek=anggota&id_anggota=<?= $key['id_anggota']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Yakin ?')"></i></a>
                       </td>
                    </tr>
                    <?php endforeach; ?>
                
                </tbody>
            </table>
        </div>
    </div>
</div>