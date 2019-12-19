@extends('layouts.app')

@section('title', 'Edit Item')

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
                  <h4 class="card-title ">Edit Item</h4>
                 
                </div>
                <div class="card-body">
                  <form action="{{route('item.update',$item->id)}}" method="post" enctype="multipart/form-data" >
                  @csrf
                  @method('put')
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <select name="category" class="form-control">
                            <option value="">--Select--</option>
                            @foreach($categories as $key => $category)
                            <OPtion {{$category->id == $item->category_id ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</OPtion>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name"  value="{{$item->name}}">
                        </div>
                      </div>
                    </div>    

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea class="form-control" name="description"  cols="30" rows="10" >{{$item->description}}</textarea>
                         
                        </div>
                      </div>
                    </div> 

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="number" class="form-control" name="price" value="{{$item->price}}" >
                        </div>
                      </div>
                    </div>   

                    <div class="row">
                      <div class="col-md-12">
                        
                          <label class="bmd-label-floating">Image</label>
                          <input type="file"  name="image" >
                        
                      </div>
                    </div>    
                    
                   
                      <a class="btn btn-info" href="{{route('item.index')}}">Back</a>
                      <button type="submit" class="btn btn-primary" >Add</button>
                  </form>
                </div>
              </div>
            </div>
            
@endsection

@push('script')
 
 
@endpush

