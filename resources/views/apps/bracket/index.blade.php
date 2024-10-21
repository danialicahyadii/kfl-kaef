@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Bracket</h5>

                  <!-- Horizontal Form -->
                  <form action="{{ route('bracket.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Preview</label>
                      <div class="col-sm-10 mb-5">
                        <img width="50%" src="{{ $bracket->image }}" alt="">
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Update Image Bracket</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="file">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                  </form><!-- End Horizontal Form -->

                </div>
              </div>
        </div>
    </div>
</section>
@endsection
