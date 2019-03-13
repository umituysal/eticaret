@extends('layouts.front.fmaster')
@section('title','Hakkımızda sayfası')


@section('description','Hakkımızda sayfası')


@section('keywords','Hakkımızda sayfası')

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
                <li aria-current="page" class="breadcrumb-item active">Hakkımızda</li>
              </ol>
            </nav>
          </div>
         
          <div class="col-lg-12">
              @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
            <div id="contact" class="box">
              <h1>Hakkımızda</h1>
            
              <p>  {!!$data[0]->Hakkimizda!!}</p>
              
             
              
              </div>
        
            </div>
          </div>
         
          
        </div>
      </div>
    </div>
  </div>
  <!--
@endsection

