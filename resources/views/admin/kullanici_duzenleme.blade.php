@extends('layouts.admin.amaster')
@section('title','Kullanici düzenleme ')


@section('description','Kullanici düzenleme  sayfası')


@section('keywords','Kullanici düzenleme  sayfası')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kullanici Tablosu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}/admin">Anasayfa</a></li>
                            <li class="breadcrumb-item active"><a href="{{url('/')}}/admin/kullanicilar">Kullanici Listesi</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title" >Kullanici Ekleme Formu</h3>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{url('/')}}/admin/kullanici/update/{{$kullanicilar[0]->id}}" enctype="multipart/form-data"  method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label name="ad">Adı</label>
                        <input type="text" class="form-control" value="{{$kullanicilar[0]->name}}" name="name"  placeholder="Adı Giriniz!">
                    </div>

                    <div class="form-group">
                        <label name="ad">Email</label>
                        <input type="text" class="form-control" value="{{$kullanicilar[0]->email}}" name="email"  placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                        <label name="ad">Rolü</label>
                        <input type="text" class="form-control" value="{{$kullanicilar[0]->role}}" name="role"  placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="durum">
                        <option value="{{$kullanicilar[0]->active}}">{{$kullanicilar[0]->active}}</option>
                            <option name="durum">true</option>
                            <option  name="durum">false</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label name="ad">Adres</label>
                        <input type="text" class="form-control" value="{{$kullanicilar[0]->adres}}" name="adres"  placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                        <label name="ad">İl</label>
                        <input type="text" class="form-control" value="{{$kullanicilar[0]->il}}" name="il"  placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                        <label name="ad">İlçe</label>
                        <input type="text" class="form-control" value="{{$kullanicilar[0]->il}}" name="ilce"  placeholder="Adı Giriniz!">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
            </form>
        </div>



                    </div>
                </div>



@endsection
@section('java')
    <script src="{{url('/')}}/assets/admin/assets/ckeditor/ckeditor.js"></script>
    <script>
        $(function(){

           CKEDITOR.replace('aciklama')
        })
    </script>
@endsection