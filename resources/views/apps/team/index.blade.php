@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ ucwords(Request::segment(1)) }}</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Import
                    </button>
                    <div class="modal fade" id="basicModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
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
                        <th>Name</th>
                        <th>Image</th>
                        <th data-type="date" data-format="YYYY/DD/MM">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($team as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#basicModal{{ $row->id }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></button>
                                    <div class="modal fade" id="basicModal{{ $row->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('team.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-12">
                                                                <label for="inputNanme4" class="form-label">Nama Tim</label>
                                                                <input type="text" class="form-control" name="name" value="{{ $row->name }}" id="inputNanme4">
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                <label for="inputNanme4" class="form-label">Logo Tim</label>
                                                                <input type="file" class="form-control" name="logo" id="inputNanme4">
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
                                    </div><!-- End Basic Modal--></td>
                                <td>{{ $row->name }}</td>
                                <td>@if ($row->image)
                                    <img class="mr-3 rounded show-link" style="cursor: pointer;" width="100" height="50" src="{{ $row->image }}" alt="">
                                    @else
                                    -
                                @endif</td>
                                <td>{{ $row->created_at }}</td>
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
