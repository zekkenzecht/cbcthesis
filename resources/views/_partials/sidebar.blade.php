<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="index.html">CBC</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{{ asset('') }}{{ Auth::user()->avatar }}" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{{ asset('') }}{{ Auth::user()->avatar }}" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{ Auth::user()->name }}</div>
                    <div class="profile-data-title">Jr. Web Developer</div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>                                                                        
</li>
<li class="xn-title">Menu</li>
<li class="active">
<a href="index.html"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
</li>     
      
@role('super-admin')
@include('_partials.sidebar.admin')   
@endrole
@role('communications')
@endrole
@role('pastor-secretaries')
@endrole
@role('ministry-head-and-secretaries')
@endrole
@role('members')
@include('_partials.sidebar.member')
@endrole

</ul>

    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->
