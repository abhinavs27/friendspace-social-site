{{-- @if(count($errors) > 0)
<div class="col-md-4 col-md-offset-4 error">
@foreach ($errors->all() as $err)
<li>{{$err}}</li>   
@endforeach
</div>
@endif

@if (Session::has('message'))
<div class="col-md-4 col-md-offset-4 success">
  {{Session::get('message')}} 
    </div>  
@endif --}}



@if(count($errors) > 0)
<div class="alert alert-danger text-center">
@foreach ($errors->all() as $err)
<li>{{$err}}</li>   
@endforeach
</div>
@endif

@if (Session::has('message'))
<div class="alert alert-success text-center">
  {{Session::get('message')}} 
    </div>  
@endif