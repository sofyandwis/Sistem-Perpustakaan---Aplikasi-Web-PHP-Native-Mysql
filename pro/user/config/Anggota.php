<?php 

    include "../database/Database.php";

    class Anggota extends Database{

        public function read()
        {
            $data = mysqli_query($this->connect, "SELECT * FROM tb_anggota ORDER BY nama_anggota ASC");
            return $data;
        }
    }

    class Buku extends Database{

        public function create()
        {
            $id_buku = $_POST['id_buku'];
            $judul_buku =$_POST['judul_buku'];
            $pengarang_buku = $_POST['pengarang_buku'];
            $penerbit_buku= $_POST['penerbit_buku'];
            $tahun_terbit = $_POST['tahun_terbit'];
            $isbn =$_POST['isbn'];
            $jumlah_buku =$_POST['jumlah_buku'];
            
            mysqli_query($this->connect, "INSERT INTO tb_buku VALUES ('','$judul_buku', '$pengarang_buku', '$penerbit_buku', '$tahun_terbit', '$isbn', '$jumlah_buku')");

            header("location: ../view/index.php");
        }

        public function read()
        { 
            $data = mysqli_query($this->connect, "SELECT * FROM tb_buku");
            return $data;
        }
    
        public function transaksi($judul)
        {
            $data2 = mysqli_query($this->connect, "SELECT * FROM tb_buku WHERE judul_buku = '$judul'");
            return $data2;
        }
        public function transaksi2($id,$nim,$tgl_pinjam,$tgl_kembali,$sisa)
        {
            mysqli_query($this->connect,"INSERT INTO tb_transaksi VALUES(null, '$id', '$nim', '$nim', '$tgl_pinjam', '$tgl_kembali', 'pinjam')");
            mysqli_query($this->connect,"UPDATE tb_buku SET jumlah_buku = ".($sisa - 1)." WHERE id_buku = '$id' ");
            
        } public function kembali($id,$sisa,$id_buku)
        {
            mysqli_query($this->connect,"UPDATE tb_transaksi SET status='kembali' where id_transaksi='$id'" );
            mysqli_query($this->connect,"UPDATE tb_buku SET jumlah_buku = ".($sisa + 1)." WHERE id_buku = '$id_buku' ");
            
        }

    }

?>