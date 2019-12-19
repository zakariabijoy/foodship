@extends('layouts.app')

@section('title', 'Category')

@push('css')
  <link rel="stylesheet" href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <a class="btn btn-primary" href="{{route('category.create')}}">Add Category</a>
          <div class="row">
            <div class="col-md-12">
              @if(session('success'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                     {{session('success')}}</span>
                  </div>
                @endif
                
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Category Table</h4>
                 
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table  table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>

                      <tbody>
                      @foreach($categories as $key=> $category) 
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$category->name}}</td>
                          <td>{{$category->slug}}</td>
                          <td>{{$category->created_at}}</td>
                          <td>{{$category->updated_at}}</td>
                          <td> 
                            <a class="btn btn-info btn-sm" href="{{route('category.edit',$category->id)}}"><i class="material-icons">mode_edit</i></a>

                            <form id="delete-form-{{$category->id}}" action="{{route('category.destroy',$category->id)}}" method="post">
                              @csrf
                              @method('delete')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to delete this?')){
                              event.preventDefault();
                              document.getElementById('delete-form-{{$category->id}}').
                              submit();
                            }else{
                              event.preventDefault();
                            }">
                            
                            <i class="material-icons">delete</i></button>
                          </td>
                        </tr>
                       @endforeach 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
@endsection

@push('script')
  <script src="cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  
   <script>
    $(document).ready( function () {
    $('#table').DataTable();
} );
  </script>
@endpush

