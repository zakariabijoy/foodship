@extends('layouts.app')

@section('title', 'Item')

@push('css')
  <link rel="stylesheet" href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <a class="btn btn-primary" href="{{route('item.create')}}">Add Item</a>
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
                  <h4 class="card-title ">Item Table</h4>
                 
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table  table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>

                      <tbody>
                      @foreach($items as $key=> $item) 
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$item->name}}</td>
                          <td><img class="img-responsive img-responsive" src="{{asset('/storage/item/'.$item->image)}}"  style="width:100px; height:100;" alt=""></td>
                          <td>{{$item->category->name}}</td>
                          <td>{{$item->description}}</td>
                          <td>{{$item->price}}</td>
                          <td>{{$item->created_at}}</td>
                          <td>{{$item->updated_at}}</td>
                          <td> 
                            <a class="btn btn-info btn-sm" href="{{route('item.edit',$item->id)}}"><i class="material-icons">mode_edit</i></a>

                            <form id="delete-form-{{$item->id}}" action="{{route('item.destroy',$item->id)}}" method="post">
                              @csrf
                              @method('delete')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to delete this?')){
                              event.preventDefault();
                              document.getElementById('delete-form-{{$item->id}}').
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

