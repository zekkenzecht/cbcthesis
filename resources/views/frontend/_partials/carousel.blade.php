
   <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval='4000'>
  <!-- Indicators -->
 

 <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>

  </ol>
  <div class="carousel-inner">

  
    @foreach ($slider as $key => $value)

    @if ($key == 0)
    <div class="item active">
      <img src="{{ asset("$value->content") }}"   alt="">
    </div>
    @endif
    @if ($key > 0)
    <div class="item">
      <img src="{{ asset("$value->content") }}"   alt="">
    </div>
    @endif
    
    @endforeach
    
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

 <div id="service">
    <div class="container">
      <div class="row centered">
        <div class="col-md-4">
          <i class="fa fa-heart-o"></i>
          <h4>Vision</h4>
          <p>Taking the City, Taking the Nation and Beyond</p>
          <p><br/><a href="vision.html" class="btn btn-theme">More</a></p>
        </div>
        <div class="col-md-4">
          <i class="fa fa-check-square-o"></i>
          <h4>Core values</h4>
          <div class="col-sm-3 col-md-5">
            <p>Biblical
            Theological
          Relevant
        Immersional</p>
          </div>
          <div class="col-sm-3 col-md-5">
          <p>Intentional
          Redemptional
          Missional
          Offensive</p>
          </div>
        </div>
        <div class="col-md-4">
          <i class="fa fa-book"></i>
          <h4>Mission</h4>
          <p>We exist to glorify God by discipling our members, planting churches, and building institutions that impact the city, the Nation and beyond</p>
          <p><br/><a href="mission.html" class="btn btn-theme">More</a></p>
        </div>          
      </div>
    </div>
   </div>

  @include('frontend._partials.twrap')
  @include('frontend._partials.cwrap')

 