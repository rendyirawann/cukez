<?php 
error_reporting(1);
require "base/koneksi.php";

    // Jika tombol submit ditekan
    if (isset ($_POST["send"])) {
        
        // Cek berhasil atau tidak menambah data
        if (kirim_pesan ($_POST) > 0) {
            echo "
            <script>
                alert('Message Has Been Sent');
                document.location.href = 'index.php';
            </script>";
        }else {
            echo "
            <script>
                alert('Failed To Send Message');
                document.location.href = 'index.php';
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= TITLE ?> - Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= BASE_URL ?>assets/img/logo.png" rel="icon">
  <link href="<?= BASE_URL ?>assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= BASE_URL ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= BASE_URL ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander - v4.9.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html"><img src="<?= BASE_URL ?>assets/img/logo.png" alt="" class="img-fluid"></a><span>CUKEZ</span>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#features">Features</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a href="login.php"><button type="button" class="btn btn-primary">Login</button></a></li>
          <li><a href="signup.php"><button type="button" class="btn btn-primary">Signup</button></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>One Click With <span>CUKEZ</span></h1>
            <h2>Your Car Will Be Cleaned</h2>
            <div class="text-center text-lg-start">
              <a href="login.php" class="btn-get-started scrollto">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="<?= BASE_URL ?>assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
            <a href="https://www.youtube.com/watch?v=StpBR2W8G5A" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>Hayuk cuci mobil anda DI CUKEZ</h3>
            <p>Cukez adalah tempat reservasi atau booking untuk anda yang malas datang ke tempat pencucian mobil.</p>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon"><i class="ri-user-follow-line"></i></div>
              <h4 class="title"><a href="">Mudah diakses</a></h4>
              <p class="description">Anda dengan mudah melakukan reservasi untuk mencuci mobil anda.</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon"><i class="ri-chat-check-line"></i></div>
              <h4 class="title"><a href="">Fast Respon</a></h4>
              <p class="description">Cukez sangat cepat dalam merespon pengguna yang ingin melakukan reservasi.</p>
            </div>

            <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon"><i class="ri-lock-2-line""></i></div>
              <h4 class="title"><a href="">Aman Digunakan</a></h4>
              <p class="description">Cukez sangat mementingkan keamanan data para pengguna yang ingin reservasi.</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Features</h2>
          <p>Check The Features</p>
        </div>

        <div class="row" data-aos="fade-left">
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="450">
              <i class="ri-profile-fill" style="color: #0000FF;"></i>
              <h3><a href="#">Car Wash Profile</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
              <i class="ri-calendar-event-fill" style="color: #FFD700;"></i>
              <h3><a href="#">Penukaran Kupon Cuci Mobil</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="550">
              <i class="ri-instagram-fill" style="color: #FF00FF;"></i>
              <h3><a href="#">CUKEZ Instagram</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="600">
              <i class="ri-money-dollar-circle-line" style="color: #006400;"></i>
              <h3><a href="#">E-Transaction</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Counts Section ======= -->
    
    </section><!-- End Counts Section -->

    <!-- ======= Details Section ======= -->
    
    </section><!-- End Details Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Gallery</h2>
          <p>Check our Gallery</p>
        </div>

        <div class="row g-0" data-aos="fade-left">

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
              <a href="<?= BASE_URL ?>assets/img/gallery/gallery-1.jpg" class="gallery-lightbox">
                <img src="<?= BASE_URL ?>assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
              <a href="<?= BASE_URL ?>assets/img/gallery/gallery-2.jpg" class="gallery-lightbox">
                <img src="<?= BASE_URL ?>assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
              <a href="<?= BASE_URL ?>assets/img/gallery/gallery-3.jpg" class="gallery-lightbox">
                <img src="<?= BASE_URL ?>assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
              <a href="<?= BASE_URL ?>assets/img/gallery/gallery-4.jpg" class="gallery-lightbox">
                <img src="<?= BASE_URL ?>assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
              <a href="<?= BASE_URL ?>assets/img/gallery/gallery-5.jpg" class="gallery-lightbox">
                <img src="<?= BASE_URL ?>assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="350">
              <a href="<?= BASE_URL ?>assets/img/gallery/gallery-6.jpg" class="gallery-lightbox">
                <img src="<?= BASE_URL ?>assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Testimonials Section ======= -->
   
    </section><!-- End Testimonials Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Pricing</h2>
          <p>Check our Pricing</p>
        </div>

        <div class="row" data-aos="fade-left">

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <h3>Sedan</h3>
              <h4><sup>Rp</sup>50.000<span> / wash</span></h4>
              <ul>
                <li>Cuci murah</li>
                <li>Cepat</li>
                <li>Sangat bersih</li>
                <li class="na">Free Wifi</li>
                <li class="na">Tempat Yang Nyaman</li>
              </ul>
              <div class="btn-wrap">
                <!-- <a href="#" class="btn-buy">Buy Now</a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="zoom-in" data-aos-delay="200">
              <h3>SUV</h3>
              <h4><sup>Rp</sup>70.000<span> / Wash</span></h4>
              <ul>
                <li>Cuci Murah</li>
                <li>Cepat</li>
                <li>Dijamin Bersih</li>
                <li>Free Wifi</li>
                <li class="na">Tempat Yang Nyaman</li>
              </ul>
              <div class="btn-wrap">
                <!-- <a href="#" class="btn-buy">Buy Now</a> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <h3>Mini Bus</h3>
              <h4><sup>Rp</sup>65.000<span> / wash</span></h4>
              <ul>
                <li>Cuci Murah</li>
                <li>Cepat</li>
                <li>Pelayanan Baik</li>
                <li>Free Wifi</li>
                <li>Tempat Yang Nyaman</li>
              </ul>
              <div class="btn-wrap">
                <!-- <a href="#" class="btn-buy">Buy Now</a> -->
              </div>
            </div>
          </div>

          
        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Dimana letak alamat cuci mobilnya? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Alamatnya berada di jl.eka jati b,gedung johor,kec.medan johor,kota medan,sumatera utara 20144
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Apa itu Cukez? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                 Cukez adalah sebuah website untuk melakukan reservasi atau booking cuci mobil di sebuah tempat pencucian mobil.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Bagaimana cara untuk melakukan reservasi? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  harus daftar terlebih dahulu pada form login.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Tujuan dari Cukez? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Untuk dapat melakukan reservasi atau booking sehingga tidak perlu menunggu lama atau mengantri untuk dapat melakukan cuci mobil.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Kelebihan dari Cukez? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  -Dapat memudahkan pengguna dalam mencuci mobil <br>
                  -Akses yang cepat <br>
                  -Mudah digunakan <br>
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Jl. Eka Jati b, Gedung Johor, Kec. Medan Johor, Kota Medan, Sumatera Utara 20144</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>cukez-johor@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+628 236 666 99</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

            <!-- <form action="cek_contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea maxlength="254" class="form-control" id="message" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center"><button type="submit" name="send">Send Message</button></div>
            </form> -->
            <form action="contact/form-contact.php" method="POST">
            <div class="row inputBox">
              <div class="col-md-6 form-group">
              <input id="name" class="form-control" type="text" name="name" placeholder="Nama Lengkap" required>
              </div>
              <div class="col-md-6 form-group">
              <input id="email" class="form-control" type="email" name="email" placeholder="Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
            <input id="username" class="form-control" type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group mt-3">
            <input id="subject" class="form-control" type="text" name="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
            <textarea maxlength="254" type="text" name="message" id="message" class="form-control" placeholder="Enter Your Message" rows="4"></textarea>
            </div>
            <div class="text-center"><button class="btn btn-primary mt-2" name="send" type="submit">Send Message</button></div>
        </form> 

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>CUKEZ</h3>
              <p class="pb-3"><em>Cuci Mobil Berkelaz</em></p>
              <p>
              Jl. Eka Jati b, Gedung Johor, Kec. Medan Johor <br>
              Kota Medan, Sumatera Utara 20144<br><br>
                <strong>Phone:</strong> +628 236 666 99<br>
                <strong>Email:</strong> cukez-johor@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#feature">Features</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#gallery">Gallery</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#pricing">Pricing</a></li>
            </ul>
          </div>

          <!-- <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div> -->

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>CUKEZ. 2022</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        Designed by <a href="#">Kelompok 1 ICT</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= BASE_URL ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/aos/aos.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= BASE_URL ?>assets/js/main.js"></script>

</body>

</html>