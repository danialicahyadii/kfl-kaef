@extends('welcome')
@section('content')
<div class="page-title dark-background">
    <div class="container position-relative">
      <h1>About</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li class="current">About</li>
        </ol>
      </nav>
    </div>
</div><!-- End Page Title -->

  <!-- About Section -->
  <section id="about" class="about section">

    <div class="container">

        <div class="row d-flex align-items-center gy-4">
            <div class="col-lg-6 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <img width="50%" src="{{ asset('assets/img/logo_kfl.png') }}" class="img-fluid" alt="Logo KFL">
            </div>
            <div class="col-lg-6 content d-flex justify-content-center flex-column" data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-center">Mobile Legends: Bang Bang KFL.</h3>
                <p class="fst-italic">
                    adalah kompetisi permainan mobile terbesar dan paling bergengsi di Kimia Farma Grup.
                    Didorong oleh tekad untuk mengangkat ekosistem esports internal KF Grup, di tahun 2024 ini KFL melakukan lompatan dengan membangun platform untuk memfasilitasi setiap acara KFL.
                </p>
                <p>
                    Kami percaya bahwa setiap pemain memiliki potensi untuk bersinar. Kami didirikan untuk memberikan platform bagi para gamer untuk menunjukkan keterampilan mereka, bersaing dengan yang terbaik, dan membangun koneksi dengan sesama karyawan KF Grup. Kami berkomitmen untuk meningkatkan pengalaman esports di KF Grup.
                </p>
            </div>
        </div>


    </div>

  </section><!-- /About Section -->
@endsection
