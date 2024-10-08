@extends('welcome')
@section('content')
<div class="page-title dark-background">
    <div class="container position-relative">
      <h1>Jadwal</h1>
      <p>Jadwal gelaran turnamen KFL</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="/">Home</a></li>
          <li class="current">Jadwal</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Team Section -->
  <section id="featured-services" class="featured-services section">

    <div class="container">

      <div class="row gy-3 justify-content-center">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All Match</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Today</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div id="match-schedule-table"></div>
            </div>
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div id="match-schedule-table-today"></div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
          </div>
    </div>

  </section><!-- /Featured Services Section -->
@endsection
@push('js')
<link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>
<script>
    new gridjs.Grid({
      columns: [
        'Match Date',
        {
          name: 'Home',
          formatter: (cell) => gridjs.html(`<img src="${cell}" alt="${cell}" width="50" height="50">`)
        },
        'vs',
        {
          name: 'Away',
          formatter: (cell) => gridjs.html(`<img src="${cell}" alt="${cell}" width="50" height="50">`)
        },
        'Result'
      ],
      data: @json($matches),
      pagination: {
        limit: 5 // Mengatur pagination dengan 5 data per halaman
      },
      search: true,  // Menambahkan fitur pencarian
      sort: true,    // Menambahkan fitur sort untuk sorting kolom
      language: {
        search: {
          placeholder: 'Cari pertandingan...'
        },
        pagination: {
          previous: 'Sebelumnya',
          next: 'Selanjutnya',
          showing: 'Menampilkan',
          results: () => 'hasil'
        }
      },
    }).render(document.getElementById('match-schedule-table'));
</script>
<script>
    new gridjs.Grid({
      columns: [
        'Match Date',
        {
          name: 'Home',
          formatter: (cell) => gridjs.html(`<img src="${cell}" alt="${cell}" width="50" height="50">`)
        },
        'vs',
        {
          name: 'Away',
          formatter: (cell) => gridjs.html(`<img src="${cell}" alt="${cell}" width="50" height="50">`)
        },
        'Result'
      ],
      data: @json($matchesToday),
      pagination: {
        limit: 5 // Mengatur pagination dengan 5 data per halaman
      },
      search: true,  // Menambahkan fitur pencarian
      sort: true,    // Menambahkan fitur sort untuk sorting kolom
      language: {
        search: {
          placeholder: 'Cari pertandingan...'
        },
        pagination: {
          previous: 'Sebelumnya',
          next: 'Selanjutnya',
          showing: 'Menampilkan',
          results: () => 'hasil'
        }
      },
    }).render(document.getElementById('match-schedule-table-today'));
</script>

@endpush
