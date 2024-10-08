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

        <div id="match-schedule-table"></div>

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
        'Home',
        'vs',
        'Home',
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

@endpush
