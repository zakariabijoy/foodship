@extends('layouts.app')

@section('title', 'Add Slider')

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
                  <h4 class="card-title ">Add Slider</h4>
                 
                </div>
                <div class="card-body">
                  <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data" >
                  @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="title" >
                        </div>
                      </div>
                    </div>  

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                             <label class="bmd-label-floating">Sub Title</label>
                             <input type="text" class="form-control" name="sub_title" >
                            </div>
                        </div>
                    </div>  
                      <div class="row">
                        <div class="col-md-12">
                                <label class="bmd-label-floating">Image</label>
                                <input type="file"  name="image" >
                        </div>
                      </div>
                      <a class="btn btn-info" href="{{route('slider.index')}}">Back</a>
                      <button type="submit" class="btn btn-primary" >Add</button>
                  </form>
                </div>
              </div>
            </div>
            
@endsection

@push('script')
 
 
@endpush

