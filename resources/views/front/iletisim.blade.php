@extends('layouts.front.fmaster')
@section('title','İletişim sayfası')


@section('description','İletişim sayfası')


@section('keywords','İletişim sayfası')

@section('content')
<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}/">Anasayfa</a></li>
              <li aria-current="page" class="breadcrumb-item active">İletişim</li>
            </ol>
          </nav>
        </div>
      {!!$data[0]->İletisim!!}
        </div>
      </div>
    </div>
      
  </div>
</div>
@endsection

