@extends('layouts.front.fmaster')
@section('title','Hesabım sayfası')


@section('description','Hesabım sayfası')


@section('keywords','Hesabım sayfası')

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
              <li aria-current="page" class="breadcrumb-item active">Hesabım</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-3">
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">{{Auth::user()->name}}</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column category-menu">
              
                  <ul class="list-unstyled">
                    <li><a href="{{url('/')}}/profil/{{Auth::user()->Id}}" class="nav-link">Kullanıcı Profili</a></li>
                    <li><a href="{{url('/')}}/sepetim" class="nav-link">Sepetim</a></li>
                    <li><a href="{{url('/')}}/siparisler" class="nav-link">Siparişlerim</a></li>
                    <li><a href="{{url('/')}}/logout" class="nav-link">Çıkış</a></li>
                  </ul>
              
              
              </ul>
            </div>
          </div>
        
          
    </div>
    <div id="basket" class="col-lg-9">
        <div class="box">
    <h2 class="center">Hesabım</h2>
   <p>Hesabınızdaki bilgilere buradan erişebilirsiniz</p>
  </div>
  
</div>
  </div>
</div>
  </div>
</div>
@endsection

