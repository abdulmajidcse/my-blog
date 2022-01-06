@extends('layouts.admin_app')

@section('admin_title')
    {{ 'Dashboard'}}
@endsection

@section('admin_content')

    @if (session('status'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close text-light" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Blog Short Report</h3>
        </div>
        <div class="card-body">
          {{-- short report --}}
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                  <span class="info-box-number">{{ $resultCount['users'] }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-layer-group"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Categories</span>
                  <span class="info-box-number">
                    {{ $resultCount['blogCategories'] }}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-plus-square"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Posts</span>
                  <span class="info-box-number">{{ $resultCount['blogPosts'] }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
  
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
  
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-trash"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Trash</span>
                  <span class="info-box-number">{{ $resultCount['trashes'] }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
