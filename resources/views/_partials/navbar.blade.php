<!-- START X-NAVIGATION VERTICAL -->
<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
<!-- TOGGLE NAVIGATION -->
<li class="xn-icon-button">
    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
</li>

<li class="xn-icon-button pull-right">
    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>    

</li> 
 <li class="xn-icon-button pull-right" id="markasread" onclick="markasreadclassreq()">
    <a href="#"><span class="fa fa-bell"></span></a>
    <div class="informer informer-danger">{{ count(Auth::user()->unreadNotifications)}}</div>
    <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
        <div class="panel-heading">
            <h3 class="panel-title"><span class="fa fa-bell"></span>&nbsp;Notifications</h3>                                
            <div class="pull-right">
                <span class="label label-warning">{{ count(Auth::user()->unreadNotifications)}} active</span>
            </div>
        </div>     
        <div class="panel-body list-group scroll" style="height: 200px;">  
        @forelse (Auth::user()->notifications as $notification)
           @include('classes._partials.notification')
        @empty
       <a class="list-group-item">
        <strong>No Notifications</strong>
        </a>
        @endforelse  

        </div>                        

</li>
<li><a href="/">HOME</a></li></li>
<li><a href="/profile/{{ Auth::id() }}">Welcome {{ ucwords(Auth::user()->name)  }} !</a></li>
<!-- END SIGN OUT -->
</ul>
<!-- END X-NAVIGATION VERTICAL -->                     
