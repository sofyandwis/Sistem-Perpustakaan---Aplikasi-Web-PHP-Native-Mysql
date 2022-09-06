<?php 
$id= $_GET['id_transaksi'];
$judul = $_GET['judul'];
$data = new Buku();
foreach($data->transaksi($judul) as $key) :

	$sisa = $key['jumlah_buku'];
	$id_buku= $key['id_buku'];
	
	if($sisa == 0) {
		echo "<script>alert('Stok Buku Habis, Transaksi, tidak dapat dilakukan, silahkan tambahkan stok buku dulu.');window.location='?p=transaksi&aksi=tambah';</script>";
	} else {
		$data= $data->kembali($id,$sisa,$id_buku);
		echo "<script>alert('Data transaksi berhasil ditambahkan.');window.location='?p=transaksi';</script>";
	}
endforeach;

?>