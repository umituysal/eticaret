@extends('layouts.front.fmaster')
@section('title','Bize Yazın sayfası')


@section('description','Bize Yazın sayfası')


@section('keywords','Bize Yazın sayfası')

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
                <li aria-current="page" class="breadcrumb-item active">İletişim</li>
              </ol>
            </nav>
          </div>
         
          <div class="col-lg-12">
              @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
            <div id="contact" class="box">
              <h1>İletişim</h1>
              <p class="lead">Herhangi bir problem ile karşır yada iletmek istediğiniz mesajlarınızı aşağıdaki yollarla ulaşabilirsiniz.</p>
              <p>7/24 açığız.</p>
              <hr>
              <div class="row">
                <div class="col-md-4">
                  <h3><i class="fa fa-map-marker"></i>Adresimiz</h3>
                  <p>{{$data[0]->Adres}}<br>{{$data[0]->Sehir}}<br>{{$data[0]->Tel}}<br>{{$data[0]->Fax}}<br><strong>{{$data[0]->Kisi}}</strong></p>
                </div>
                <!-- /.col-sm-4-->
                <div class="col-md-4">
                  <h3><i class="fa fa-phone"></i> Telefonumuz </h3>
                  <p class="text-muted">Bu telefon numarasını 7/24 arayabilirsiniz.</p>
                  <p><strong>+33 555 444 333</strong></p>
                </div>
                <!-- /.col-sm-4-->
                <div class="col-md-4">
                  <h3><i class="fa fa-envelope"></i> Email Adresimiz</h3>
                  <p class="text-muted">Herhangi bir mesajınızı email adresimize yollayarak iletebilirsiniz.</p>
                  <ul>
                    <li><strong><a href="mailto:">umituysal48@hotmail.com</a></strong></li>
                  
                  </ul>
                </div>
                <!-- /.col-sm-4-->
              </div>
              <!-- /.row-->
              <hr>
              <div id="map"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d409301.2749672039!2d27.422316465139552!3d36.73057696407833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14be253d5f29b769%3A0x6fba74f01397d62c!2s48900+Dat%C3%A7a%2FMu%C4%9Fla+Province!5e0!3m2!1sen!2str!4v1549806789277" width="1070" height="400" frameborder="0" style="border:0" allowfullscreen></iframe></div>
              <hr>
              <h2>Bize Yazın</h2>
            <form action="{{url('/')}}/bizeyazin" method="POST">
              @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="firstname">Adı Soyadı</label>
                      <input required name="adsoy" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="lastname">Telefon Numarası</label>
                      <input required name="tel" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email Adresi</label>
                      <input required name="email" type="email" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="subject">Konu</label>
                      <input required name="konu" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="message">Mesaj</label>
                      <textarea required  name="mesaj" class=" form-control"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Gönder</button>
                  </div>
                </div>
                <!-- /.row-->
              </form>
            </div>
          </div>
          <!-- /.col-md-9-->
          
        </div>
      </div>
    </div>
  </div>
  <!--
@endsection

