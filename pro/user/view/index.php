<?php
    // error_reporting(0);
    // untuk menhilangakan pemberitahuan warning
    
 
session_start();

if(!isset($_SESSION['user'])) {
      echo "<script>
      alert('silahkan log in dahulu');
      </script>";
      

    header("Location: ../../login.php");
    exit;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perpustkaan-Usser</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="../assets/img/profile.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.php">Perpustakaan-User<br><?= $_SESSION['user']['nama']; ?></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#anggota" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Anggota</span></a></li>
          <li><a href="#daftar" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Daftar Buku</span></a></li>
          <li><a href="#peminjaman" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Peminjaman</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="logout.php" class="nav-link scrollto"><i class="bi bi-box-arrow-left"></i><span>Log Out</span></a></li>
          </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Perpustakaan</h1>
      <p>Buku itu <span class="typed" data-typed-items="Jendela Dunia, Sumber Ilmu, Sumber Sejarah, Penting"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="anggota" class="anggota">
      <div class="container">
        

        <div class="section-title">
          <h2>Data Anggota</h2>
          </div>
         <div class="row">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr> 
                        <th>No</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                   include "../config/Anggota.php";
                   $nomor = 1;
                   $data = new Anggota(); 
                    
                    ?>
                    <?php foreach($data->read() as $key) : ?> 
            
                    <tr>
                        <td><?= $nomor++; ?></td>
                        <td><?= $key['nama_anggota']; ?></td>
                        <td><?= $key['prodi']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
          
          
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="daftar" class="daftar">
      <div class="container">

        <div class="section-title">
          <h2>Daftar Buku</h2>
        </div>
        
        <div class="table-responsive">  
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Lokasi Buku</th>
                <th>ISBN</th>
                <th>Jumlah Buku</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                $nomor = 1;
                $data = new Buku(); 
                
                ?>
                <?php foreach($data->read() as $key) : ?> 
        
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td><?= $key['judul_buku']; ?></td>
                    <td><?= $key['pengarang_buku']; ?></td>
                    <td><?= $key['penerbit_buku']; ?></td>
                    <td><?= $key['lokasi']; ?></td>
                    <td><?= $key['isbn']; ?></td>
                    <td><?= $key['jumlah_buku']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section><!-- End Facts Section -->

    <!-- ======= Skills Section ======= -->
    <section id="peminjaman" class="peminjaman">
      <div class="container">

        <div class="section-title">
          <h2>Peminjaman</h2>
        </div>
        <?php include "tambah.php" ?>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Membaca</h2>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <!-- <h3 class="resume-title">Sumary</h3> -->
            <div class="resume-item">
              <h4>Voltaire</h4>
              <p><em>
              "Makin aku banyak membaca, makin aku banyak berpikir; makin aku banyak belajar, makin aku sadar bahwa aku tak mengetahui apa pun."
              </em></p>
            </div>
            <div class="resume-item">
              <h4>Wiji Thukul</h4>
              <p><em>"Kamu calon konglomerat ya? kamu harus rajin belajar dan membaca, tapi jangan ditelan sendiri. Berbagilah dengan teman-teman yang tak dapat pendidikan."</em></p>
            </div>
            <div class="resume-item">
              <h4>Elon Musk</h4>
              <p><em>"Saya membaca buku dan berbicara dengan orang lain. Maksud saya, itulah cara seseorang belajar sesuatu. Ada banyak buku bagus di luar sana dan ada banyak orang pintar."</em></p>
            </div>
            <div class="resume-item">
              <h4>Bertrand Russell</h4>
              <p><em>"Ada dua motif untuk membaca buku. Pertama, kau menikmatinya dan yang lain, kau bisa menyombongkannya."</em></p>
            </div>
            <div class="resume-item">
              <h4>Haruki Murakami</h4>
              <p><em>"Kalau engkau hanya membaca buku yang dibaca semua orang, engkau hanya bisa berpikir sama seperti semua orang."</em></p>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="resume-item">
              <h4>Felix Siauw</h4>
              <p><em>"Ilmu itu ada di mana-mana, pengetahuan di mana-mana tersebar, kalau kita bersedia membaca, dan bersedia mendengar."</em></p>
            </div><div class="resume-item">
              <h4>Stephen King</h4>
              <p><em>"Kalau engkau ingin menjadi penulis, ada dua hal yang harus kau lakukan, banyak membaca dan menulis. Setahuku, tidak ada jalan lain selain dua hal ini. Dan tidak ada jalan pintas."</em></p>
            </div><div class="resume-item">
              <h4> Dr. Seuss</h4>
              <p><em>"Lebih banyak Anda membaca, lebih banyak hal yang Anda ketahui. Lebih banyak hal yang Anda pelajari, lebih banyak tempat yang Anda kunjungi."</em></p>
            </div><div class="resume-item">
              <h4>Joseph Addison</h4>
              <p><em> "Membaca adalah alat paling dasar untuk meraih hidup yang baik."</em></p>
            </div><div class="resume-item">
              <h4>Elbert Hubbard</h4>
              <p><em>"Saya tidak membaca buku, saya mengobrol dengan si pengarangnya."</em></p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
       </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
            <div class="icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="title"><a href="">Nyaman</a></h4>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-wind"></i></div>
            <h4 class="title"><a href="">Tenang</a></h4>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-shield-check"></i></div>
            <h4 class="title"><a href="">Aman</a></h4>
           </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Testimonials</h2>
          </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Betapa Sabari menyayangi Zorro. Ingin dia memeluknya sepanjang waktu. Dia terpesona melihat makhluk kecil yang sangat indah dan seluruh kebaikan yang terpancar darinya. Diciuminya anak itu dari kepala sampai ke jari-jemari kakinya yang mungil. Kalau malam Sabari susah susah tidur lantaran membayangkan bermacam rencana yang akan dia lalui dengan anaknya jika besar nanti. Dia ingin mengajaknya melihat pawai 17 Agustus, mengunjungi pasar malam,  membelikannya mainan, menggandengnya ke masjid,  mengajarinya berpuasa dan mengaji, dan memboncengnya naik sepeda saban sore ke taman kota.<i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Ayah</h3>
                <h4>Andrea Hirata</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Kulihat kamu masuk ke dalam cafe kemudian memesan segelas cappuccino. Di sebelah kasir ada rak berisi buku-buku. Kamu mengarnbil satu novel berjudul Mr & Mrs Write:

                  "Apakah novel ini bagus?“

                  Kasir mengangguk dengan antusias.

                  "Bercerita tentang apa?”

                  Kasir melirikku lalu tersenyum. Aku ingin membalas senyumannya tapi tak bisa.

                "Kisah yang ada disekitar hidupmu.Tentang mencapai cita.Tentang menjadi istri.Awa| pernikahan yang membuatmu jungkir balik hingga tangis malaikat kecil yang menjaringmu di tengah malam. Kisah Ara yang memperjuangkan mimpinya.Kisah Ragil, sang tukang kayu yang menjadi penulis kernudian merampas semua impian Ara." <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Mr & Mrs Writer</h3>
                <h4>	Achi T. M.</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="200">
                <p>Ikal yang merupakan anak cerdas dan sering mendapatkan ranking di sekolahnya, tak ayal mendapatkan perlakuan istimewa dari guru maupun kepala sekolah. Jika melanggar tata tertib, Ikal akan dihukum.

                  Seperti pada saat ketiga pemeran utama ketahuan membuat ulah, maka Pak Mastar sebagai kepala sekolah menghukum langsung ketiga anak itu. Jimbron mendapatkan hukuman membersihkan WC, Ikal membersihkan lantai, sedangkan Arai membersihkan langit-langit ruangan.

                  Menggambarkan kehidupan para buruh yang bertempat tinggal di dekat tambang minyak.Apalagi Arai yang memiliki semangat juang tinggi, tidak pernah mengeluh akan nasibnya. Sementara Ikal sebagai sahabat sekaligus saudara Arai, sangat merasa miris. Mereka juga sering mengumpulkan mainan-mainan bekas untuk dijual ke pengepul. Jimbron yang mempunyai mimpi bisa naik kuda putih, akhirnya mimpi itu terwujud.
                </p>
                <img src="../assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Sang Pemimpi</h3>
                <h4>Andrea Hirata</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="300">
                <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  “Prie GS yang saya kenal adalah pribadi sederhana. Tulisannya sederhana. Tetapi… dalam!”
                  -Andrie Wongso, Motivator No. 1 Indonesia

                  “Novel ini mengajari kita seni negosiasi dan memenanginya. Negosiasi ala Ipung mengingatkan saya pada tokoh Toyotomi Hideyoshi dalam Taiko dan Don Corleone dalam The Godfather yang legendaris itu.”
                  -Ustadz Anif Sirsaeba, Ustadz Motivator

                  “Tidak saja seorang penulis, seniman, dan budayawan, Prie GS di mata saya adalah juga ‘kiai’.”
                  -Irwan Hidayat, Presdir PT Sido Muncul

                  “Dengan gaya bahasa yang lugas dan down to earth, Prie GS mampu mengingatkan kita pada fenomena yang sering kita abaikan.”
                  -Harjanto Halim, Presdir PT Marimas
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Hidup Itu Keras Maka Gebuklah</h3>
                <h4>Prie GS, Lord Ahmad, Gadis Ania</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="400">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Nyaris tidak ada web programmer yang tidak mengenal PHP. PHP mungkin lebih populer daripada HTML. Selama mengelola duniailkom, cukup banyak pertanyaan yang diajukan berkaitan dengan PHP.
                  Ingin memproses isian form HTML?
                  Menampilkan pesan error jika salah isi form?
                  Menyimpan data ke database MySQL?
                  Membuat sistem login?
                  Memecah halaman web menjadi beberapa bagian, kemudian disatukan lagi?
                  Upload file ke server?
                  Semuanya butuh PHP.

                  Jika saat ini anda sedang sekolah / kuliah dan belajar tentang web programming, hampir dipastikan PHP-lah yang akan dipelajari. Mayoritas skripsi IT di bidang web programming juga butuh PHP. Hal ini juga menunjukkan bahwa PHP menjadi salah satu bahasa pemrograman yang wajib dikuasai.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>PHP</h3>
                <h4>John Smite</h4>
              </div>
            </div><!-- End testimonial item -->

    <!-- ======= Log Out Section ======= -->
    <section id="logout" class="logout">
      <div class="container">
          <?php 
          // include"logout.php"
          ?>
      </div>   
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>iPortfolio</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/typed.js/typed.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>