@extends('layouts.app_admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">New Leaves</h3>

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
     <table id="LeavesTable" class="table table-bordered table-sm table-striped">
        <thead>
            <th style="width:150px;">created at</th>
            <th style="width:150px;">Employee</th>
            <th style="width:150px;">Type</th>
            <th>description</th>
            <th style="width:100px;">status</th>
            <th style="width:200px;">action</th>
        </thead>
        <tbody>
            @foreach ($leaves as $item)
            <tr>
              <td>{{$item->date}}</td>             
              <td>{{$item->Employee->name}}</td>             
              <td>@if($item->LeaveType()->count() !=0){{$item->LeaveType->name}} @else - @endif</td>  
              <td>{{$item->description}}</td>  
              <td>{{$item->status}}</td>  
              <td><a href="{{route('admin.leave.accept',$item->id)}}" class="btn btn-success btn-sm">Accept</a> <a href="{{route('admin.leave.rejected',$item->id)}}" class="btn btn-danger btn-sm">rejected</a></td>  
            </tr>              
          @endforeach
         
        </tbody>
     </table>
    </div>
    <!-- /.card-body -->
   
    <!-- /.card-footer-->
  </div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {

    $('#LeavesTable').DataTable();
    });
</script>
@endsection