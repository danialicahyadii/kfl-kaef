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
        <div data-aos="fade-up" data-aos-delay="100">
            <h1 class="text-center">PLAYOFFS BRACKET</h1>
            <div class="mt-5">
                <div class="col-sm-12 text-center">
                    <img width="100%" src="{{ asset('assets/img/bracket.jpg') }}" alt="">
                </div>
        </div>
        <div class="mt-5" data-aos="fade-up" data-aos-delay="100">
            <h1 class="text-center">STANDINGS</h1>
            <div class="mt-5">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-sm table-standings dataTable no-footer" id="DataTables_Table_0" role="grid">
                            <thead>
                                <tr role="row">
                                    <th style="background-color: black" class="team-header sorting_disabled text-white" rowspan="1" colspan="1"> Team </th>
                                    <th style="color: #fe0000; background-color: black" class="sorting_disabled text-center" rowspan="1" colspan="1"> Match Point </th>
                                    <th style="background-color: black" class="sorting_disabled text-center text-white" rowspan="1" colspan="1"> Match W-L </th>
                                    <th style="color: #fe0000; background-color: black" class="sorting_disabled text-center" rowspan="1" colspan="1"> Net Game Win </th>
                                    <th style="background-color: black" class="sorting_disabled text-center text-white" rowspan="1" colspan="1"> Game W-L </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalTeams = count($teams);
                                @endphp

                                @foreach ($teams as $team)
                                    @php
                                        // Determine if this is one of the last three teams
                                        $isLastThree = ($loop->iteration > $totalTeams - 4);
                                    @endphp

                                    <tr class="odd text-center">
                                        <td class="team-info" style="{{ $isLastThree ? 'background-color: #FFCBCB;' : '' }}">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="team-rank ms-lg-2 me-lg-2">
                                                    {{ $loop->iteration }}
                                                </div>
                                                <div class="team-logo me-lg-2">
                                                    <img src="{{ $team->image }}" style="height: 24px;">
                                                    <span class="d-lg-none">{{ strtoupper($team->name) }}</span>

                                                </div>
                                                <div class="team-name">
                                                    {{-- <span class="d-lg-none">{{ strtoupper($team->name) }}</span> --}}
                                                    {{-- <span class="d-lg-none">GEEK</span> --}}
                                                    {{-- <span class="d-none d-lg-block">{{ strtoupper($team->name) }}</span> --}}
                                                    <span class="d-none d-lg-block">{{ strtoupper($team->name) }}</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td style="color: #fe0000; font-weight: 600; {{ $isLastThree ? 'background-color: #FFCBCB;' : '' }}">
                                            <div>{{ $team->teamPoints->match_points ?? 0 }}</div>
                                        </td>
                                        <td style="{{ $isLastThree ? 'background-color: #FFCBCB;' : '' }}">
                                            <div>{{ $team->teamPoints->match_wins ?? 0 }} - {{ $team->teamPoints->match_losses ?? 0 }}</div>
                                        </td>
                                        <td style="color: #fe0000; font-weight: 600; {{ $isLastThree ? 'background-color: #FFCBCB;' : '' }}">
                                            <div>{{ ($team->teamPoints->game_wins ?? 0) - ($team->teamPoints->game_losses ?? 0) }}</div>
                                        </td>
                                        <td style="min-width: 50px; {{ $isLastThree ? 'background-color: #FFCBCB;' : '' }}">
                                            <div>{{ $team->teamPoints->game_wins ?? 0 }} - {{ $team->teamPoints->game_losses ?? 0 }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <b>
                        *Empat posisi terbawah tidak lolos ke babak playoffs
                    </b>
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
  <section id="about" class="about section light-background">

    <div class="container">

      <div class="row gy-4">
        <div class="col-12 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
          <img src="assets/img/thumbnail.jpeg" class="img-fluid" alt="">
          <a href="https://www.youtube.com/watch?v=m9BysWCKvx8" class="glightbox pulsating-play-btn"></a>
        </div>
      </div>

    </div>

  </section><!-- /About Section -->

@endsection
@push('js')
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready( function () {
        alert('tes')
        $('#DataTables_Table_0').DataTable();
    } );
</script>
@endpush
