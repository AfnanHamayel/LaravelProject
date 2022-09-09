

@extends('layouts.app_admin')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit \ view type leave</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.leaves.update',$leave->id)}}" method="post" novalidate>
            @csrf
            @method('put')
            <div class="form-group mb-4">
                <label for="name">Type Name</label>
                <input type="text" name="name" id="name" value="{{old('name',$leave->name)}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save edit type leave</button>
        </form>
    </div>
    <!-- /.card-body -->
   
    <!-- /.card-footer-->
  </div>
@endsection
