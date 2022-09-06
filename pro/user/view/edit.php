<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>            
        <?php 
            include "../config/Anggota.php";
            $anggota = new Anggota();
            $id_anggota = $_GET['id_anggota'];
        ?>
        <?php foreach($anggota->show($id_anggota) as $key) : ?>
        <form action="../config/checkingPost.php" method="post">
            <input type="hidden" name="cek" value="anggota">
            <input type="hidden" name="act" value="update">
            <input type="hidden" name="id_anggota" value="<?php echo $key['id_anggota'] ?>">
            <input type="text" name="nim" value="<?php echo $key['nim'] ?>" placeholder="Masukkan NIM">
            <input type="text" name="nama_anggota" value="<?php echo $key['nama_anggota'] ?>" placeholder="Masukkan Nama anggota">
            <input type="text" name="tempat_lahir" value="<?php echo $key['tempat_lahir'] ?>" placeholder="Masukkan Tempat Lahir">
            <input type="text" name="tgl_lahir" value="<?php echo $key['tgl_lahir'] ?>" placeholder="Masukkan Tanggal Lahir">
            <input type="text" name="jk" value="<?php echo $key['jk'] ?>" placeholder="Masukkan Gender">
            <input type="text" name="prodi" value="<?php echo $key['prodi'] ?>" placeholder="Masukkan Prodi">
            <button type="submit">Kirim</button>
        </form>
        <?php endforeach ?>
        
    </center>
</body>
</html>