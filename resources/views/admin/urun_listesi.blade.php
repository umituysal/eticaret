@extends('layouts.admin.amaster')
@section('title','Ürün Listesi ')


@section('description','Ürün listesi  sayfası')


@section('keywords','Ürün listesi  sayfası')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ürün Tablosu</h1>
                          <a href="{{url('/')}}/admin/urun/ekle"> <button type="button" class="btn  btn-primary">Ürün Ekle</button></a>
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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ürün Listesi</h3>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>

                                    <tr><th>ID</th>
                                        <th>Ad</th>
                                        <th>Stok</th>
                                        <th>Fiyat</th>
                                        <th>Slider</th>
                                        <th>Kategori</th>
                                        <th>Türü</th>
                                        <th>Resim</th>
                                        <th>Durum</th>
                                        <th>Göster</th>
                                        <th>Sil</th>
                                        <th>Düzenle</th>
                                    </tr>

                                    @foreach($urunler as $urun)
                                        <tr>

                                            <td>{{$urun->Id}}</td>
                                            <td>{{$urun->Ad}}</td>
                                            <td>{{$urun->Adet}}</td>
                                            <td>{{$urun->Fiyat}}</td>
                                            <td>{{$urun->Slider}}</td>
                                            <td>{{$urun->kat }}</td>
                                            <td>{{$urun->tur }}</td>

                                            <td><img src="{{url('/')}}/userfiles/{{$urun->Resim}}" height="30px" /><a href="{{url('/')}}/admin/urun/galeri/{{$urun->Id}}">Galeri Ekle</a></td>

                                            <td>{{$urun->Durum}}</td>

                                            <td class="center"><a class="btn btn-info btn-fill" href="{{url('/')}}/admin/urun/show/{{$urun->Id}}"> Göster </a></td>
                                            <td><a class="btn btn-info" href="{{url('/')}}/admin/urun/del/{{$urun->Id}}" onclick="return confirm('Silmek İstediğinize Emin misiniz?');">Sil</a></td>
                                            <td><a class="btn btn-info btn-fill" href="{{url('/')}}/admin/urun/edit/{{$urun->Id}}">Düzenle</a></td>

                                        </tr>
                                    @endforeach
                                    </tbody></table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection