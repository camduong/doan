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
            <br />

            <!-- sidebar menu -->
            @include('partials._ad-sidebar')
            <!-- /sidebar menu -->

          </div>
        </div>

        @include('partials._ad-topnav')

        @yield('content')
        <footer class="footer_fixed">
          <div class="pull-right">
          Kha Tran Khoi Nguyen created by Gentelella Template
          </div>
        </footer>
      </div>
    </div>
    @include('partials._ad-javascript')
  </body>
</html>
