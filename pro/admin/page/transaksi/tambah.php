<?php 

$tgl_pinjam = date('d-m-Y');
$tujuh_hari = mktime(0,0,0, date('n'), date('j') + 7, date('Y'));
$kembali = date('d-m-Y', $tujuh_hari);

if(isset($_POST['tambah'])) {
    
    $tgl_pinjam = ($_POST['tgl_pinjam']);
    $tgl_kembali = ($_POST['tgl_kembali']);
    $nama_buku = $_POST['buku'];

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

<h1 class="mt-4">Tambah Data Transaksi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">tambah data transaksi</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    
    <div class="form-group">
        <input type="hidden" name="cek" value="transaksi">
        <input type="hidden" name="act" value="create">

        <label class="small mb-1" for="nama_anggota">Nama</label>
        <select name="nama" id="nama_anggota" class="form-control" required="required">
            <option value="" required="required">-- Pilih Anggota --</option>
            <?php 
                $data = new Anggota(); 
            ?>
                <?php foreach($data->read() as $key) : ?> 
                <option value="<?=$key['id_anggota'],',',$key['nim']?>"><?=$key['nama_anggota'];?></option>
                <?php endforeach; ?>
            <?php 
            
            ?>
        </select>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_buku">Buku</label>
        <select name="buku" id="nama_buku" class="form-control" required="required">
            <option value="" >-- Pilih Buku --</option>
            <?php 
                $data = new Buku(); 
            ?>
                <?php foreach($data->read() as $key) : ?>
                <option value="<?=$key['id_buku'].','.$key['judul_buku']?>"><?= $key['judul_buku']; ?></option>
                <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tgl_pinjam">Tanggal Pinjam</label>
        <input  type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="" value="<?= $tgl_pinjam ?>">
    </div>
    <div class="form-group">
        <label for="tgl_kembali">Tanggal Kembali</label>
        <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly="" value="<?= $kembali ?>">
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
    </div>
	</form>
</div>