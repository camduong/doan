<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin Page | @yield('title')</title>

<!-- Bootstrap -->
<link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset('css/thuvienadmin.css') }}" rel="stylesheet">

<style media="screen" type="text/css">
    #DataTables_Table_0_wrapper > th,#DataTables_Table_0_wrapper >td {
        vertical-align: middle!important;
        max-width: 200px;
    }
</style>
@yield('stylesheets')