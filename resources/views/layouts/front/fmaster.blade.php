<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title')</title>
    <meta name="description" content="  @yield('description');">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/front/vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{url('/')}}/assets/front/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{url('/')}}/assets/front/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header mb-5">
      <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
      <div id="top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="{{url('/')}}/" class="ml-1"><b> Sitemize Hoşgeldiniz!</b></a></div>
            <div class="col-lg-6 text-center text-lg-right">
              <ul class="menu list-inline mb-0">
               @if(Auth::check())
              <li class="list-inline-item"><a href="{{url('/')}}/user" >{{Auth::user()->name}}</a></li>
               @else
               <li class="list-inline-item"><a href="{{url('/')}}/login" >Giriş</a></li>
               <li class="list-inline-item"><a href="{{url('/')}}/login ">Üye Ol</a></li>
               @endif
               
                <li class="list-inline-item"><a href="{{url('/')}}/hakkimizda">Hakkımızda</a></li>
                <li class="list-inline-item"><a href="{{url('/')}}/bizeyazin">İletişim</a></li>
              </ul>
            </div>
          </div>
        </div>
       
        <!-- *** TOP BAR END ***-->
        
        
      </div>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a href="{{url('/')}}/" class="navbar-brand home"><img height="100px" weight="100px" src="{{url('/')}}/userfiles/images.png" alt="Obaju logo" class="d-none d-md-inline-block">
            <img src="img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none">
            <span class="sr-only">Obaju - go to homepage</span></a>
         
    
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">

              <?php
              $home=null;
              $hakkimizda=null;
              $iletisim=null;
              $urunlerimiz=null;
              if($menu=='home')
              $home='active';
              elseif($menu=='hakkimizda')
              $hakkimizda='active';
              elseif($menu=='urunlerimiz')
              $urunlerimiz='active';
              elseif($menu=='iletisim')
              $iletisim='active';
              elseif($menu=='uye')
              $uye='active';
              ?>
              <li class="nav-item"><a href="{{url('/')}}/" class=" nav-link {{$home}}">Anasayfa</a></li>
              <li class="nav-item"><a href="{{url('/')}}/urunlerimiz"  data-delay="200" class=" nav-link {{$urunlerimiz}}">ÜrünleRİMİZ<b class="caret"></b></a>
              </li>
              <li class="nav-item"><a href="{{url('/')}}/hakkimizda"  data-delay="200" class=" nav-link {{$hakkimizda}}">Hakkımızda<b class="caret"></b></a>
              </li>
              <li class="nav-item"><a href="{{url('/')}}/bizeyazin"  data-delay="200" class=" nav-link {{$iletisim}}">İLETİŞİM<b class="caret"></b></a>
              </li>
              
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
              <!-- /.nav-collapse-->
              <div id="search-not-mobile" class="navbar-collapse collapse"><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
              </div>
                <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">
                  @if ($sepetsay[0]->Id == 0 && Auth::check())
                  <span  class="btn btn-primary navbar-btn"> <i class="fa fa-shopping-cart">Sepette Ürün Yok</i> </span> 
                 
                  @elseif($sepetsay[0]->Id != 0 && !Auth::check())
                  <a href="{{url('/')}}/"> <span  class="btn btn-primary navbar-btn"> <i class="fa fa-shopping-cart">Sepette Ürün Yok</i> </span> </a>
                  @else
                @if ($sepetsay[0]->Id == 0)
                <a href="{{url('/')}}/sepetim" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i>
                  <span>
                    Sepette ürün yok</span></a> 
                    
                  @else  
                  <a href="{{url('/')}}/sepetim" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i>
                    <span>
                      {{$sepetsay[0]->Id}} adet ürün var</span></a> 
                    @endif 
                  @endif
              
                </div>  </div>
          </div>
        </div>
      </nav>
      <div id="search" class="collapse">
        <div class="container">
        <form action="{{url('/')}}/search"  role="search" class="ml-auto">
      
          @csrf
            <div class="input-group">
              <input type="text" name="query" id="query" placeholder="Search" class="form-control">
              <div class="input-group-append">
                <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    
            <div class="navbar-buttons d-flex justify-content-end">
              <!-- /.nav-collapse-->
              
            
            </div>
          </div>
        </div>
      </nav>
     
    </header>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
@yield('slider')
          </div>
        </div>
        @yield('content')
      </div>
    </div>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    <div id="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Sayfalar</h4>
            <ul class="list-unstyled">
              <li><a href="{{url('/')}}/">Anasayfa</a></li>
              <li><a href="{{url('/')}}/urunlerimiz">Ürünlerimiz</a></li>
              <li><a href="{{url('/')}}/hakkimizda">Hakkımızda</a></li>
              <li><a href="{{url('/')}}/bizeyazin">İletişim</a></li>
            </ul>
            @if(Auth::check())
            <hr>
            <h4 class="mb-3">Hesabım</h4>
            <ul class="list-unstyled">
            <li class="list-inline-item"><a href="{{url('/')}}/user" >{{Auth::user()->name}}</a></li>
          </ul>
             @else
             <hr>
             <h4 class="mb-3">Üye İşlemleri</h4>
             <ul class="list-unstyled">
             <li ><a href="{{url('/')}}/login" >Giriş</a></li>
             <li ><a href="{{url('/')}}/login ">Üye Ol</a></li>
             </ul>
             @endif
            
           
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <h4 >Kategoriler</h4>
           
            <ul class="list-unstyled">
                @foreach ($kategoriler as $item)
                    
               
                <li><a href="{{url('/')}}/urunlerim/{{$item->Id}}" class="nav-link">{{$item->adi}}</a></li>
                  @endforeach
                </ul>
           
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Buradayız</h4>
            <p><strong>{{$data[0]->Adres}}</strong><br>{{$data[0]->Sehir}}<br>{{$data[0]->Tel}}<br>{{$data[0]->Fax}}<br>{{$data[0]->Email}}<br><strong>{{$data[0]->Kisi}}</strong></p>
            <hr class="d-block d-md-none">
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-3 col-md-6">
            <h4 class="mb-3">Teşekkür</h4>
            <p class="text-muted">{{$data[0]->Description}}</p>
        
            <hr>
            <h4 class="mb-3">Takipte Kalın!</h4>
            <p class="social"><a href="{{$data[0]->facebook}}" class="facebook external"><i class="fa fa-facebook"></i></a><a href="{{$data[0]->instagram}}" class="instagram external"><i class="fa fa-instagram"></i></a></p>
          </div>
          <!-- /.col-lg-3-->
        </div>
        <!-- /.row-->
      </div>
      <!-- /.container-->
    </div>
    <!-- /#footer-->
    <!-- *** FOOTER END ***-->
    
    
    <!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
    <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-2 mb-lg-0">
            <p class="text-center text-lg-left">©2019 Ümit Uysal tarafından yapılmıştır.</p>
          </div>
         
        </div>
      </div>
    </div>
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="{{url('/')}}/assets/front/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('/')}}/assets/front/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="{{url('/')}}/assets/front/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/assets/front/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="{{url('/')}}/assets/front/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="{{url('/')}}/assets/front/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="{{url('/')}}/assets/front/js/front.js"></script>
  </body>
</html>