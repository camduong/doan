@extends('layouts.admain')

@section('title', ' Admin Home Page')

@section('content')
<div class="right_col" role="main">
  <div class="row">
    <div class="animated flipInY col-md-4">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-road"></i>
        </div>
        <div class="count">{{ $tours }}</div>

        <h3>Chuyến đi</h3>
        <p>Số chuyến đi website đang cung cấp.</p>
      </div>
    </div>
    <div class="animated flipInY col-md-4">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-bus"></i>
        </div>
        <div class="count">{{ $vehicles }}</div>

        <h3>Phương tiện</h3>
        <p>Số phương tiện website đang cung cấp.</p>
      </div>
    </div>
    <div class="animated flipInY col-md-4">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-map-marker"></i>
        </div>
        <div class="count">{{ $locations }}</div>

        <h3>Địa điểm</h3>
        <p>Số địa điểm website đang cung cấp.</p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="animated flipInY col-md-4">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-building"></i>
        </div>
        <div class="count">{{ $hotels }}</div>

        <h3>Khách sạn</h3>
        <p>Số khách sạn website đang cung cấp.</p>
      </div>
    </div>
    <div class="animated flipInY col-md-4">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-money"></i>
        </div>
        <div class="count">{{ $orders }}</div>

        <h3>Đơn hàng</h3>
        <p>Số đơn hàng mà website đang có.</p>
      </div>
    </div>
    <div class="animated flipInY col-md-4">
      <div class="tile-stats">
        <div class="icon"><i class="fa fa-users"></i>
        </div>
        <div class="count">{{ $users }}</div>

        <h3>Thành viên</h3>
        <p>Số thành viên của website.</p>
      </div>
    </div>
  </div>
</div>
@stop