@extends('welcome')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
          <h1>Berita</h1>
          <p>Halaman ini berisi tentang berita ekosistem E-sport di Kimia Farma Group.</p>
          <nav class="breadcrumbs">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li class="current">Berita</li>
            </ol>
          </nav>
        </div>
      </div><!-- End Page Title -->

      <!-- Blog Posts Section -->
      <section id="blog-posts" class="blog-posts section">

        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-4">
                <article>

                  <div class="post-img">
                    <img src="{{ asset('storage/berita/magic-chess/magic-chess.jpeg') }}" alt="" class="img-fluid">
                  </div>

                  <p class="post-category">Tournament</p>

                  <h2 class="title">
                    <a href="{{ url('berita-detail') }}">KFL ARCADE: Magic Chess Tournament</a>
                  </h2>

                  <div class="d-flex align-items-center">
                    <img src="assets/img/logo_kfl.png" alt="" class="img-fluid post-author-img flex-shrink-0">
                    <div class="post-meta">
                      <p class="post-author">Admin</p>
                      <p class="post-date">
                        <time datetime="2022-01-02">Oct 11, 2024</time>
                      </p>
                    </div>
                  </div>

                </article>
              </div><!-- End post list item -->

          </div>
        </div>

      </section><!-- /Blog Posts Section -->

      <!-- Blog Pagination Section -->
      <section id="blog-pagination" class="blog-pagination section">

        <div class="container">
          <div class="d-flex justify-content-center">
            <ul>
              <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
              <li><a href="#">1</a></li>
              {{-- <li><a href="#" class="active">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li>...</li>
              <li><a href="#">10</a></li> --}}
              <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>

      </section><!-- /Blog Pagination Section -->
@endsection
