@extends('layouts.admin.amaster')
@section('title','kullanici ekleme ')


@section('description','kullanici ekleme  sayfası')


@section('keywords','kullanici ekleme  sayfası')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kullanıcı Tablosu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}/admin">Anasayfa</a></li>
                            <li class="breadcrumb-item active"><a href="{{url('/')}}/admin/kullanicilar">Kullanıcı Listesi</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title" >Kullanıcı Ekleme Formu</h3>
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
            <form role="form" action="{{url('/')}}/admin/kullanici/save" enctype="multipart/form-data"  method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label name="ad">Adı</label>
                        <input type="text" class="form-control" name="name"  placeholder="Adı Giriniz!">
                    </div>

                    <div class="form-group">
                        <label name="ad">Email</label>
                        <input type="text" class="form-control" name="email"  placeholder="Email Giriniz!">
                    </div>
                    <div class="form-group">
                        <label name="ad">Şifre</label>
                        <input type="password" class="form-control" name="password"  placeholder="Şifre Giriniz!">
                    </div>
                    <div class="form-group">
                        <label>Rolü</label>
                        <select class="form-control" name="role">
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="durum">
                        <option value="true">true</option>
                        <option value="false">false</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label name="ad">Adres</label>
                        <input type="text" class="form-control" name="adres"  placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                        <label name="ad">İl</label>
                        <input type="text" class="form-control" name="il"  placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                        <label name="ad">İlçe</label>
                        <input type="text" class="form-control" name="ilce"  placeholder="Adı Giriniz!">
                    </div>
                  
                   




                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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