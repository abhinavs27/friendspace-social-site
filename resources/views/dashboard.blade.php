@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@include('includes.message-block')

@section('content')
<div class="container content-wrap">

  <section class="row newpost">
    <div class="col-md-6 col-md-oofset-3">
<header><h3>What do you have to say?</h3></header>
<form action="{{route('post.create')}}" method="post"> 
  <div class="form-group">
<textarea name="body" id="body" cols="30" rows="5" class="form-control" placeholder="Your post"></textarea>
<button type="submit" class="btn btn-primary mt-2 " id="create-post-btn">Create Post</button>
  </div>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
</form>
    </div>
  </section>
  <hr>

  {{-- first dummy post --}}
 <section class="row posts">
  <div class="col-md-6 col-md-offset-3">
    <header><h3>What other people say...</h3></header>
    @foreach ($posts as $post)
  <article class="post" data-postid="{{ $post->id }}">
    <p>{{$post -> body }}</p>
      <div class="info">
        Posted by {{ $post->user->fname}} on {{$post-> created_at}}
      </div>
      <div class="interaction">
        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>|
       @if (Auth::user() == $post-> user)
        <a href="#" class="edit">Edit</a>|
        <a href="{{route('post.delete', ['post_id' => $post->id])}}">Delete</a>
        @endif

        </div>
    </article>  
    @endforeach
  
  </div>
 </section>
 

 {{-- edit dialog modal --}}
 
 <div class="modal"  role="dialog" id="edit-modal">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Post</h5>
        
      </div>
      <div class="modal-body">
        
        <form action="">
         
          <textarea name="post-body" class="form-control" id="post-body" rows="5"></textarea>
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="modal-close" onclick="modalClose()">Close</button>
              <button type="button" class="btn btn-primary modal-save" onclick="myFunction()">Save changes</button>
            </div>
        </form>
        
      </div>
      
    </div>
  </div>
</div>

<script>
  var token = '{{csrf_token()}}';
var urlEdit = '{{route('edit')}}';
var urlLike = '{{route('like')}}';

</script>
</div>
<footer class="page-footer font-small  pt-4" id="footer" style="position:relative;bottom:0;background-color: #179393;">
@include('includes.footer')
@endsection