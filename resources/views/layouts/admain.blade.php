<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._ad-head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/admin" class="site_title"><i class="fa fa-globe" style="border: none"></i> <span>Vacation World</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('partials._ad-menuprofile')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('partials._ad-sidebar')
            <!-- /sidebar menu -->

            @include('partials._ad-menufooter')
          </div>
        </div>

        @include('partials._ad-topnav')

        @yield('content')

       @include('partials._ad-footer')
       
      </div>
    </div>
    @include('partials._ad-javascript')
  </body>
</html>
