@extends('layouts.admin.amaster')
@section('title','Mesaj Yeni ')


@section('description','Mesaj Yeni  sayfası')


@section('keywords','Mesaj Yeni  sayfası')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Mesaj Tablosu</h1>
                         
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}/admin">Anasayfa</a></li>
                            <li class="breadcrumb-item active"><a href="{{url('/')}}/admin/mesajlar">Mesaj  Listesi</a></li>
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
                                <h3 class="card-title">Mesaj  Listesi</h3>
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
                                    <th>Tel</th>
                                    <th>Konu</th>
                                    <th>Mesaj</th>
                                    <th>Durum</th>
                                    <th>Göster</th>
                                    <th>Sil</th>
                                    <th>Düzenle</th>
                                </tr>

                                @foreach($mesajlar as $mesaj)
                                    <tr>

                                        <td>{{$mesaj->Id}}</td>
                                        <td>{{$mesaj->Adsoy}}</td>
                                        <td>{{$mesaj->Email}}</td>
                                        <td>{{$mesaj->Tel}}</td>
                                        <td>{{$mesaj->Konu}}</td>
                                        <td>{{$mesaj->Mesaj}}</td>
                                        <td>{{$mesaj->Durum }}</td>
                                        <td class="center"><a class="btn btn-info btn-fill" href="{{url('/')}}/admin/mesaj/show/{{$mesaj->Id}}"> Göster </a></td>
                                        <td><a class="btn btn-info" href="{{url('/')}}/admin/mesaj/del/{{$mesaj->Id}}" onclick="return confirm('Silmek İstediğinize Emin misiniz?');">Sil</a></td>
                                        <td><a class="btn btn-info btn-fill" href="{{url('/')}}/admin/mesaj/edit/{{$mesaj->Id}}">Düzenle</a></td>

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