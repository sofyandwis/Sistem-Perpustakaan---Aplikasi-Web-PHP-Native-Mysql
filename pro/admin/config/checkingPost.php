<?php 
    include "Admin.php";

    $cek = $_POST['cek'];
    $act = $_POST['act'];
    
    if($cek == 'anggota'){
        if($act == 'create'){
            $data = new Anggota();
            $data->create();
        }else if($act == 'update'){
            $data = new Anggota();
            $id_anggota = $_POST['id_anggota'];
            $data->update($id_anggota);
        } 
    }
    if($cek == 'buku'){
        if($act == 'create'){
            $data = new Buku();
            $data->create();
        }else if($act == 'update'){
            $data = new Buku();
            $id_buku = $_POST['id_buku'];
            $data->update($id_buku);
        } 
    }

?>