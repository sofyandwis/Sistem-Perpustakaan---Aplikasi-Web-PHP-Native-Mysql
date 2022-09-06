<?php

$tgl_pinjam = date('d-m-Y');
$tujuh_hari = mktime(0,0,0, date('n'), date('j') + 7, date('Y'));
$kembali = date('d-m-Y', $tujuh_hari);

if(isset($_POST['tambah'])) {
    
    $tgl_pinjam = ($_POST['tgl_pinjam']);

    $tgl_kembali = ($_POST['tgl_kembali']);
    $nama_buku = $_POST['buku'];
var_dump($nama_buku);
    $transaksiB = explode(",", $nama_buku);
    $id = $transaksiB[0];
    $judul = $transaksiB[1];
    $nama_anggota = $_POST['nama'];
    $transaksiN = explode(",", $nama_anggota);
    $nim = $transaksiN[0];
    $nama = $transaksiN[1];

    $data = new Buku();

    foreach($data->transaksi($judul) as $key) :

        $sisa = $key['jumlah_buku'];
        if($sisa == 0) {
            echo "<script>alert('Stok Buku Habis, Transaksi, tidak dapat dilakukan, silahkan tambahkan stok buku dulu.');window.location='?p=transaksi&aksi=tambah';</script>";
        } else {
            $data= $data->transaksi2($id,$nim,$tgl_pinjam,$tgl_kembali,$sisa);
        
            echo "<script>alert('Data transaksi berhasil ditambahkan.');window.location='?p=transaksi';</script>";
        }
    endforeach;
}
?>
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
    <form action="" method="post">
        <div class="table-responsive">  
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <td> 
                            <input type="hidden" name="cek" value="buku">
                            <input type="hidden" name="act" value="create">
                            <select name="nama" id="nama_anggota" class="form-control" required="required">
                               <?php 
                                    $data = new Anggota(); 
                                    
                                    foreach($data->read() as $key) :
                                        if ($key['nama_anggota'] == $_SESSION['user']['nama'] ) 
                                        {
                                          ?>  <option value="<?=$key['id_anggota'],',',$key['nim']?>"><?= $_SESSION['user']['nama']; ?></option><?php    
                                        }
                                    endforeach;    
                                    
                                ?> 
                            </select>
                        </td>                                            
                    </tr>
                    <tr>
                        <th>Judul Buku</th>
                        <td> 
                            <input type="hidden" name="cek" value="buku">
                            <input type="hidden" name="act" value="create">
                            <select name="buku" id="nama_buku" class="form-control" required="required">
                                <option value="" >-- Pilih Buku --</option>
                                <?php 
                                    $data = new Buku(); 
                                ?>
                                    <?php foreach($data->read() as $key) : ?>
                                    <option value="<?=$key['id_buku'].','.$key['judul_buku']?>"><?= $key['judul_buku']; ?></option>
                                    <?php endforeach; ?>
                            </select>
                            
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>
                            <div class="form-group">
                                <label for="tgl_pinjam">Tanggal Pinjam</label>
                                <input  type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="" value="<?= $tgl_pinjam ?>">
                            </div>
                            <div class="form-group">
                                <label for="tgl_kembali">Tanggal Kembali</label>
                                <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly="" value="<?= $kembali ?>">
                            </div>
    
                        </td>
                    </tr>
                </thead>
            </table>
        
            <button name="tambah" type="submit">Kirim</button>
        </form>
    </center>
</body>
</html> 