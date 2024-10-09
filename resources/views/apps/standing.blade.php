@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Standings</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
        <div class="col-lg-12">

            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Standings</h5>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                <thead>
                    <tr>
                    <th>
                        No
                    </th>
                    <th>Team</th>
                    <th>Match Point</th>
                    <th>Match W-L</th>
                    <th>Net Game Win</th>
                    <th>Game W-L</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img class="mr-3 rounded show-link" style="cursor: pointer;" width="50" height="50" src="{{ $team->image ?? 'https://marineinsurer.co.uk/wp-content/uploads/2020/05/logo-dummy.png' }}" alt="">{{ $team->name }}</td>
                            <td>{{ $team->teamPoints->points ?? '-' }}</td>
                            <td>{{ $team->teamPoints->match_wins ?? 0 }} - {{ $team->teamPoints->match_losses ?? 0 }}</td>
                            <td>{{ ($team->teamPoints->match_wins ?? 0) - ($team->teamPoints->match_losses ?? 0) }}</td>
                            <td>{{ $team->teamPoints->game_wins ?? 0 }} - {{ $team->teamPoints->match_losses ?? 0 }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
            </div>

        </div>
        </div>
    </section>
@endsection
