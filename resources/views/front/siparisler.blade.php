@extends('layouts.front.fmaster')
@section('title','Sepet sayfası')


@section('description','Sepet sayfası')


@section('keywords','Sepet sayfası')

@section('content')

<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li aria-current="page" class="breadcrumb-item active">Siparişler</li>
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
                    <li><a href="{{url('/')}}/user/profile{{Auth::user()->Id}}" class="nav-link">Kullanıcı Profili</a></li>
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
              @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
              <p class="text-muted">Siparişleriniz.</p>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Ürün Adı</th>
                      <th>Tarih</th>
                      <th>Tutar</th>
                      <th colspan="2">Durum</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                  
                @foreach ($siparis as $urun)
                 
                    <tr>
           
                    
                    <td>{{$urun->adi}}</td>
                      <td>
                        {{$urun->created_at}}
                      </td>
                  
                      <td>{{$urun->tutar}}</td>
                      <td>{{$urun->durum}}</td>
                    <td><button class="btn btn-danger" ><a  href="{{url('/')}}/siparis_detay/{{$urun->Id}}">Detay</a></button></td>
                     
                    </tr>
                   
                    @endforeach
                   
                  </tbody>
                 
                </table>
              </div>
              <!-- /.table-responsive-->
              <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                  <div class="right">
         
                </div>
              </div>
          
          </div>
        
      </div>
    </div>
      
  </div>
</div>
@endsection

