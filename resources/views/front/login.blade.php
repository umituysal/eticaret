@extends('layouts.front.fmaster')
@section('title','Login sayfası')


@section('description','Login sayfası')


@section('keywords','Login sayfası')

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
              <li aria-current="page" class="breadcrumb-item active">Yeni Kullanıcı / Giriç Yap</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6">
          <div class="box">
            <h1>Yeni Kullanıcı</h1>
            @if(\Session::has('message'))
            <div class="alert alert-error">
                {{ \Session::get('message') }}
            </div>
        @endif
            <p class="lead">Üye değilseniz kayıt olunuz?</p>
            <p class="text-muted">Üye olmadığınız takdirde alışveriş işlemlerini yapamazsınız.Lütfen kayıt olunuz!</p>
            
            <hr>
            <form action="{{url('/')}}/register" method="post">
              @csrf
              <div class="form-group">
                <label for="name">Adı</label>
                <input id="name" required name="name" placeholder="Adınızı giriniz!" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" required name="email"  placeholder="Email adresinizi giriniz!" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Şifreniz</label>
                <input id="password" required name="password"  placeholder="Şifrenizi giriniz!" type="password" class="form-control">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Kayıt Ol!</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="box">
            <h1>Login</h1>
            @if(\Session::has('message'))
            <div class="alert alert-error">
                {{ \Session::get('message') }}
            </div>
        @endif
            <p class="lead">Üye olduysanız giriş yapınız?</p>
            <p class="text-muted">Üye olduğunuz takdirde ürün alışverişi yapabilirsiniz.</p>
            <hr>
          <form action="{{url('/')}}/login" method="post">
            @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" required name="email" placeholder="Email adresinizi giriniz!" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Şifreniz</label>
                <input id="password" required  name= "password"  placeholder="Şifrenizi giriniz!" type="password" class="form-control">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i>Giriş</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

