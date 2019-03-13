
@extends('layouts.front.fmaster')
@section('title','Ürün Detay Sayfası')
@section('description','Ürün Detay Sayfası')
@section('keywords','Ürün Detay Sayfası')
@section('content')
<div id="all">
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}/">Anasayfa</a></li>
                <li class="breadcrumb-item"><a href="{{url('/')}}/urunlerimiz">Ürünlerimiz</a></li>
                <li class="breadcrumb-item"><a href="{{url('/')}}/urun/{{$urun[0]->Id}}">{{$urun[0]->Ad}}</a></li>
                
              </ol>
            </nav>
            
          </div>
          
          <div class="col-lg-3">
            <!--
            *** MENUS AND FILTERS ***
            _________________________________________________________
            -->
            <div class="card sidebar-menu mb-4">
              <div class="card-header">
                <h3 class="h4 card-title">Kategoriler</h3>
              </div>
              <div class="card-body">
                <ul class="nav nav-pills flex-column category-menu">
                  <li><a href="#" class="nav-link">Elektronİk <span class="badge badge-secondary">{{$count[0]->Id}}</span></a>
                    <ul class="list-unstyled">
                    @foreach ($kategoriler as $item)
                        
                   
                    <li><a href="{{url('/')}}/urunlerim/{{$item->Id}}" class="nav-link">{{$item->adi}}</a></li>
                      @endforeach
                    </ul>
                  </li>
                 
                </ul>
              </div>
            </div>
           
            <!-- *** MENUS AND FILTERS END ***-->
            <div class="banner"><a href="#"><img src="{{url('/')}}/userfiles/5.jpg" alt="sales 2014" class="img-fluid"></a></div>
            <div class="banner"><a href="#"><img src="{{url('/')}}/userfiles/5.jpg" alt="sales 2014" class="img-fluid"></a></div>
          </div>
       
      
          <div class="col-lg-9">
            <div id="productMain" class="row">
              <div class="col-md-6">
                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                
              
                    @foreach ($resimler as $rs)
                  <div class="item"> 
                    
                    <img src="{{url('/')}}/userfiles/{{$rs->resim}}" alt="" class="img-fluid">
                  
                  </div>
                  @endforeach
              
                </div>
              
                <!-- /.ribbon-->
                <div class="ribbon new">
                  <div class="theribbon">YENİ</div>
                  <div class="ribbon-background"></div>
                </div>
                <!-- /.ribbon-->
              </div>
              <div class="col-md-6">
              <form action="{{url('/')}}/sepete_ekle" method="POST">
                @csrf
                <div class="box">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                  <h3 class="text-center">{{$urun[0]->Ad}}</h3>
                  <p class="goToDescription"><a href="#details" name="aciklama" class="scroll-to"></a></p>
                  <p class="price" name="fiyat"><b>Fiyat:</b> {{$urun[0]->Fiyat }} TL</p>
                 <p class="text-center" ><b> Adet: </b><input type="number" width="2" name="adet" value="1" max="{{$urun[0]->Adet}}"> </p>
                 <input type="hidden" name="urunid" value="{{$urun[0]->Id}}">
                  <p class="text-center buttons"><button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart">Sepete Ekle</button></i></p>
                  <div class="col-lg-12">
                </div>
               </form>
                <div data-slider-id="1" class="owl-thumbs">
                    @foreach ($resimler as $rs)
                  <button class="owl-thumb-item"> <img src="{{url('/')}}/userfiles/{{$rs->resim}}" alt="" class="img-fluid"></button>
                  @endforeach
                </div>
              </div>
            </div>
            <div id="details" class="box">
              <p></p>
              <h4>Product details</h4>
              <p>{!!$urun[0]->Aciklama!!}</p>
            
            </div>
            <div class="row same-height-row">
              <div class="col-lg-12 ">
                <div class="box">
                  <h3>Benzer Ürünlerimiz</h3>
                </div>
              </div>
              @foreach ($urunlerim as $u)
              <div class="col-lg-3 col-md-6">
                <div class="product same-height">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="{{url('/')}}/urun/{{$u->Id}}"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="{{url('/')}}/urun/{{$u->Id}}"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a></div>
                  </div>
                </div><a href="{{url('/')}}/urun/{{$u->Id}}" class="invisible"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a>
                <div class="text">
                    <h3><a href="{{url('/')}}/urun/{{$u->Id}}">{{$u->Ad}}</a></h3>
                    <p class="price">
                        <del></del>{{$u->Fiyat}} TL
                    </p>
                </div>
                </div>
                <!-- /.product-->
              </div>
              @endforeach
             
             
            </div>
            <div class="row same-height-row">
              <div class="col-lg-12">
                <div class="box ">
                  <h3>Çok Satan Ürünlerimiz</h3>
                </div>
              </div>
              @foreach ($urunleri as $u)
              <div class="col-lg-3 ">
                <div class="product same-height">
                  <div class="flip-container">
                    <div class="flipper">
                      <div class="front"><a href="{{url('/')}}/urun/{{$u->Id}}"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="{{url('/')}}/urun/{{$u->Id}}"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a></div>
                  </div>
                </div><a href="{{url('/')}}/urun/{{$u->Id}}" class="invisible"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a>
                <div class="text">
                    <h3><a href="{{url('/')}}/urun/{{$u->Id}}">{{$u->Ad}}</a></h3>
                    <p class="price">
                        <del></del>{{$u->Fiyat}} TL
                    </p>
                </div>
                </div>
                <!-- /.product-->
              </div>
              @endforeach
             
             
            </div>
          </div>
@endsection