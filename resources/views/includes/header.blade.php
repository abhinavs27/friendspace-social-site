<header >
  <nav class="navbar navbar-expand-md ">
    <a class="navbar-brand" href="{{route('dashboard')}}" id="logo">FriendSpace</a>
    @if(Auth::user())
    <button
      class="navbar-toggler text-center"
      type="button"
      data-toggle="collapse"
      data-target="#collapsibleNavbar"
    >
    <i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse my-auto mr-3" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link " href="{{route('dashboard')}}"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('account')}}"><i class="fas fa-user-circle"></i> Account</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
    @endif
  </nav>
</header>