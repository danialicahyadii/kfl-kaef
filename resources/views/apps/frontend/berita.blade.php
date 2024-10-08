@extends('welcome')
@section('content')
<div class="page-title dark-background">
    <div class="container position-relative">
      <h1>Berita</h1>
      <p>Berita gelaran turnamen KFL</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="/">Home</a></li>
          <li class="current">Berita</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Team Section -->
  <section id="team" class="team section">
    <div class="container">
        <div class="row gy-5">
            {{-- @foreach ($teams as $team)
                <div class="col-lg-3 col-md-5 member" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-img text-center">
                        <img width="200" height="50" src="https://marineinsurer.co.uk/wp-content/uploads/2020/05/logo-dummy.png " class="img-fluid" alt="">
                        <div class="social">
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info text-center">
                        <h4>{{ $team->name }}</h4>
                    </div>
                </div><!-- End Team Member -->
            @endforeach --}}
        </div>
    </div>
  </section><!-- /Team Section -->
@endsection
