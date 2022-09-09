
@extends('layouts.app_admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Manage Department</h3>

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
     <table id="DepartmentTable" class="table table-bordered table-sm table-striped">
        <thead>
            <th style="width:50px;">id</th>
            <th >Name</th>
            <th style="width:200px;">action</th>
        </thead>
        <tbody>
            @foreach ($departments as $item)
            <tr>
              <td>{{$item->id}}</td>             
              <td>{{$item->name}}</td>             
              <td><a href="{{route('admin.department.edit',$item->id)}}" class="btn btn-success btn-sm">Edit</a> <a href="{{route('admin.department.delete',$item->id)}}" class="btn btn-danger btn-sm">delete</a></td>  
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

    $('#DepartmentTable').DataTable();
    });
</script>
@endsection