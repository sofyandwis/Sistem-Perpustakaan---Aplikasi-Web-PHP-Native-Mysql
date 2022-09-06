<?php 
    include "Anggota.php";

    $cek = $_POST['cek'];
    $act = $_POST['act'];
    
    if($cek == 'anggota'){
        if($act == 'create'){
            $data = new Anggota();
            $data->create();
        }else if($act == 'update'){
            $data = new Anggota();
            $id_karyawan = $_POST['id_anggota'];
            $data->update($id_anggota);
        }
    }

?>