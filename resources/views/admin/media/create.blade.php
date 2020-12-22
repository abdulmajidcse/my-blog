@extends('layouts.admin_app')

@section('admin_title')
    {{ 'Create Media'}}
@endsection

@section('admin_content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Media</h3>

          <div class="card-tools">
            <a href="{{ route('admin.media.index') }}" class="btn btn-flat btn-sm btn-primary">All Media</a>
          </div>
        </div>
        <div class="card-body">
          
          {{-- Create Post Form --}}
          <form role="form" action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="images">Multiple Media *</label>
              <input type="file" multiple class="form-control @error('images.*') is-invalid @enderror" id="images" name="images[]" required>
              @error('images.*')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

           

            <button type="submit" class="btn btn-flat btn-primary">Save</button>

          </form>

        </div>
        <!-- /.card-body -->

    </div>

@endsection