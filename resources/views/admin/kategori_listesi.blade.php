@extends('layouts.admin.amaster')
@section('title','kullanici Listesi ')


@section('description','kullanici listesi  sayfası')


@section('keywords','kullanici listesi  sayfası')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kullanici Tablosu</h1>
                          <a href="{{url('/')}}/admin/kategori/ekle"> <button type="button" class="btn  btn-primary">Kategori Ekle</button></a>
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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kullanici Listesi</h3>
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
                                        <th>Üst Id</th>
                                        <th>Durum</th>
                                        <th>Göster</th>
                                        <th>Sil</th>
                                        <th>Düzenle</th>
                                    </tr>

                                    @foreach($kategoriler as $kategori)
                                        <tr>

                                            <td>{{$kategori->Id}}</td>
                                            <td>{{$kategori->adi}}</td>
                                            <td>{{$kategori->parent_Id}}</td>
                                            <td>{{$kategori->Durum }}</td>
                                            <td class="center"><a class="btn btn-info btn-fill" href="{{url('/')}}/admin/kategori/show/{{$kategori->Id}}"> Göster </a></td>
                                            <td><a class="btn btn-info" href="{{url('/')}}/admin/kategori/del/{{$kategori->Id}}" onclick="return confirm('Silmek İstediğinize Emin misiniz?');">Sil</a></td>
                                            <td><a class="btn btn-info btn-fill" href="{{url('/')}}/admin/kategori/edit/{{$kategori->Id}}">Düzenle</a></td>

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