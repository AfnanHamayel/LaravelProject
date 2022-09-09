@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">New Leave</h3>

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
      @if(session()->has("success"))
      
      <div class="alert alert-success mb-3">{{session()->get('success')}}</div>  
    @endif
    <form action="{{route('emp_new_leave')}}" method="post">
      @csrf

      <div class="form-group mb-3">
        <label for="deacription" > Description Leave</label>
        <textarea name="description" id="description" cols="30" rows="3" class="form-control  @error('description') is-invalid @enderror">{{old('description')}}</textarea>
        @error('description')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
      </div>
      <div class="form-group mb-3">
        <label for="type_leave" >Type leave</label>
        <select name="type_leave" id="type_leave" class="form-control">
          @foreach ($types as $item)
              <option value="{{$item->id}}" @if($item->id==old('type_leave')) select @endif>{{$item->name}}</option>
          @endforeach
        </select>
        @error('type_leave')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
      </div>
      <div class="form-group mb-3">
        <label for="date" >Leave date</label>
        <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date')}}">
        @error('date')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
      </div>
      <button type="submit" class="btn btn-primary">Create Leave</button>
    </form>
    </div>
    <!-- /.card-body -->
   
    <!-- /.card-footer-->
  </div>
@endsection
