@extends('layouts.app')

@section('title', 'Contact')

@push('css')
  <link rel="stylesheet" href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          
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
                  <h4 class="card-title ">Contact Table</h4>
                 
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table  table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Created At</th>
                        <th>Action</th>
                      </thead>

                      <tbody>
                      @foreach($contacts as $key=>$contact)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$contact->name}}</td>
                          <td>{{$contact->email}}</td>
                          <td>{{$contact->subject}}</td>
                          <td>{{$contact->created_at}}</td>
                          <td> 
                            <a class="btn btn-info btn-sm" href="{{route('contact.show', $contact->id)}}"><i class="material-icons">details</i></a>

                            <form id="delete-form-{{$contact->id}}" action="{{route('contact.destroy', $contact->id)}}" method="post">
                              @csrf
                              @method('delete')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to delete this?')){
                              event.preventDefault();
                              document.getElementById('delete-form-{{$contact->id}}').
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

