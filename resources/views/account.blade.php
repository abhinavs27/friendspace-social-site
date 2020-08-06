@extends('layouts.master')

@section('title')
    Account
@endsection


@section('content')
<div class="container content-wrap">
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" class="form-control" value="{{ $user->fname }}" id="fname">
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
        </div>
    </section>
    @if (Storage::disk('local')->has($user->fname . '-' . $user->id . '.jpg'))
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <img src="{{ route('account.image', ['filename' => $user->fname . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive text-center" width="250px" height="300px">
            </div>
        </section>
    @endif


</div>
<footer class="page-footer font-small pt-4" id="footer" style="position: absolute;
bottom: 0;
width: 100%;
height: 160px;background-color: #179393;">
@include('includes.footer')
@endsection


