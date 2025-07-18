<?php
 include "admin/koneksi.php";

// Pastikan koneksi berhasil
if (!$koneksi) {
  die("Koneksi database gagal: " . mysqli_connect_error());
}

// Query untuk mendapatkan data dari dua tabel
$query = "
  SELECT * FROM galeri;
  SELECT * FROM artikel;
";

// Eksekusi query menggunakan multi_query
if (mysqli_multi_query($koneksi, $query)) {
    // Ambil hasil query pertama (tabel galeri)
    $resultGaleri = mysqli_store_result($koneksi);

    // Ambil data galeri
    $galeriData = [];
    if ($resultGaleri) {
        while ($row = mysqli_fetch_assoc($resultGaleri)) {
            $galeriData[] = $row;
        }
        mysqli_free_result($resultGaleri);
    }

    // Pindah ke hasil query berikutnya (tabel artikel)
    mysqli_next_result($koneksi);
    $resultArtikel = mysqli_store_result($koneksi);

    // Ambil data artikel
    $artikelData = [];
    if ($resultArtikel) {
        while ($row = mysqli_fetch_assoc($resultArtikel)) {
            $artikelData[] = $row;
        }
        mysqli_free_result($resultArtikel);
    }
} else {
    echo "Query error: " . mysqli_error($koneksi);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Berita Teknologi</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
  .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	left:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <a href="https://api.whatsapp.com/send?phone=628979544811&text=" class="float" target="_blank">
  <i class="fa fa-whatsapp my-float"></i>
  </a>
  		<link href="pagination.css" rel="stylesheet" type="text/css" />
		<link href="B_red.css" rel="stylesheet" type="text/css" />
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/alva2.png" alt="">
        <h1 class="sitename">ALVA</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#mission">Vision & Mision</a></li>
          <li><a href="#product">Products</a></li>
          <li><a href="#services">Artikel</a></li>
          <li><a href="#galeri">Galeri</a></li>
          <li><a href="#testimonials">Partnership</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> -->
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.html#about">Get Started</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
            <h1>Leading the Future of Electric Vehicles in Indonesia</h1>
            <p>ALVA is a lifestyle mobility solution propelling Indonesia forward into a cleaner, smarter future.</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/motor1.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>About Us<br></span>
        <h2>About Us</h2>
        <p class="">Ilectra Motor Group (IMG) is an electric mobility
            solution company with aspiration to become a
            leading electric two wheelers champion and prime
            mover of the local green mobility ecosystem.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/rider.png" class="img-fluid" alt="">
            <!-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a> -->
          </div>
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
            <!-- <h3>Kenapa harus pilih kami?</h3> -->
            <p> ALVA is total mobility solution from IMG, part of Indika Energy, Alpha JWC Ventures, and Horizons Ventures’ venture into the electric vehicles sector.</p>
            <p> itself was founded to facilitate the partnership and build not only a two-wheeler brand, but also its supporting ecosystem, which is very much still nascent, including EV Infrastructure for which further collaborations to be built with a partnership network.</p>
            <p>  IMG will come with sophisticated electric two-wheelers design and top-of-the line performance, completed with great customer experience, backed by supporting technology and mobility ecosystem.</p>
            </p>
          </div>
        </div>
      </div>

    </section><!-- /About Section -->

  <section id="mission" class="section light-background" style="padding: 60px 0;">
    <div class="container text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold">Our Vision</h2>
      <p class="text-muted">To Become Electric Mobility Champion and Reshape Sustainability.</p>
    </div>

    <div class="container text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold">Our Mission</h2>
      <p class="text-muted">To Provide Better Solutions for People by Delivering New Mobility Lifestyle in a Sustainable Way</p>
    </div>

    <div class="container">
      <div class="row gy-4">

        <!-- Item 1 -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="p-4 bg-white shadow-sm rounded border h-100">
            <div class="mb-3 text-success">
              <i class="bi bi-people-fill" style="font-size: 1.5rem;"></i>
            </div>
            <h5 class="fw-bold">People are First and Foremost</h5>
            <p class="mb-0 text-muted">We focus on our customers and strive to inspire green lifestyle for our stakeholders, delivered by outstanding people who believe in our cause.</p>
          </div>
        </div>

        <!-- Item 2 -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="p-4 bg-white shadow-sm rounded border h-100">
            <div class="mb-3 text-success">
              <i class="bi bi-lightbulb-fill" style="font-size: 1.5rem;"></i>
            </div>
            <h5 class="fw-bold">Rules Were Never Set in Stone</h5>
            <p class="mb-0 text-muted">We are a game changer. We go beyond the ordinary. We lead the trend by riding the wave of CHANGE.</p>
          </div>
        </div>

        <!-- Item 3 -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
          <div class="p-4 bg-white shadow-sm rounded border h-100">
            <div class="mb-3 text-success">
              <i class="bi bi-cpu-fill" style="font-size: 1.5rem;"></i>
            </div>
            <h5 class="fw-bold">Technology is Inseparable When Formulating Solutions</h5>
            <p class="mb-0 text-muted">We always look forward and harness new technologies to offer the best experience for all.</p>
          </div>
        </div>

        <!-- Item 4 -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
          <div class="p-4 bg-white shadow-sm rounded border h-100">
            <div class="mb-3 text-success">
              <i class="bi bi-arrow-repeat" style="font-size: 1.5rem;"></i>
            </div>
            <h5 class="fw-bold">Never Satisfied, Always Moving, Always Evolving</h5>
            <p class="mb-0 text-muted">We believe in continuous improvements and breakthroughs.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

        <!-- Portfolio Section -->
    <section id="product" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>ALVA Motorcycle</span>
        <h2>ALVA Motorcycle</h2>
        <p>MEET YOUR MATCH!</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="assets/img/motor1.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>CERVO Q</h4>
                <p>Get yours for Rp 49.500.000* (OTR Jabodetabek)</p>
                <a href="assets/img/motor1.png" title="CERVO Q" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="assets/img/motor2.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>ONE XP</h4>
                <p>Available Starts From Rp 38.500.000* (OTR Jabodetabek)</p>
                <a href="assets/img/motor2.png" title="ONE XP" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="assets/img/motor3.png" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>CERVO X</h4>
                <p>Get yours for Rp 44.900.000* (OTR Jabodetabek)</p>
                <a href="assets/img/motor3.png" title="CERVO X" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->
          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->


    <!-- Services Section -->
    <section id="services" class="services section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Article</span>
        <h2>Article</h2>
        <p>Get to know about every update on ALVA, news, partnership, everything</p>
      </div><!-- End Section Title -->
      <div class="container">
        <div class="row gy-4">
          <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
            <?php if (count($artikelData) > 0): ?>
              <?php foreach ($artikelData as $artikel): ?>
                <div class="col-lg-4 col-md-6">
                  <div class="service-item position-relative">
                    <div class="image">
                      <img src="admin/artikel/<?= $artikel['gambar']; ?>" alt="Gambar Artikel" class="img-fluid">
                    </div>
                    <a href="artikel.php?id=<?= $artikel['id']; ?>" class="stretched-link">
                      <h3><?= $artikel['judul']; ?></h3>
                    </a>
                    <small>
                      <em>Ditulis oleh <?= $artikel['penulis']; ?> pada <?= date("d M Y", strtotime($artikel['tanggalwaktu'])); ?></em>
                    </small>
                    <p>
                      <?= substr($artikel['isi'], 0, 100); ?>...
                    </p>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p>Artikel tidak ditemukan.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section><!-- /Services Section -->

    <!-- Portfolio Section -->
    <section id="galeri" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Galeri</span>
        <h2>Galeri</h2>
        <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <?php if (count($galeriData) > 0): ?>
              <?php $counter = 1; // Mulai penghitung dari 1 ?>
              <?php foreach ($galeriData as $galeri): ?>
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                  <img src="admin/artikel/<?= $galeri['foto']; ?>" class="img-fluid" alt="Foto Galeri">
                  <div class="portfolio-info">
                    <h4>Foto <?= $counter; ?></h4>
                    <a href="admin/artikel/<?= $galeri['foto']; ?>" title="Lihat Foto" data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                      <i class="bi bi-zoom-in"></i>
                    </a>
                  </div>
                </div>
                <?php $counter++; // Tambahkan penghitung ?>
              <?php endforeach; ?>
            <?php else: ?>
              <p>Galeri tidak ditemukan.</p>
            <?php endif; ?>
          </div>


          <!-- End Portfolio Container -->
        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Partnerships & Affiliations</span>
        <h2>Partnerships & Affiliations</h2>
        <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/kopikenangan.png" alt="Kopi Kenangan" class="img-fluid" style="height: 100px; max-width: 150px; object-fit: contain; margin: auto; display: block;">
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/pizzahut.png" alt="Pizza Hut" class="img-fluid" style="height: 100px; max-width: 150px; object-fit: contain; margin: auto; display: block;">
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/wir.png" alt="WIR Group" class="img-fluid" style="height: 100px; max-width: 150px; object-fit: contain; margin: auto; display: block;">
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/oto.png" alt="Otoklik" class="img-fluid" style="height: 100px; max-width: 150px; object-fit: contain; margin: auto; display: block;">
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/ecocare.png" alt="EcoCare" class="img-fluid" style="height: 100px; max-width: 150px; object-fit: contain; margin: auto; display: block;">
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Call To Action Section -->
    <!-- <section id="call-to-action" class="call-to-action section accent-background">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Call To Action</h3>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a class="cta-btn" href="#">Call To Action</a>
            </div>
          </div>
        </div>
      </div>

    </section> -->
    <!-- /Call To Action Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Contact Us</span>
        <h2>Contact Us</h2>
        <p>24/7 Alva Contact Center (24 Hours)</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>PT. Electra Distribusi Indonesia (EDI)</p>
                  <p>Bintaro Office Park, Building A Floor 5th Jl. Boulevard Bintaro Jaya Blok B7/A6, South Tangerang 15424, Indonesia</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+628881112708</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>customercare@alvaauto.com</p>
                </div>
              </div><!-- End Info Item -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.6817513526507!2d106.71774307475098!3d-6.275331993713452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fa9d021c5b41%3A0x971c3c0026ab4392!2sINDY%20Bintaro%20Office%20Park!5e1!3m2!1sid!2sid!4v1752832246743!5m2!1sid!2sid"frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">

    <!-- <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div> -->

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">ALVA</span>
          </a>
          <div class="footer-contact pt-3">
            <p>PT. Electra Distribusi Indonesia (EDI)</p>
            <p>Bintaro Office Park, Building A Floor 5th Jl. Boulevard Bintaro Jaya Blok B7/A6, South Tangerang 15424, Indonesia</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+62 888 111 2708</span></p>
            <p><strong>Email:</strong> <span>customercare@alvaauto.com</span></p>
          </div>
        </div>

        <!-- <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div> -->

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">eNno</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href=“https://themewagon.com>ThemeWagon
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>