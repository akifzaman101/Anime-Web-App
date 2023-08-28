

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('series.list')}}"><b style="color: white">Web-Series</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{route('series.list')}}"><span class="glyphicon glyphicon-home"></span><b style="color: black"> Home </b></a></li>
        
      </ul>
      <form action="/search" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="query" class="form-control search-box" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span> Search</button>
      </form>

      <ul class="nav navbar-nav">
        @if(!Session::has('user'))
        <li class=""><a href="{{route('aboutus')}}"><b style="color: white">About-Us </b></a></li>
        <li class=""><a href="{{route('contactus')}}"><b style="color: white">Contact-Us </b></a></li>
        @elseif(Session::get('user')['status'] =="Admin")
        <li class=""><a href="{{route('all_users')}}"><b style="color: white">User Details</b></a></li>
        <li class=""><a href="{{route('upload')}}"><b style="color: white">Upload</b></a></li>
       
        @endif 
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if(Session::has('user'))
          @if(Session::get('user')['status'] =="Regular")
        <li><a href="{{route('user.details',['id'=>encrypt(Session::get('user')['id'])])}}">
            
            <img class="profile-icon" src="{{asset(Session::get('user')['pro_pic'])}}"></span></a></li>    
        <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b style="color: #8b8680"></b>
              <span class="caret" style="color: white"></span></a>
              <ul class="dropdown-menu">
              <li align = center>{{Session::get('user')['uname']}}</li>
              <li align = center><a href="{{route('aboutus')}}">About-Us</a></li>
              <li align = center><a href="{{route('contactus')}}">Contact-Us</a></li>
              <li align = center><a href="{{route('logout')}}"><b>Logout</b></a></li>
              </ul>
              </li>
            @elseif(Session::get('user')['status'] =="Admin")
              <li><a href="{{route('user.details',['id'=>encrypt(Session::get('user')['id'])])}}">
              
              <img class="profile-icon" src="{{asset(Session::get('user')['pro_pic'])}}"></span></a></li>    
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b style="color: #8b8680"></b>
                <span class="caret" style="color: white"></span></a>
                <ul class="dropdown-menu">
                <li align = center>{{Session::get('user')['uname']}}</li>
                <li align = center><a href="{{route('aboutus')}}">About-Us</a></li>
                <li align = center><a href="{{route('contactus')}}">Admin</a></li>
                <li align = center><a href="{{route('logout')}}"><b>Logout</b></a></li>
                </ul>
                </li>
            @endif
          @else
          <li><a href="{{route('login')}}"><b style="color: white">Login</b></a></li>
          <li><a href="{{route('registration')}}"><b style="color: white">Sign-Up</b></a></li>
          @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>