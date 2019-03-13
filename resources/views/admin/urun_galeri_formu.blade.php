@extends('layouts.admin.amaster')
@section('title','Galeri düzenleme ')


@section('description','Galeri düzenleme  sayfası')


@section('keywords','Galeri düzenleme  sayfası')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ürün galeri Tablosu</h1>
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
                <h3 class="card-title" >Ürün galeri Ekleme Formu</h3>
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
            <form role="form" action="{{url('/')}}/admin/urun/galeri/{{$veri[0]->Id}}" enctype="multipart/form-data"  method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label name="ad">Adı</label>
                        <input type="text" class="form-control" value="{{$veri[0]->Ad}}" name="ad" id="ad" placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                            <p><strong>Ürün Resmi aşağıdaki gibidir</strong> </p>
                            <img src="{{url('/')}}/userfiles/{{$veri[0]->Resim}}" height="100">
                            <hr>
                        <label >Ürün galeri Resmi</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="hidden" class="custom-file-input" value="{{$veri[0]->Id}}"  name="id" >
                                <input type="file" class="custom-file-input"    name="resim" >
                                <label class="custom-file-label" for="exampleInputFile"></label>
                            </div>
                        </div>
                       
            
                        @foreach($resimler as $rs)
                        <img src="{{url('/')}}/userfiles/{{$rs->resim}}" height="100">
                        <a class="btn btn-info" href="{{url('/')}}/admin/urun/galerisil/{{$rs->Id}}" onclick="return confirm('Silmek İstediğinize Emin misiniz?');">Sil</a>
                         @endforeach
                        
                        
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