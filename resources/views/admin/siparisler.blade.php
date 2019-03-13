@extends('layouts.admin.amaster')
@section('title','Siparis Yeni ')


@section('description','Siparis Yeni  sayfası')


@section('keywords','Siparis Yeni  sayfası')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Siparis Tablosu</h1>
                         
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}/admin">Anasayfa</a></li>
                            <li class="breadcrumb-item active"><a href="{{url('/')}}/admin/siparisler">Siparis {{$durum}}  Listesi</a></li>
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
                                <h3 class="card-title">Siparis {{$durum}} Listesi</h3>
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

                                    <tr>
                                   
                                      
                                        <th>İsmi</th>
                                        <th>Tutar</th>
                                        <th>Durum</th>
                                        <th>Siparis Tarihi</th>
                                        <th>Düzenle</th>
                                    </tr>

                                    @foreach($siparis as $s)
                                        <tr>

                                           
                                            <td>{{$s->adi}}</td>
                                            <td>{{$s->tutar}}</td>
                                            <td>{{$s->durum }}</td>
                                            <td>{{$s->created_at }}</td>
                                            <td><a class="btn btn-info btn-fill" href="{{url('/')}}/admin/siparis_detay/{{$s->Id}}">Detay</a></td>

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