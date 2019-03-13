@extends('layouts.front.fmaster')
@section('title','Profil sayfası')


@section('description','Profil  sayfası')


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
                <li class="breadcrumb-item"><a href="{{url('/')}}/">Anasayfa</a></li>
                <li aria-current="page" class="breadcrumb-item active">Profil Bilgileri</li>
              </ol>
            </nav>
          </div>
    
          <div id="checkout" class="col-lg-12">
            <div class="box">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
              <form method="post" action="{{url('/')}}/profil/{{$user[0]->id}}">
                @csrf
                  <h1>Bilgileriniz</h1>
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label >Adı Soyadı</label>
                        <input name="name" value="{{$user[0]->name}}" type="text" class="form-control">
                       
                        </div>
                      </div>
                     
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Telefon Numarası </label>
                        <input name="tel"  value="{{$user[0]->tel}}" type="text" class="form-control">
                      </div>
                    </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="company">Adres</label>
                          <input name="adres" value="{{$user[0]->adres}}" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="street">İl </label>
                          <input name="il"  value="{{$user[0]->il}}" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="street">İlçe </label>
                            <input name="ilce"  value="{{$user[0]->ilce}}" type="text" class="form-control">
                          </div>
                        </div>
                 
               
                 
               
                </div>
                  
                  <!-- /.row-->
                </div>
                <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="{{url('/')}}/user" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Geri Dön</a></div>
                    <div class="right">
                    
                   
                     
                      <button type="submit" class=" btn btn-primary">Güncelle</button>
                  
                    </div>
               
              </form>
             
            </div>
            <!-- /.box-->
          </div>
          <!-- /.col-lg-9-->
          
          <!-- /.col-lg-3-->
        </div>
       
      </div>
    </div>
  </div>
@endsection

