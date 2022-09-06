<?php 

    include "Database.php";

    class Anggota extends Database{

        public function create()
        {
            $nim =$_POST['nim'];
            $nama_anggota = $_POST['nama_anggota'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $jk =$_POST['jk'];
            $prodi =$_POST['prodi'];

            if(empty($nim && $nama && $tempat_lahir && $tgl_lahir && $jk && $prodi)) {
                    echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=buku';</script>";
            }

            $sql=mysqli_query($this->connect, "INSERT INTO tb_anggota VALUES ('','$nim', '$nama_anggota', '$tempat_lahir', '$jk', '$prodi')");

            if($sql) 
            {
                echo "<script>alert('Data Berhasil Ditambahkan.');window.location='?p=anggota';</script>";
            } else {
                echo "<script>alert('Data Gagal Ditambahkan.')</script>";
            }
            
            
            header("location: ../index.php?p=anggota");
        }

        public function read()
        {
            $data = mysqli_query($this->connect, "SELECT * FROM tb_anggota ORDER BY nama_anggota DESC");
            return $data;
        }

        public function update($id_anggota)
        {   
            $nim =$_POST['nim'];
            $nama_anggota =$_POST['nama_anggota'];
            $tempat_lahir =$_POST['tempat_lahir'];
            $jk = $_POST['jk'];
            $prodi = $_POST['prodi'];
        
            if(empty($nim && $nama_anggota && $tempat_lahir && $jk && $prodi)) 
            {
                echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=buku';</script>";
            }
            $data=mysqli_query($this->connect, "UPDATE tb_anggota SET nim = '$nim' ,nama_anggota = '$nama_anggota', tempat_lahir = '$tempat_lahir', jk ='$jk', prodi = '$prodi' WHERE id_anggota = $id_anggota");
            

            if($data) 
            {
                echo "<script>alert('Data Berhasil DiUpdate.');window.location='?p=anggota';</script>";
                header("location: ../index.php?p=anggota");
            } else {
                echo "<script>alert('Data Gagal Ditambahkan.')</script>";
            }
        }

        public function delete($id_anggota)
        {
            mysqli_query($this->connect, "DELETE FROM tb_anggota WHERE id_anggota = $id_anggota");
            header("location: index.php");
        }

        public function show($id_anggota)
        {
            $data2 = mysqli_query($this->connect, "SELECT * FROM tb_anggota WHERE id_anggota = $id_anggota");
            return $data2;
        }
    }

    class Buku extends Database{

        public function create()
        {
            // $id_buku = $_POST['id_buku'];
            $judul_buku =$_POST['judul_buku'];
            $pengarang_buku = $_POST['pengarang_buku'];
            $penerbit_buku= $_POST['penerbit_buku'];
            $tahun_terbit = $_POST['tahun_terbit'];
            $isbn =$_POST['isbn'];
            $jumlah_buku =$_POST['jumlah_buku'];
            $lokasi =$_POST['lokasi'];
            $tgl_input=$_POST['tgl_input'];

            mysqli_query($this->connect, "INSERT INTO tb_buku VALUES ('','$judul_buku', '$pengarang_buku', '$penerbit_buku', '$tahun_terbit', '$isbn', '$jumlah_buku','$lokasi','$tgl_input')");
            
            header("location: ../index.php?p=buku");
        }

        public function read()
        { 
            $data = mysqli_query($this->connect, "SELECT * FROM tb_buku");
            return $data;
        }

        public function update($id_buku)
        {
            
            $judul =$_POST['judul_buku'];
            $pengarang =$_POST['pengarang_buku'];
            $penerbit =$_POST['penerbit_buku'];
            $tahun_terbit =$_POST['tahun_terbit'];
            $isbn =$_POST['isbn'];
            $jumlah =$_POST['jumlah_buku'];
            $lokasi =$_POST['lokasi'];
            $tgl_input =$_POST['tgl_input'];

            $data=mysqli_query($this->connect, "UPDATE tb_buku SET judul_buku = '$judul', pengarang_buku = '$pengarang', penerbit_buku = '$penerbit', tahun_terbit = '$tahun_terbit', isbn = '$isbn', jumlah_buku = '$jumlah', lokasi = '$lokasi', tgl_input = '$tgl_input' WHERE id_buku = $id_buku");
           
            header("location: ../index.php?p=buku");
        }

        public function delete($id_buku)
        {
            mysqli_query($this->connect, "DELETE FROM tb_buku WHERE id_buku = $id_buku");
            header("location: ../index.php?p=buku");
        }

        public function show($id_buku)
        {
            $data2 = mysqli_query($this->connect, "SELECT * FROM tb_buku WHERE id_buku = $id_buku");
            return $data2;
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
    class Transaksi extends Database
    {
        public function read()
        { 
            $data = mysqli_query($this->connect, "SELECT * FROM tb_transaksi INNER JOIN tb_buku ON tb_transaksi.id_buku = tb_buku.id_buku INNER JOIN tb_anggota ON tb_transaksi.id_anggota = tb_anggota.id_anggota WHERE status = 'pinjam' ORDER BY id_transaksi DESC");
            return $data;
        }

        public function tampilHistori()
        {
            $data = mysqli_query($this->connect, "SELECT * FROM tb_transaksi INNER JOIN tb_buku ON tb_transaksi.id_buku = tb_buku.id_buku INNER JOIN tb_anggota ON tb_transaksi.id_anggota = tb_anggota.id_anggota WHERE status = 'kembali' ORDER BY id_transaksi DESC");
            return $data;
        }

    


}

    class login extends Database{
        function cek_login($username,$password){
            
            $data = mysqli_query($this->connect,"SELECT * FROM tb_admin WHERE username = '$username'") ;
            $data2 = mysqli_query($this->connect,"SELECT * FROM tb_user WHERE username = '$username'") ;

                
            if(mysqli_num_rows($data) == 1) {
                
                    $row = mysqli_fetch_assoc($data);

                    if(password_verify($password, $row['password'])) {
                        // pasang session
                         $_SESSION['login'] = $row;
                             header("Location: admin/index.php");
                    }
                    else
                    {
                        echo "<script> alert('salah password1');
                        </script>";
                    }
            }
            else
            {
               
                if(mysqli_num_rows($data2) == 1) 
                {
                
                    $row2 = mysqli_fetch_assoc($data2);

                    if(password_verify($password,$row2['password']))
                    {
                        // pasang session
                        $_SESSION['user'] = $row2;
                        $_SESSION['username'] = $row2;
                         
                        // password_verify
                             header("Location: user/view/index.php");
                        //  exit;
                    }
                    else
                    {
                        echo "<script> alert('salah password2');
                        </script>";
                    }
                }    
          
            }
        }

        public function cekUser($username)
        {
            mysqli_query($this->connect,"SELECT username FROM tb_user WHERE username='$username'");
        }
        
        function register($nim,$nama_anggota,$tempat_lahir,$jk,$prodi,$username,$password)
        {
            
            $password = password_hash($password, PASSWORD_DEFAULT);

            $anggota= mysqli_query($this->connect,"INSERT INTO tb_anggota values ('','$nim','$nama_anggota','$tempat_lahir','$jk','$prodi')");
            $data = mysqli_query($this->connect,"INSERT INTO  tb_user values('','$username','$password','$nama_anggota')") ;
            
            echo "<script>alert('Akun Berhasil Dibuat, silahkan login.');window.location='login.php';</script>";  
        }
    }



?>