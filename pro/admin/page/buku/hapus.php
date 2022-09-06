<?php 
// menangkap id_buku di url
$data = new Buku();
$id_buku = $_GET['id_buku'];
$data->delete($id_buku);


// echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=buku';</script>";

?>