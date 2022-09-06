<?php 
// if(isset($_POST['tambah'])) {
//     $nim =$_POST['nim'];
//     $nama =$_POST['nama_anggota'];
//     $tempat_lahir =$_POST['tempat_lahir'];
//     $tgl_lahir = $_POST['tgl_lahir'];
//     $jk = $_POST['jk'];
//     $prodi = $_POST['prodi'];

//     if(empty($nim && $nama && $tempat_lahir && $tgl_lahir && $jk && $prodi)) {
//         echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=buku';</script>";
//     }

//     $sql = $conn->query("INSERT INTO tb_anggota VALUES (null, '$nim', '$nama', '$tempat_lahir', '$tgl_lahir', '$jk', '$prodi')") or die(mysqli_error($conn));
//     if($sql) {
//         echo "<script>alert('Data Berhasil Ditambahkan.');window.location='?p=anggota';</script>";
//     } else {
//         echo "<script>alert('Data Gagal Ditambahkan.')</script>";
//     }
// }
?>

<h1 class="mt-4">Update Data Anggota</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">update data anggota</li>
</ol>
<div class="card-header mb-5">
    <?php 
    $data = new Anggota(); 
    $id_anggota = $_GET['id_anggota'];

    foreach($data->show($id_anggota) as $key) :
    $jk = ($key['jk'] == 'L') ? 'Laki-Laki' : 'Perempuan';
                  
    ?> 
                   
	
	<form action="config/checkingPost.php" method="post">
    <div class="form-group">
        <input type="hidden" name="cek" value="anggota">
        <input type="hidden" name="id_anggota" value="<?=$key['id_anggota'];?>">
        <input type="hidden" name="act" value="update">
        <label class="small mb-1" for="nim">NIM</label>
        <input class="form-control" value="<?= $key['nim']; ?>" required="required" id="nim" name="nim" type="number" placeholder="Masukan NIM Anda"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_anggota">Nama</label>
        <input class="form-control" value="<?= $key['nama_anggota']; ?>"required="required" id="nama_anggota" name="nama_anggota" type="text" placeholder="Masukan pengarang buku"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="tempat_lahir">Tempat Lahir</label>
        <input class="form-control" value="<?= $key['tempat_lahir']; ?>"required="required" id="tempat_lahir" name="tempat_lahir" type="text" placeholder="Masukan penerbit buku"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jk">Jenis Kelamin</label>
        <select required="required" name="jk" id="jk" class="form-control">
            <option value="<?=$jk ?>"><?=$jk ?></option>
            <?php
                if($key['jk'] == 'L')
                {
                    ?><option value="P">Perempuan</option><?php
                }else if($key['jk'] == 'P')
                {
                    ?><option value="L">Laki-Laki</option><?php
                }else{
                    ?><option value="P">Perempuan</option><?php
                    ?><option value="L">Laki-Laki</option><?php

                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jumlah_buku">Prodi</label>
        <select name="prodi" id="prodi" class="form-control">
            <option value="<?= $key['prodi']; ?>"><?= $key['prodi']; ?></option>
            <option value="Manajemen">Manajemen</option>
            <option value="Akuntansi">Akuntansi</option>
            <option value="manajemen Perpajakan">Manajemen Perpajakan</option>
            <option value="Management Informatika">Management Informatika</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Psikologi">Psikologi</option>
            <option value="Bahasa Inggris">Bahasa Inggris</option>
        </select>
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="tambah">Update Data</button>
    </div>
    <?php endforeach; ?>
	</form>
</div>