<?php 
    include "Anggota.php";

    $cek = $_GET['cek'];
    $act = $_GET['act'];
    
    if($cek == 'anggota'){
        if($act == 'delete'){
            $data = new Anggota();
            $id_karyawan = $_GET['id_anggota'];
            $data->delete($id_anggota);
        }else if($act == 'edit'){
            $id_anggota = $_GET['id_anggota'];
            // var_dump($id_anggota, $act, $cek);
            header("location: ../view/edit.php?id_anggota=".$id_anggota);
        }
    }

?>