@extends('layouts.front.fmaster')
@section('title',$data[0]->Title)


@section('description',$data[0]->Description)


@section('keywords',$data[0]->Keywords)

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
                <li aria-current="page" class="breadcrumb-item active">Ürünlerimiz</li>
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
          </div>
          <div class="col-lg-9">
           
   
                
           
                <div class="box">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h3>Ürünlerimiz</h3>
                <hr>
                <div class=" mt-5 row products">
                  @foreach ($urun as $u)
                      
                
                  <div class="col-lg-4 col-md-6">

                    <div class="product">
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
                        <p class="text-center buttons"><a href="{{url('/')}}/urun/{{$u->Id}}" class="ml-2 btn btn-outline-secondary"> Ürün Detayı</a>
                      </div>
                      <!-- /.text-->
                    </div>
                    <!-- /.product            -->
                    @endforeach
                  </div>
                 
                  <!-- /.products-->
                </div>
            
              <!-- /.col-lg-9-->
              <div class="pages">
                   <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination">
                      {!!$urun->render()!!}
                       </ul>
                  </nav>
                </div>
            
         
         
           
          </div>
          <!-- /.col-lg-9-->
        </div>
      </div>
    </div>
  </div>
  @endsection