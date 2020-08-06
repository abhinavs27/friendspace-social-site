@extends('layouts.master')

@section('title')
Welcome  
@endsection

@section('content')
<div class=" container content-wrap">
@include('includes.message-block')

<div class="container mt-3">
<div class="row">
<div class="col-md-6">
    <h2>Sign Up</h2>
    <form action="{{route('signup')}}" method="post">
    <div class="form-group {{$errors-> has('email') ? 'has-error':''}}">
          <label >Your E-mail </label> 
          <input type="email" class="form-control" name="email" id="email" value="{{Request::old('email')}}">
           </div>
           <div class="form-group {{$errors-> has('fname') ? 'has-error':''}}">
            <label >Your First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" value="{{Request::old('fname')}}">
             </div>
        <div class="form-group {{$errors-> has('password') ? 'has-error':''}}">
          <label >Your Password</label>
          <input type="password" class="form-control" name="password" id="password" autocomplete="off" value="{{Request::old('password')}}">
        </div>
        <button type="submit" class="btn btn-primary mb-5">Submit</button>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      </form>

</div>
<div class="col-md-6">
    <h2>Sign In</h2>
    <form action="{{route('signin')}}" method="post">
        <div class="form-group {{$errors-> has('email') ? 'has-error':''}}">
          <label for="exampleInputEmail1">Your E-mail </label>
          <input type="email" class="form-control" name="email" id="email " value="{{Request::old('email')}}">
           </div>
        <div class="form-group {{ $errors-> has('password') ? 'has-error':''}}">
          <label >Your Password</label>
          <input type="password" class="form-control" name="password" id="password" autocomplete="off" value="{{Request::old('email')}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
      </form>

</div>
</div>
</div>
</div> 
<footer class="page-footer font-small pt-4" id="footer" style="position: absolute;
bottom: 0;
width: 100%;
height: 160px;background-color: #179393;">
@include('includes.footer')

@endsection