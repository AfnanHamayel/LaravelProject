

@extends('layouts.app_admin')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit / view Employee</h3>

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
        <form action="{{route('admin.employees.update',$employee->id)}}" method="post" novalidate>
            @csrf
            @method('put')
            <div class="form-group mb-4">
                <label for="name">Employee Name</label>
                <input type="text" name="name" id="name" value="{{old('name',$employee->name)}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="form-group mb-4">
              <label for="name">Employee Email</label>
              <input type="email" name="email" id="name" value="{{old('email',$employee->email)}}" class="form-control @error('email') is-invalid @enderror">
              @error('email')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          </div>
          <div class="form-group mb-4">
            <label for="password">Employee password</label>
            <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        
      <div class="form-group mb-4">
        <label for="password">Employee password</label>
        <input id="password-confirm" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}" name="password_confirmation" >
        @error('password_confirmation')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
      
    <div class="form-group mb-4">
      <label for="department">Department</label>
      <select name="department" class="form-control" id="department">
        @foreach ($department as $item)
        <option value="{{$item->id}}" @if(old('department',$employee->department_id)==$item->id) selected @endif>{{$item->name}}</option>
            
        @endforeach
      
      </select> 
      @error('password_confirmation')
      <span class="invalid-feedback d-block" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
  </div>                  
            <button type="submit" class="btn btn-primary">Create employee</button>
        </form>
    </div>
    <!-- /.card-body -->
   
    <!-- /.card-footer-->
  </div>
@endsection
