
@extends('layouts.app')

@section('title', 'Contact Message Details')



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
                  <h4 class="card-title ">Contact Message Details</h4>
                 
                </div>
                <div class="card-body">
                  <h4> <strong>Name: {{$contact->name}}</strong></h4>
                  <h5> <strong>Email: {{$contact->email}}</strong></h5>
                  <h5> <strong>Subject: {{$contact->subject}}</strong></h5>
                  <p><strong>Message: </strong> {{$contact->message}}</p>  
                  

                  <a class="btn btn-danger btn-sm" href="{{route('contact.index')}}">Back</a>
                </div>
              </div>
            </div>
            
@endsection



