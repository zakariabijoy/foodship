@extends('layouts.app')

@section('title', 'Add Category')

@push('css')
  
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                     @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <i class="material-icons">close</i>
                            </button>
                            <span>{{ $error }}</span>
                        </div>
                         @endforeach
                @endif
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add Category</h4>
                 
                </div>
                <div class="card-body">
                  <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data" >
                  @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name" >
                        </div>
                      </div>
                    </div>  

                   
                      <a class="btn btn-info" href="{{route('category.index')}}">Back</a>
                      <button type="submit" class="btn btn-primary" >Add</button>
                  </form>
                </div>
              </div>
            </div>
            
@endsection

@push('script')
 
 
@endpush

