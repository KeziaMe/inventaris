@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center mb-2">
          <div class="col">
            <h2 class="h5 page-title">Data Grafik</h2>
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow bg-primary text-white border-0">
                </div>
              </div>
            </div> <!-- end section -->

            <div class="row align-items-center my-2">
              <div class="col-auto ml-auto">
                <form class="form-inline">
                  <div class="form-group">
                    <label for="reportrange" class="sr-only">Date Ranges</label>
                    <div id="reportrange" class="px-2 py-2 text-muted">
                      <i class="fe fe-calendar fe-16 mx-2"></i>
                      <span class="small"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-sm"><span
                        class="fe fe-refresh-ccw fe-12 text-muted"></span></button>
                    <button type="button" class="btn btn-sm"><span
                        class="fe fe-filter fe-12 text-muted"></span></button>
                  </div>
                </form>
              </div>
            </div>
            <!-- charts-->
            <div class="row my-4">
              <div class="col-md-12">
                <div class="chart-box">
                  <div id="columnChart"></div>
                </div>
              </div> <!-- .col -->
            </div> <!-- end section -->
            <!-- info small box -->
          </div>
        </div>
      </div>
    </div>
  </div>

</main> <!-- main -->
@endsection