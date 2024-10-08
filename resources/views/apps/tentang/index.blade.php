@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tentang Kami</h5>

                  <!-- Horizontal Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Tentang Kami</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="tentang" id="" cols="30" rows="10"></textarea>
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
