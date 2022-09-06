<?php 

$data = new Anggota();
$id_anggota = $_GET['id_anggota'];
$data->delete($id_anggota);


?>