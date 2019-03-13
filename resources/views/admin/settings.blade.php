@extends('layouts.admin.amaster')
@section('title','Site ayar düzenleme ')


@section('description','Site ayar sayfası')


@section('keywords','Site ayar  sayfası')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ayar Tablosu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}/admin">Anasayfa</a></li>
                            <li class="breadcrumb-item active"><a href="{{url('/')}}/admin/settings">Ayar Listesi</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title" >Ayar Düzenleme Formu</h3>
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
        <form role="form" action="{{url('/')}}/admin/settingsupdate/{{$data[0]->Id}}" enctype="multipart/form-data"  method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label name="ad">Site Adı</label>
                        <input type="text" class="form-control" value="{{$data[0]->Siteadi}}" name="Siteadi"  placeholder="Adı Giriniz!">
                    </div>

                    <div class="form-group">
                        <label>Keywords</label>
                        <input name="Keywords" class="form-control"  value="{{$data[0]->Keywords}}" >
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <input name="Description" class="form-control" value="{{$data[0]->Description}}" >
                    </div>
                    <div class="form-group">
                        <label>Şirket Adı</label>
                        <input name="Sirketadi" class="form-control" value="{{$data[0]->Sirketadi}}" >
                    </div>
                    <div class="form-group">
                        <label>SmtpServer</label>
                        <input name="smtpserver" class="form-control" value="{{$data[0]->smtpserver}}" >
                    </div>
                    <div class="form-group">
                        <label>SmtpPort</label>
                        <input name="smtpport" class="form-control" value="{{$data[0]->smtpport}}" >
                    </div>
                    <div class="form-group">
                        <label>SmtpEmail</label>
                        <input name="smtpemail" class="form-control" value="{{$data[0]->smtpemail}}" >
                    </div>
                    <div class="form-group">
                        <label >Sifre</label>
                        <input name="Sifre" class="form-control" value="{{$data[0]->Sifre}}" >
                    </div>
                    <div class="form-group">
                        <label >Adres</label>
                        <input name="Adres" class="form-control" value="{{$data[0]->Adres}}" >
                    </div>
                    <div class="form-group">
                        <label >Şehir</label>
                        <input name="Sehir" class="form-control" value="{{$data[0]->Sehir}}" >
                    </div>
                    <div class="form-group">
                        <label>Tel</label>
                        <input name="Tel" class="form-control" value="{{$data[0]->Tel}}" >
                    </div>
                    <div class="form-group">
                        <label>Fax</label>
                        <input name="Fax" class="form-control" value="{{$data[0]->Fax}}" >
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input name="Email" class="form-control" value="{{$data[0]->Email}}" >
                    </div>
                 
                    <div class="form-group">
                        <label>Hakkımızda</label>
                        <textarea class="form-control" rows="5" value="{{$data[0]->Hakkimizda}}" name="hakkimizda" placeholder="">{{$data[0]->Hakkimizda}}</textarea>
                        <script>
                            CKEDITOR.replace('hakkimizda');


                        </script>
                    </div>
                    <div class="form-group">
                        <label>İletişim</label>
                        <textarea class="form-control" rows="5" value="{{$data[0]->İletisim}}" name="iletisim" placeholder="">{{$data[0]->İletisim}}</textarea>
                        <script>
                            CKEDITOR.replace('iletisim');


                        </script>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input name="Title" class="form-control" value="{{$data[0]->Title}}" >
                    </div>
                    <div class="form-group">
                        <label>Kisi</label>
                        <input name="Kisi" class="form-control" value="{{$data[0]->Kisi}}" >
                    </div>
                    <div class="form-group">
                        <label>facebook</label>
                        <input name="facebook" class="form-control" value="{{$data[0]->facebook}}" >
                    </div>
                    <div class="form-group">
                        <label >instagram</label>
                        <input name="instagram" class="form-control" value="{{$data[0]->instagram}}" >
                    </div>
                    <div class="form-group">
                        <label >twitter</label>
                        <input name="twitter" class="form-control" value="{{$data[0]->twitter}}" >
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
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function(){

           CKEDITOR.replace('hakkimizda')
           CKEDITOR.replace('iletisim')
        })
    </script>
@endsection