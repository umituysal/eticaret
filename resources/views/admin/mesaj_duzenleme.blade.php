@extends('layouts.admin.amaster')
@section('title','Mesaj düzenleme ')


@section('description','Mesaj düzenleme  sayfası')


@section('keywords','Mesaj düzenleme  sayfası')
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
                            <li class="breadcrumb-item active"><a href="{{url('/')}}/admin/mesajlar">Mesaj Listesi</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title" >Mesaj Ekleme Formu</h3>
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
            <form role="form" action="{{url('/')}}/admin/mesaj/update/{{$mesajlar[0]->Id}}" enctype="multipart/form-data"  method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label name="ad">Adı</label>
                        <input type="text" class="form-control" value="{{$mesajlar[0]->Adsoy}}" name="ad"  placeholder="Adı Giriniz!">
                    </div>

                    <div class="form-group">
                        <label name="ad">Email</label>
                        <input type="text" class="form-control" value="{{$mesajlar[0]->Email}}" name="email"  placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                        <label name="ad">Tel</label>
                        <input type="text" class="form-control" value="{{$mesajlar[0]->Tel}}" name="tel"  placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                        <label name="ad">Konu</label>
                        <input type="text" class="form-control" value="{{$mesajlar[0]->Konu}}" name="konu"  placeholder="Adı Giriniz!">
                    </div>
                    <div class="form-group">
                        <label>Mesaj</label>
                        <textarea class="form-control" rows="5" value="{{$mesajlar[0]->Mesaj}}" name="mesaj" placeholder="">{{$mesajlar[0]->Mesaj}}</textarea>
                        <script>
                            CKEDITOR.replace('mesaj');


                        </script>
                    </div>
                  

                    <div class="form-group">
                        <label>Durum</label>
                        <select class="form-control" name="durum">
                        <option value="{{$mesajlar[0]->Durum}}">{{$mesajlar[0]->Durum}}</option>
                            <option name="durum">Okunmadı</option>
                            <option  name="durum">Okundu</option>
                        </select>
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

           CKEDITOR.replace('mesaj')
        })
    </script>
@endsection