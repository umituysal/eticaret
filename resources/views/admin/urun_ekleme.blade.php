@extends('layouts.admin.amaster')
@section('title','Ürün ekleme ')


@section('description','Ürün ekleme  sayfası')


@section('keywords','Ürün ekleme  sayfası')
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
            <form role="form" action="{{url('/')}}/admin/urun/save" enctype="multipart/form-data"  method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label name="ad">Adı</label>
                        <input type="text" class="form-control" name="ad" id="ad" placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                        <label>Slider</label>
                        <select class="form-control" name="slider">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label name="ad">Stok</label>
                        <input class="form-control" name="adet"  placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori">
                            @foreach($kategori as $rs)
                                <option value="{{$rs->Id}}">{{$rs->adi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label name="fiyat">Fiyat</label>
                        <input  class="form-control" name="fiyat" placeholder="Fiyat Giriniz!">
                    </div>
                    <div class="form-group">
                        <label>Türü</label>
                        <select class="form-control" name="turu">
                            @foreach($turu as $rs)
                                <option value="{{$rs->Id}}">{{$rs->adi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="durum">
                        <option value="Evet">Evet</option>
                        <option value="Hayır">Hayır</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="form-control" rows="5" name="aciklama" placeholder="Aciklama Giriniz!"></textarea>
                        <script>
                            CKEDITOR.replace('aciklama');
                        </script>
                    </div>

                    <div class="form-group">
                        <label >Ürün Ana Resmi</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" value="{{csrf_token()}}" name="resim" >
                                <label class="custom-file-label" for="exampleInputFile"></label>
                            </div>

                        </div>
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