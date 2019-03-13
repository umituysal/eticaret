@extends('layouts.front.fmaster')
@section('title','Sepet sayfası')


@section('description','Sepet sayfası')


@section('keywords','Sepet sayfası')

@section('content')

<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li aria-current="page" class="breadcrumb-item active">Sepetim</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-3">
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">{{Auth::user()->name}}</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column category-menu">
              
                  <ul class="list-unstyled">
                    <li><a href="{{url('/')}}/profil/{{Auth::user()->Id}}" class="nav-link">Kullanıcı Profili</a></li>
                    <li><a href="{{url('/')}}/sepetim" class="nav-link">Sepetim</a></li>
                    <li><a href="{{url('/')}}/siparisler" class="nav-link">Siparişlerim</a></li>
                  <li><a href="{{url('/')}}/logout" class="nav-link">Çıkış</a></li>
                  </ul>
              
              
              </ul>
            </div>
          </div>
        </div>
        <div id="basket" class="col-lg-9">
          <div class="box">
            <form method="post" action="{{url('/')}}/siparis_tamamla">
              @csrf
              <h1>Sepetim</h1>
              @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
              <p class="text-muted">Sepetinizdeki ürünler.</p>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                  
                      <th>Ürün Resmi</th>
                      <th>Ürün Adı</th>
                      <th>Adet</th>
                      <th>Fiyat</th>
                    
                      <th >Tutar</th>
                      <th>Sil</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $top=0; ?>
                @foreach ($veriler as $urun)
                 
                    <tr>
           
                      <td><img src="{{url('/')}}/userfiles/{{$urun->resim}}" alt="Black Blouse Armani"></td>
                    <td>{{$urun->ad}}</td>
                      <td>
                        <input type="number" name="adet" value="{{$urun->adet}}" class="form-control">
                      </td>
                      <td>{{$urun->fiyat}}</td>
                    
                      <td>{{$urun->fiyat*$urun->adet}}</td>
                      <td><a  href="{{url('/')}}/sepetsil/{{$urun->Id}}" onclick="return confirm('Silmek İstediğinize Emin misiniz?');"><i class="fa fa-trash-o"></i></a></td>
                     
                    </tr>
                    <?php $top +=$urun->fiyat*$urun->adet; ?>
                    @endforeach
                   
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="5">Tutar:  <?php echo  $top; ?> TL</th>
                  
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.table-responsive-->
              <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
              <div class="left"><a href="{{url('/')}}/urunlerimiz" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Alışverişe Geri Dön</a></div>
                <div class="right">
                 
               
                  <input type="hidden" readonly name="toplam" value=" <?php echo  $top; ?>">
                  <button type="submit" value="Siparis tamamla " class="btn btn-primary">Siparis tamamla <i class="fa fa-chevron-right"></i></button>
              
                </div>
              </div>
            </form>
          </div>
        
      </div>
    </div>
      
  </div>
</div>
@endsection

