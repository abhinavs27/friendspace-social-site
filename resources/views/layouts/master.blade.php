<!DOCTYPE html>
<html >
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title') - FriendSpace Social Site @ Created by Abhinav Srivastava</title>
  

        {{-- bootstrap --}}
        <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   {{-- bootstrap end--}}
     
        <link href="{{ secure_asset('/assets/css/main.css') }}" rel="stylesheet"> 
        {{-- Google font api --}}
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto&display=swap" rel="stylesheet">

       <!-- Font Awesome cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://kit.fontawesome.com/b2a54a4bef.js" crossorigin="anonymous"></script>
      </head>
    <body>
      @include('includes.header')
        <div class=" " id="main-container">
          @yield('content')
          
          
        </div>
        
       
       
        <script src="{{ secure_asset('/assets/js/main.js') }}" defer></script>
    </body>
</html>
