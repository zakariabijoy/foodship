@extends('layouts.app')

@section('title', 'Update Slider')

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
                  <h4 class="card-title ">Edit Slider</h4>
                 
                </div>
                <div class="card-body">
                  <form action="{{route('slider.update',$slider->id)}}" method="post" enctype="multipart/form-data" >
                  @csrf
                  @method('put')
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" value={{$slider->title}} name="title" >
                        </div>
                      </div>
                    </div>  

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                             <label class="bmd-label-floating">Sub Title</label>
                             <input type="text" class="form-control" value={{$slider->sub_title}} name="sub_title" >
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
                      <button type="submit" class="btn btn-primary" >Save</button>
                  </form>
                </div>
              </div>
            </div>
            
@endsection

@push('script')
 
 
@endpush

