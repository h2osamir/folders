@extends('master')

@section('content')
@if(session('success'))
<div class="row">
<div class="col-md-6 mx-auto text-center">
<div class="alert alert-success">{{ session('success') }}</div>
</div>
@endif
</div>
<div class="row">
    <div class="col-md-12">
    <H1>CONTACT</H1>
   
    </div>
    
</div>

<div class="row">
    <div class="col-md-3"><h2>{{setting('contact.phone')}}</h2></div>
    <div class="col-md-3"><h2>{{setting('contact.email')}}</h2></div>
   
    </div>

  <div class="row">
      <div class="text-center">

      </div>
  <div class="col-md-3 mt-x  ">
    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                placeholder="Search users"> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
  
  </div>
  <div class="col-md-6">
  <form action="{{ url('/contact') }}"  method="POST"  >
  {{ csrf_field() }}
    <div class="form-group">
    <label for="objet">Objet</label>
    <input type="text" name="objet" id="objet" class="form-control" placeholder="" aria-describedby="helpId">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
  </div>
  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
  </div>
button.btn.btn-primary.btn-block
<button class="btn btn-primary btn-block">add</button>
  </form>
 
  
  </div>
  </div>  

@endsection 