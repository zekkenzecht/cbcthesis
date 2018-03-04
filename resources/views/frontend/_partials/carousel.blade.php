
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

   <div id="twrap">
    <div class="container centered">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
        <i class="fa fa-globe"></i>
        <p>I thank my God every time I remember you. In all my prayers for all of you, I always pray with joy because of your PARTNERSHIP in the gospel from the first day until now, being confident of this, that he who began a good work in you will carry it on to completion until the day of Christ Jesus.</p>
        <h4><br/>Philippians 1:3-6</h4>
        <p>2018 DIRECTION: Executing CBC ministries in the city</p>
        </div>
      </div>
    </div>
   </div>

   <div id="cwrap">
     <div class="container">
      <div class="row centered">
        <a href="ministryheads.html"><h3>OUR MINISTRIES</h3></a>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/ctsa.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/missions.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/commedia.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/cis.png') }}" class="img-responsive">
        </div>
      </div><!--/row -->
     </div><!--/container --><br><br>
    
      <div class="container">
      <div class="row centered">
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/children.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/music.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/ushering.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/spm.png') }}" class="img-responsive">
        </div>
      </div><!--/row -->
     </div><!--/container --><br><br>

     <div class="container">
      <div class="row centered">
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/sports.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/goldenfolks.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/quad.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/pastoralcare.png') }}" class="img-responsive">
        </div>
      </div><!--/row -->
     </div><!--/container --><br><br>

     <div class="container">
      <div class="row centered">
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/assimilation.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/prayer.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/youth.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/ebs.png') }}" class="img-responsive">
        </div>
      </div><!--/row -->
     </div><!--/container --><br><br>

     <div class="container">
      <div class="row centered">
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/evangelism.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/membership.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/discipleship.png') }}" class="img-responsive">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <img src="{{ asset('/front/assets/img/ministry/final/facility.png') }}" class="img-responsive">
        </div>
      </div><!--/row -->
     </div><!--/container -->
   </div><!--/cwrap -->
   
   


 <div id="footerwrap">
    <div class="container-fluid text-center">
      <div class="row">
        <div class="col-lg-4">
          <h4>Contact Us</h4>
          <div class="hline-w"></div>
          <p>19 National Road
          Alabang Muntinlupa City</p>
          <p><a href="#" style="color:white;">www.facebook.com/citybiblechurch.sermons/</a></p>
          <p>Tel: +63(02)850-6927</p>
        </div>
        <div class="col-lg-4">
          <h4>Social Links</h4>
          <div class="hline-w"></div>
          <p>
            <a href="https://www.facebook.com/citybiblechurch.sermons/"><i class="lafa fa fa-facebook"></i></a>
            <a href="https://www.youtube.com/channel/UCNSWxSX7_JkK5z22qOrB4DA"><i class="lafa fa fa-youtube"></i></a>
          </p>
        </div>
        <div class="col-lg-4">
          <section id="newsletter">
          <div class="containers">
            <h4>Subscribe to our newsletter</h4>
            <div class="hline-w"></div>
            <input type="email" placeholder="Enter Email.."> <br><br>
              <button type="submit" class="btn button_1">Subscribe</button>
            </form>
          </div>
          </section>
        </div>
      
      </div><!--/row -->
    </div><!--/container -->
   </div><!--/footerwrap -->