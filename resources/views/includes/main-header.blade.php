<header class="header black-bg">
<div class="sidebar-toggle-box">
  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
</div>
<!--logo start-->
<a href="index.html" class="logo"><b>SI<span>PATEK</span></b></a>
<!--logo end-->
<div class="nav notify-row" id="top_menu">

</div>
<div class="top-menu">


  <ul class="nav pull-right top-menu">
    <li><a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout

    </a></li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </ul>

</div>

</header>
