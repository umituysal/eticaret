@extends('layouts.admin.amaster')
@section('title','Kullanıcılar Listesi ')


@section('description','Kullanıcılar listesi  sayfası')


@section('keywords','Kullanıcılar listesi  sayfası')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kullanici Tablosu</h1>
                          <a href="{{url('/')}}/admin/kullanici/ekle"> <button type="button" class="btn  btn-primary">Kullanici Ekle</button></a>
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
                                <h3 class="card-title">Kullanıcılar Listesi</h3>
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
                                        <th>Email</th>
                                        <th>Rolü</th>
                                        <th>Rolü</th>
                                        <th>Adres</th>
                                        <th>Tel</th>
                                        <th>İl</th>
                                        <th>İlçe</th>
                                        <th>Eklenme Tarihi</th>
                                        <th>Güncelleme Tarihi</th>
                                        <th>Durum</th>
                                        <th>Göster</th>
                                        <th>Sil</th>
                                        <th>Düzenle</th>
                                    </tr>

                                    @foreach($kullanicilar as $kullanici)
                                        <tr>

                                            <td>{{$kullanici->id}}</td>
                                            <td>{{$kullanici->name}}</td>
                                            <td>{{$kullanici->email}}</td>
                                            <td>{{$kullanici->password}}</td>
                                            <td>{{$kullanici->role}}</td>
                                            <td>{{$kullanici->adres}}</td>
                                            <td>{{$kullanici->tel}}</td>
                                            <td>{{$kullanici->il }}</td>
                                            <td>{{$kullanici->ilce }}</td>
                                            <td>{{$kullanici->created_at}}</td>
                                            <td>{{$kullanici->updated_at}}</td>

                                        

                                            <td>{{$kullanici->active}}</td>

                                            <td class="center"><a class="btn btn-info btn-fill" href="{{url('/')}}/admin/kullanici/show/{{$kullanici->id}}"> Göster </a></td>
                                            <td><a class="btn btn-info" href="{{url('/')}}/admin/kullanici/del/{{$kullanici->id}}" onclick="return confirm('Silmek İstediğinize Emin misiniz?');">Sil</a></td>
                                            <td><a class="btn btn-info btn-fill" href="{{url('/')}}/admin/kullanici/edit/{{$kullanici->id}}">Düzenle</a></td>

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