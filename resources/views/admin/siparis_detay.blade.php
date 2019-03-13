@extends('layouts.admin.amaster')
@section('title','Ürün düzenleme ')


@section('description','Ürün düzenleme  sayfası')


@section('keywords','Ürün düzenleme  sayfası')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ürün Tablosu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}/admin">Anasayfa</a></li>
                            <li class="breadcrumb-item active"><a href="{{url('/')}}/admin/siparisler">Siparis Listesi</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title" >Sipariş Detay Sayfası</h3>
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
            
            <form role="form" action="{{url('/')}}/admin/siparis_update/{{$siparis[0]->Id}}" enctype="multipart/form-data"  method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label name="ad">Adı</label>
                    <input type="text" class="form-control" value="{{$siparis[0]->adi}}" name="adi"  placeholder="Adı Giriniz!">
                    </div>

                    <div class="form-group">
                        <label >adres</label>
                        <input name="adres" class="form-control"  value="{{$siparis[0]->adres}}" >
                    </div>
                    <div class="form-group">
                        <label >il</label>
                        <input name="il" class="form-control"  value="{{$siparis[0]->il}}" >
                    </div>
                    <div class="form-group">
                        <label >ilce</label>
                        <input name="ilce" class="form-control"  value="{{$siparis[0]->ilce}}" >
                    </div>
                    <div class="form-group">
                        <label >tutar</label>
                        <input name="tutar" class="form-control"  value="{{$siparis[0]->tutar}}" >
                    </div>
                  
                    <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="durum">
                        <option value="{{$siparis[0]->durum}}">{{$siparis[0]->durum}}</option>
                            <option name="durum">Onaylandı</option>
                            <option  name="durum">Kargoda</option>
                            <option  name="durum">Tamamlandı</option>
                            <option  name="durum">İptal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="form-control" rows="5" value="{{$siparis[0]->aciklama}}" name="aciklama">{{$siparis[0]->aciklama}}</textarea>
                        <script>
                            CKEDITOR.replace('aciklama');


                        </script>
                    </div>

                   

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
            </form>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <tbody>

                <tr>
                    <th>Ürün Adı</th>
                    <th>Ürün Resmi</th>
                    <th>İsmi</th>
                    <th>Tutar</th>
                    <th>Durum</th>
                    <th>Siparis Tarihi</th>
                    <th>Düzenle</th>
                </tr>

                @foreach($urunler as $s)
                    <tr>

                        <td>{{$s->Ad}}</td>
                        <td><img src="{{url('/')}}/userfiles/{{$s->resim}}" height="30px" /></td>
                       
                        <td>{{$s->adi}}</td>
                        <td>{{$s->tutar}}</td>
                        <td>{{$s->durum }}</td>
                        <td>{{$s->created_at }}</td>
                        <td><a class="btn btn-info btn-fill" href="{{url('/')}}/admin/siparis_detay/{{$s->Id}}">İşlemler</a></td>

                    </tr>
                @endforeach
                </tbody></table>
        </div>

                    </div>
                </div>



@endsection
@section('java')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function(){

           CKEDITOR.replace('aciklama')
        })
    </script>
@endsection