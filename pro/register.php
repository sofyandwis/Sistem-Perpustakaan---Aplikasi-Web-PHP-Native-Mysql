<?php 
require_once 'admin/config/Admin.php';

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nim = $_POST['nim'];
    $nama_anggota=$_POST['nama_anggota'];
    $tempat_lahir=$_POST['tempat_lahir'];
    $jk=$_POST['jk'];
    $prodi=$_POST['prodi'];
    $baru = new login();
    $baru=$baru->register($nim,$nama_anggota,$tempat_lahir,$jk,$prodi,$username,$password);

    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman Registrasi</title>
        <link href="admin/css/styles.css" rel="stylesheet" /> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Buat Akun</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="small mb-1" for="nama">NIM</label>
                                                <input class="form-control py-4" required="required" id="nim" name="nim" type="text" placeholder="Masukan NIM anda" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="nama_anggota">Nama Lengkap</label>
                                                <input class="form-control py-4" required="required" id="nama_anggota" name="nama_anggota" type="text" placeholder="Masukan anda lengkap anda" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="tempat_lahir">Tempat Lahir</label>
                                                <input class="form-control py-4" id="tempat_lahir" required="required" type="text" name="tempat_lahir" aria-describedby="emailHelp" placeholder="Masukan Tempat Kelahiran anda" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="jk">Jenis Kelamin</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="jk" value="L" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="jk" class="custom-control-input" value="P">
                                                        <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                                    </div>
                                            </div><div class="form-group">
                                                <label class="small mb-1" for="prodi">Prodi</label>
                                                <select name="prodi" id="prodi" class="form-control">
                                                    <option value="">-- Pilih Prodi --</option>
                                                    <option value="Manajemen">Manajemen</option>
                                                    <option value="Akuntansi">Akuntansi</option>
                                                    <option value="manajemen Perpajakan">Manajemen Perpajakan</option>
                                                    <option value="Management Informatika">Management Informatika</option>
                                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                                    <option value="Psikologi">Psikologi</option>
                                                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="username">Username</label>
                                                <input class="form-control py-4" id="username" type="text" required="required" name="username" placeholder="Masukan username anda" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="password">Password</label>
                                                        <input class="form-control py-4" id="password" required="required" name="password" type="password" placeholder="Masukan password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="password2">Konfirmasi Password</label>
                                                        <input class="form-control py-4" id="password2" required="required" name="password2" type="password" placeholder="Konfirmasi password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button type="submit" name="register" class="btn btn-primary btn-block">Buat Akun</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                        <div class="small"><a href="index.php">Back to Home</a></div>
                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
