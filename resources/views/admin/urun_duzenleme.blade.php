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
                            <li class="breadcrumb-item active"><a href="{{url('/')}}/admin/urunler">Ürün Listesi</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title" >Ürün Ekleme Formu</h3>
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
            <form role="form" action="{{url('/')}}/admin/urun/update/{{$data[0]->Id}}" enctype="multipart/form-data"  method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label name="ad">Adı</label>
                        <input type="text" class="form-control" value="{{$data[0]->Ad}}" name="ad" id="ad" placeholder="Adı Giriniz!">
                    </div>

                    <div class="form-group">
                        <label name="adet">Stok</label>
                        <input name="adet" class="form-control"  value="{{$data[0]->Adet}}" >
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" >
                            <option value="{{$data[0]->kategori_id}}">{{$data[0]->kat}}</option>
                            @foreach($kategoriler as $rs)
                                <option value="{{$rs->Id}}">{{$rs->adi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label name="fiyat">Fiyat</label>
                        <input name="fiyat" class="form-control" value="{{$data[0]->Fiyat}}" >
                    </div>
                    <div class="form-group">
                        <label>Türü</label>
                        <select class="form-control" name="turu">
                            <option value="{{$data[0]->turu}}">{{$data[0]->tur}}</option>

                            @foreach($turler as $rs)
                                <option value="{{$rs->Id}}">{{$rs->adi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="durum">
                        <option value="{{$data[0]->Durum}}">{{$data[0]->Durum}}</option>
                            <option name="durum">Evet</option>
                            <option  name="durum">Hayır</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="form-control" rows="5" value="{{$data[0]->Aciklama}}" name="aciklama" placeholder="Aciklama Giriniz!">{{$data[0]->Aciklama}}</textarea>
                        <script>
                            CKEDITOR.replace('aciklama');


                        </script>
                    </div>

                    <div class="form-group">
                        <label >Ürün Ana Resmi</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="hidden" class="custom-file-input" value="{{$data[0]->Resim}}" name="resim2" >
                                <input type="file" class="custom-file-input"  name="resim" >
                                <label class="custom-file-label" for="exampleInputFile"></label>
                            </div>

                        </div>
                        <p><strong>Ürün Resmi aşağıdaki gibidir</strong> </p>
                        <img src="{{url('/')}}/userfiles/{{$data[0]->Resim}}" height="100">
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

           CKEDITOR.replace('aciklama')
        })
    </script>
@endsection