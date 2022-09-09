@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">My Leaves</h3>

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
     <table class="table table-bordered table-sm table-striped">
        <thead>
            <th style="width:150px;">created at</th>
            <th>type leave</th>
            <th>description</th>
            <th style="width:100px;">status</th>
        </thead>
        <tbody>
          @foreach ($leaves as $item)
            <tr>
              <td>{{$item->date}}</td>  
              <td>@if($item->LeaveType()->count() !=0){{$item->LeaveType->name}} @else - @endif</td>  
              <td>{{$item->description}}</td>  
              <td>{{$item->status}}</td>  
            </tr>              
          @endforeach
          @if(count($leaves)==0)
          <tr>
            <td colspan="100%"> No Leaves</td>
          </tr>
          @endif
        </tbody>
     </table>
    </div>
    <!-- /.card-body -->
   
    <!-- /.card-footer-->
  </div>
@endsection
