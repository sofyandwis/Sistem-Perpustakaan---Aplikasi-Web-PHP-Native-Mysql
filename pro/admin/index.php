<?php
    // error_reporting(0);
    // untuk menhilangakan pemberitahuan warning
?>
<?php 
session_start();
require_once 'config/Admin.php';

if(!isset($_SESSION['login'])) {
    header("Location: ../user/view/index.php");
    exit;
}

$page = @$_GET['p'];
$aksi = @$_GET['aksi'];

?>
<!-- <pre>
<?php var_dump($_SESSION['login']);  ?>
</pre> -->
<!DOCTYPE html>
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<html lang="en">
    <head> 
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
            <?php
            if($page == 'buku') {
                if($aksi == 'tambah') {
                    echo "Tambah Buku";
                } else if($aksi == 'ubah') {
                    echo "Ubah Buku";
                } else {
                    echo "Halaman Buku";
                }
                
            } else if($page == 'anggota') {
                if($aksi == 'tambah') {
                    echo "Tambah Anggota";
                } else if($aksi == 'ubah') {
                    echo "Ubah Anggota";
                } else {
                    echo "Halaman Anggota";
                }
            }
            else if($page == 'transaksi') {
               if($aksi == 'tambah') {
                   echo "Tambah Transaksi";
               } else {
                   echo "Halaman Transaksi";
               }
            }
           else if($page == 'histori') {
                  echo "Halaman Histori";
              
            }
            if(isset($page)) { 
                if($_GET['p'] == 'buku') {
                    echo "Halaman Buku";
                } else if($_GET['p'] == 'anggota') {
                    echo "Halaman Anggota";
                } else if($_GET['p'] == 'transaksi') {
                    echo "Halaman Transaksi";
                } else if($_GET['p'] == 'histori') {
                    echo "Halaman Histori";
                }
            } else {
                echo "Dashboard";
            }
            ?>
        </title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/fontawesomeall.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Perpustakaan</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="?p=anggota">
                                <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                                Data Anggota
                            </a>
                            <a class="nav-link" href="?p=buku">
                                <div class="sb-nav-link-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                                Data Buku
                            </a>
                            <a class="nav-link" href="?p=transaksi">
                                <div class="sb-nav-link-icon"><i class="fa fa-handshake" aria-hidden="true"></i></div>
                                Transaksi
                            </a>
                            <a class="nav-link" href="?p=histori">
                                <div class="sb-nav-link-icon"><i class="bi bi-clock-history"></i></div>
                                Histori
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Perpustakaan
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <marquee behavior="scroll" class="btn btn-dark">Selamat Datang di Aplikasi Perpustakaan Sederhana</marquee>
                    <div class="container-fluid">
                    <?php 

                    if($page == 'buku') {
                        if($aksi == '') {
                            require_once 'page/buku/buku.php';
                        } else if($aksi == 'tambah') {
                            require_once 'page/buku/tambah.php';
                        } else if($aksi == 'ubah') {
                            require_once 'page/buku/ubah.php';
                        } else if($aksi == 'hapus') {
                            require_once 'page/buku/hapus.php';
                        }
                    } else if($page == 'anggota') {
                        if($aksi == '') {
                            require_once 'page/anggota/anggota.php';
                        } else if($aksi == 'tambah') {
                            require_once 'page/anggota/tambah.php';
                        } else if($aksi == 'ubah') {
                            require_once 'page/anggota/ubah.php';
                        } else if($aksi == 'hapus') {
                            require_once 'page/anggota/hapus.php';
                        }
                    } else if($page == 'transaksi') {
                        if($aksi == '') {
                            require_once 'page/transaksi/transaksi.php';
                        } else if($aksi == 'tambah') {
                            require_once 'page/transaksi/tambah.php';
                        } else if($aksi == 'kembali') {
                            require_once 'page/transaksi/kembali.php';
                        }
                    } else if($page == 'histori') {
                        if($aksi == '') {
                            require_once 'page/transaksi/histori.php';
                        }
                    } else { ?>
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">dashboard</li>
                        </ol>
                    <?php
                    }
                    ?>
                        
                    </div>
                </main>
                <center>
                    <h1>Selamat Datang</h1>
                </center>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
