@extends('welcome')
@section('content')
<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

    {{-- <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in"> --}}

    <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="container position-relative">

        <div class="">
          <div class="carousel-container">
            <h2>Welcome to KFL</h2>
            <p>Kimia Farma League (KFL) adalah gelaran turnamen yang diadakan Kimia Farma Group. Web ini befungsi sebagai informasi tim, klasemen, dan jadwal yang ada di KFL.</p>
            {{-- <a href="#about" class="btn-get-started">Read More</a> --}}
          </div>
        </div><!-- End Carousel Item -->

      </div>

    </div>

  </section><!-- /Hero Section -->

  <!-- Featured Services Section -->
  <section id="featured-services" class="featured-services section">

    <div class="container">

      <div class="row gy-4">
          <div class="text-center" data-aos="fade-up" data-aos-delay="100">
              <h1>STANDINGS</h1>
              <div class="mt-5">
                  {{-- <img width="90%" src="{{ asset('assets/img/klasemen.jpeg') }}" alt=""> --}}
                  {{-- <div id="standings-table"></div> --}}
                <div class="col-sm-12">
                    <table class="table table-sm table-standings dataTable no-footer" id="DataTables_Table_0" role="grid">
                        <thead>
                            <tr role="row">
                                <th style="background-color: black" class="team-header sorting_disabled text-white" rowspan="1" colspan="1" style="width: 479.57px;"> Team </th>
                                <th style="background-color: black" style="color: var(--themecolor); width: 205.32px;" class="sorting_disabled text-center text-white" rowspan="1" colspan="1"> Match Point </th>
                                <th style="background-color: black" class="sorting_disabled text-center text-white" rowspan="1" colspan="1" style="width: 173.969px;"> Match W-L </th>
                                <th style="background-color: black" style="color: var(--themecolor); width: 222.367px;" class="sorting_disabled text-center text-white" rowspan="1" colspan="1"> Net Game Win </th>
                                <th style="background-color: black" style="min-width: 50px; width: 153.773px;" class="sorting_disabled text-center text-white" rowspan="1" colspan="1"> Game W-L </th></tr>
                        </thead>

                        <tbody>
                            @php
                                $totalTeams = count($teams);
                            @endphp

                            @foreach ($teams as $team)
                                @php
                                    // Determine if this is one of the last three teams
                                    $isLastThree = ($loop->iteration > $totalTeams - 3);
                                @endphp

                                <tr class="odd" >
                                    <td class="team-info" style="{{ $isLastThree ? 'background-color: #FFCBCB;' : '' }}">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="team-rank ms-lg-2 me-lg-2">
                                                {{ $loop->iteration }}
                                            </div>
                                            <div class="team-logo me-lg-2">
                                                <img src="{{ $team->image }}" style="height: 24px;">
                                            </div>
                                            <div class="team-name">
                                                <span class="d-lg-none">
                                                    {{ strtoupper($team->name) }}
                                                </span>
                                                <span class="d-none d-lg-block">
                                                    {{ strtoupper($team->name) }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td style="color: #fe0000; font-weight: 600; {{ $isLastThree ? 'background-color: #FFCBCB;' : '' }}">
                                        <div>
                                            {{ $team->teamPoints->match_points ?? 0 }}
                                        </div>
                                    </td>
                                    <td style="{{ $isLastThree ? 'background-color: #FFCBCB;' : '' }}">
                                        <div>
                                            {{ $team->teamPoints->game_wins ?? 0 }} -
                                            {{ $team->teamPoints->match_losses ?? 0 }}
                                        </div>
                                    </td>
                                    <td style="color: #fe0000; font-weight: 600; {{ $isLastThree ? 'background-color: #FFCBCB;' : '' }}">
                                        <div>
                                            {{ ($team->teamPoints->game_wins ?? 0) - ($team->teamPoints->game_losses ?? 0) }}
                                        </div>
                                    </td>
                                    <td style="min-width: 50px; {{ $isLastThree ? 'background-color: #FFCBCB;' : '' }}">
                                        <div>
                                            {{ $team->teamPoints->game_wins ?? 0 }} -
                                            {{ $team->teamPoints->game_losses ?? 0 }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

              </div>
          </div>
        {{-- <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-item item-cyan position-relative">
            <div class="icon">
              <i class="bi bi-activity"></i>
            </div>
            <a href="service-details.html" class="stretched-link">
              <h3>Nesciunt Mete</h3>
            </a>
            <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-item item-orange position-relative">
            <div class="icon">
              <i class="bi bi-broadcast"></i>
            </div>
            <a href="service-details.html" class="stretched-link">
              <h3>Eosle Commodi</h3>
            </a>
            <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-item item-teal position-relative">
            <div class="icon">
              <i class="bi bi-easel"></i>
            </div>
            <a href="service-details.html" class="stretched-link">
              <h3>Ledo Markt</h3>
            </a>
            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-item item-red position-relative">
            <div class="icon">
              <i class="bi bi-bounding-box-circles"></i>
            </div>
            <a href="service-details.html" class="stretched-link">
              <h3>Asperiores Commodit</h3>
            </a>
            <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
            <a href="service-details.html" class="stretched-link"></a>
          </div>
        </div><!-- End Service Item --> --}}
      </div>

    </div>

  </section><!-- /Featured Services Section -->

  <!-- About Section -->
  {{-- <section id="about" class="about section light-background">

    <div class="container">

      <div class="row gy-4">
        <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
          <img src="assets/img/about.jpg" class="img-fluid" alt="">
          <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
        </div>
        <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
          <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
          <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <ul>
            <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
            <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
            <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
          </ul>
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
          </p>
        </div>
      </div>

    </div>

  </section><!-- /About Section -->

  <!-- Features Section -->
  <section id="features" class="features section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Features</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
          <img src="assets/img/features-1.svg" class="img-fluid" alt="">
        </div>
        <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
          <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
          <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <ul>
            <li><i class="bi bi-check"></i><span> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
            <li><i class="bi bi-check"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
            <li><i class="bi bi-check"></i> <span>Ullam est qui quos consequatur eos accusamus.</span></li>
          </ul>
        </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/features-2.svg" class="img-fluid" alt="">
        </div>
        <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
          <h3>Corporis temporibus maiores provident</h3>
          <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum
          </p>
        </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
          <img src="assets/img/features-3.svg" class="img-fluid" alt="">
        </div>
        <div class="col-md-7" data-aos="fade-up">
          <h3>Sunt consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
          <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
          <ul>
            <li><i class="bi bi-check"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
            <li><i class="bi bi-check"></i><span> Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
            <li><i class="bi bi-check"></i> <span>Facilis ut et voluptatem aperiam. Autem soluta ad fugiat</span>.</li>
          </ul>
        </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
          <img src="assets/img/features-4.svg" class="img-fluid" alt="">
        </div>
        <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
          <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
          <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum
          </p>
        </div>
      </div><!-- Features Item -->

    </div>

  </section><!-- /Features Section --> --}}
@endsection
@push('js')
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
@endpush
