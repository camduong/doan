<div class="profile clearfix">
    <div class="profile_pic">
    <img src="{{ asset('img/admin.jpg') }}" alt="admin_picture" class="img-circle profile_img">
    </div>
    <div class="profile_info">
    <span>Welcome,</span>
    <h2>{{ Auth::user()->f_name.' '.Auth::user()->l_name }}</h2>
    </div>
</div>