<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url(<?= base_url('assets/img/slide/s1.jpg') ?>)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Welcome to <span>TR<i class="fas fa-recycle"></i>SH</span>
            </h2>
            <p class="animate__animated animate__fadeInUp">Pengelolaan Bank Sampah Anda menjadi lebih mudah.</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item" style="background-image: url(<?= base_url('assets/img/slide/s2.png') ?>)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown"><span>TR<i class="fas fa-recycle"></i>SH</span></h2>
            <p class="animate__animated animate__fadeInUp">Mari kita bergabung dalam perjalanan menuju lingkungan yang
              lebih bersih dan berkelanjutan! Gunakan web Bank Sampah kami untuk dengan mudah mendaur ulang limbah Anda,
              peroleh poin, dan terapkan gaya hidup ramah lingkungan</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item" style="background-image: url(<?= base_url('assets/img/slide/s3.jpg') ?>)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown"><span>TR<i class="fas fa-recycle"></i>SH</span></h2>
            <p class="animate__animated animate__fadeInUp">Satu langkah kecil, tapi memiliki dampak besar untuk bumi
              kita. Ayo, daftarkan diri Anda sekarang dan bersama-sama kita buat dunia ini menjadi tempat yang lebih
              baik!"</p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
          </div>
        </div>
      </div>

    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Featured Services Section ======= -->
  <section id="jadwal" class="featured-services section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Jadwal Menabung</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">


        <section class="welcome-area mt-5 mb-3 sec-padding p-relative o-hidden">
          <div class="container">
            <div class="row">
              <div class="col-3 d-none d-md-block">
                <img alt="img" class="mt-5" width="70%" src="https://ebanksampah.unilak.ac.id/assets/frontend/images/time.svg">
              </div>
              <div class="col-12 col-md-9">
                <div class="row mb-4">

                </div>
                <div class="row justify-content-center wow bounceInUp">
                  <div style="height: 150px;" class="col p-3 border bg-light text-black text-center mr-2 hari" id="senin">
                    <h6 style="background-color: #3d4255 !important; border-radius: 5px;" class="d-block p-2 text-light text-capitalize">senin</h6>
                    <hr>
                    <span class="text-success mt-5 font-weight-bold status" style="font-size: 10px;" id="status-senin">9.00 - 16.00</span>
                  </div>
                  <div style="height: 150px;" class="col p-3 border bg-light text-black text-center mr-2 hari" id="selasa">
                    <h6 style="background-color: #3d4255 !important; border-radius: 5px;" class="d-block p-2 text-light text-capitalize">selasa</h6>
                    <hr>
                    <span class="text-success mt-5 font-weight-bold status" style="font-size: 10px;" id="status-selasa">9.00 - 16.00</span>
                  </div>
                  <div style="height: 150px;" class="col p-3 border bg-light text-black text-center mr-2 hari" id="rabu">
                    <h6 style="background-color: #3d4255 !important; border-radius: 5px;" class="d-block p-2 text-light text-capitalize">rabu</h6>
                    <hr>
                    <span class="text-success mt-5 font-weight-bold status" style="font-size: 10px;" id="status-rabu">9.00 - 16.00</span>
                  </div>
                  <div style="height: 150px;" class="col p-3 border bg-light text-black text-center mr-2 hari" id="kamis">
                    <h6 style="background-color: #3d4255 !important; border-radius: 5px;" class="d-block p-2 text-light text-capitalize">kamis</h6>
                    <hr>
                    <span class="text-success mt-5 font-weight-bold status" style="font-size: 10px;" id="status-kamis">9.00 - 16.00</span>
                  </div>
                  <div style="height: 150px;" class="col p-3 border bg-light text-black text-center mr-2 hari" id="jumat">
                    <h6 style="background-color: #3d4255 !important; border-radius: 5px;" class="d-block p-2 text-light text-capitalize">jumat</h6>
                    <hr>
                    <span class="text-success mt-5 font-weight-bold status" style="font-size: 10px;" id="status-jumat">9.00 - 16.00</span>
                  </div>
                  <div style="height: 150px;" class="col p-3 border bg-light text-black text-center mr-2 hari" id="sabtu">
                    <h6 style="background-color: #3d4255 !important; border-radius: 5px;" class="d-block p-2 text-light text-capitalize">sabtu</h6>
                    <hr>
                    <span class="text-success mt-5 font-weight-bold status" style="font-size: 10px;" id="status-sabtu">9.00 - 16.00</span>
                  </div>
                  <div style="height: 150px;" class="col p-3 border bg-light text-black text-center mr-2 hari" id="minggu">
                    <h6 style="background-color: #3d4255 !important; border-radius: 5px;" class="d-block p-2 text-light text-capitalize">minggu</h6>
                    <hr>
                    <span class="text-danger mt-5 font-weight-bold status" style="font-size: 10px;" id="status-minggu">Tutup</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>



      </div>
    </div>

    </div>
  </section><!-- End Featured Services Section -->

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container">
    <div class="section-title">
        <h2>Tentang Bank Sampah Unilak</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
      <main class="container-fluid px-0">
        <!-- Row: Shop online-->
        <section class="row g-0">
          <div class="col-md-6  " style="min-height: 15rem;">
            <img class="background-image" src="<?= base_url() ?>assets/img/kegiatan/kegiatan1.png" width="648" height="350" alt="Alexsander Yandra">
          </div>
          <div class="col-md-6 px-3 px-md-5 py-5">
            <div class="mx-auto py-lg-5" style="max-width: 35rem;">
              <h2 class="h3 pb-3">Program kemasyarakatan</h2>
              <p class="fs-sm pb-3 text-muted">Bank Sampah UNILAK merupakan salah satu kegiatan kemasyarakatan yang
                dikomandoi oleh Lembaga Penelitian dan Pengabdian Masyarakat (LPPM) Universitas Lancang Kuning
                Pekanbaru, Riau. Bank Sampah Unilak merupakan wujud nyata pemberdayaan masyarakatn Riau dalam
                pengelolaan sampah.</p>
            </div>
          </div>
        </section>
        <section class="row g-0">
          <div class="col-md-6  order-md-2" style="min-height: 15rem;">
            <img class="background-image" src="<?= base_url() ?>assets/img/kegiatan/kegiatan2.png" width="648" height="350" alt="Alexsander Yandra">
          </div>
          <div class="col-md-6 px-3 px-md-5 py-5 order-md-1">
            <div class="mx-auto py-lg-5" style="max-width: 35rem;">
              <h2 class="h3 pb-3">Mitra PT. Pertamina Hulu Rokan</h2>
              <p class="fs-sm pb-3 text-muted">LPPM Unilak bersama PT. Pertamina Hulu Rokan membangun dan mengembangkan
                Bank Sampah Unilak dalam upaya pengembangan masyarakat yang mandiri dan sehat</p>
            </div>
          </div>
        </section>
        <!-- Row: Delivery-->
        <section class="row g-0">
          <div class="col-md-6  " style="min-height: 15rem;">
            <img class="background-image" src="<?= base_url() ?>assets/img/kegiatan/kegiatan3.png" width="648" height="350" alt="Alexsander Yandra">
          </div>
          <div class="col-md-6 px-3 px-md-5 py-5">
            <div class="mx-auto py-lg-5" style="max-width: 35rem;">
              <h2 class="h3 pb-3">Mencakup Wilayah Riau</h2>
              <p class="fs-sm pb-3 text-muted">Bank Sampah Unilak mencakup beberapa daerah di kabupatan dan kota di
                Provinsi Riau. Kami mengundang para pemerhati lingkungan, peneliti dan masyarakat luas untuk bermintra
                dengan Bank Sampah Unilak demi terciptanya kawan yang hijau, bersih dan memiliki nilai ekonomi.</p>
            </div>
          </div>
        </section>
        <!-- Section: Shopping outlets-->
        <hr>
        <!-- Section: Team-->

      </main>
</main>

</div>
</section><!-- End About Us Section -->

<!-- ======= Services Section ======= -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2>Lokasi</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in
        iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row">

      <div class="col-lg-12 d-flex align-items-stretch">
        <div class="info">

          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d93164.71810655732!2d101.39411187211407!3d0.5465450638884191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5abe1cb185945%3A0xf97602fa865c503d!2sBank%20Sampah%20Unilak!5e0!3m2!1sen!2sus!4v1703908706093!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 500px;" allowfullscreen></iframe>
          <div class="address">
            <br>
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>Softball Field Universitas Lancang Kuning, Umban Sari, Kec. Rumbai, Kota
              Pekanbaru, Riau 28265, Indonesia</p>
          </div>



          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>+1 5589 55488 55s</p>
          </div>

        </div>

      </div>


    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->