@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Match</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Buat
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                        Import
                    </button>
                    <div class="modal fade" id="basicModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('match.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Buat Jadwal</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="col-md-5">
                                                    <select name="home_team_id" class="form-control">
                                                        <option value="" disabled selected>Pilih Team</option>
                                                        @foreach ($teams as $row)
                                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <span class="mx-2">vs</span> <!-- "mx-2" untuk memberikan jarak horizontal -->
                                                <div class="col-md-5">
                                                    <select name="away_team_id" class="form-control">
                                                        <option value="" disabled selected>Pilih Team</option>
                                                        @foreach ($teams as $row)
                                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="col-md-5">
                                                    <label for="" class="mb-2">Pilih Tanggal</label>
                                                    <input type="date" class="form-control" name="match_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Buat Jadwal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End Basic Modal-->
                    <div class="modal fade" id="uploadModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('match.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Import Tim</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                            <div class="col-sm-10">
                                            <input class="form-control" type="file" name="file" id="formFile">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End Basic Modal-->
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                    <thead>
                        <tr>
                        <th>
                            No
                        </th>
                        <th>Action</th>
                        <th>Home Team</th>
                        <th>Away Team</th>
                        <th data-type="date" data-format="YYYY/DD/MM">Match Date</th>
                        <th>Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($match as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($row->is_completed == false)
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#basicModal{{ $row->id }}" class="btn btn-sm btn-warning"><i class="bi bi-arrow-repeat"></i></button>
                                        <div class="modal fade" id="basicModal{{ $row->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('match.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Score</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="col-md-5">
                                                                        <label for="" class="mb-2">{{ $row->homeTeam->name }}</label>
                                                                        <input class="form-control" type="number" name="home_team_score" id="home_team_score" value="0" min="0">
                                                                    </div>
                                                                    <span class="mx-2">vs</span>
                                                                    <div class="col-md-5">
                                                                        <label for="" class="mb-2">{{ $row->awayTeam->name }}</label>
                                                                        <input class="form-control" type="number" name="away_team_score" id="away_team_score" value="0" min="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="" class="mb-2">Match Date</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" name="match_date" value="{{ \Carbon\Carbon::parse($row->match_date)->locale('id')->translatedFormat('l, j F Y') }}" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- End Basic Modal-->
                                    @endif
                                </td>
                                <td>{{ $row->homeTeam->name }}</td>
                                <td>{{ $row->awayTeam->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($row->match_date)->format('d-m-Y') }}</td>
                                <td>{{ $row->result }}</td>
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
