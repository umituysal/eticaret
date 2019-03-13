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
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">Checkout - Address</li>
              </ol>
            </nav>
          </div>
          <div id="checkout" class="col-lg-9">
            <div class="box">
            <form method="post" action="{{url('/')}}/satinal">
              @csrf
                <h1>Bilgileriniz</h1>
                <div class="content py-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Adı Soyadı</label>
                      <input name="name" value="{{$user[0]->name}}" type="text" class="form-control">
                     
                      </div>
                    </div>
                   
                  <div class="col-md-12">
                    <div class="form-group">
                      <label >Telefon Numarası </label>
                      <input name="tel"  value="{{$user[0]->tel}}" type="text" class="form-control">
                    </div>
                  </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="company">Adres</label>
                        <input name="adres" value="{{$user[0]->adres}}" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="street">İl </label>
                        <input name="il"  value="{{$user[0]->il}}" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="street">İlçe </label>
                          <input name="ilce"  value="{{$user[0]->ilce}}" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="street">Kredi Kartı No </label>
                          <input  value="" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="street">Kredi Kartı Şifresi </label>
                          <input   value="" type="password" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="street">Güvenlik Kodu </label>
                          <input   value="" type="text" class="form-control">
                        </div>
                      </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="street">Tutar </label>
                      <input name="toplam"  value="<?php echo $toplam+10; ?>" type="text" class="form-control">
                    </div>
                  </div>
               
                </div>
                  
                  <!-- /.row-->
                </div>
                
              <div class="box-footer d-flex justify-content-between"><a href="{{url('/')}}/sepetim" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Geri Dön</a>
                  <button type="submit" class=" btn btn-primary">Satın  Al<i class="fa fa-chevron-right"></i></button>
                </div>
              </form>
            </div>
            <!-- /.box-->
          </div>
          <!-- /.col-lg-9-->
          <div class="col-lg-3">
            <div id="order-summary" class="card">
              <div class="card-header">
                <h3 class="mt-4 mb-4">Sepetiniz</h3>
              </div>
              <div class="card-body">
                <p class="text-muted">Sepetinizdeki alışverişiniz.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Alışveriş Tutarı</td>
                        <th><?php echo $toplam;?> TL</th>
                      </tr>
                      <tr>
                        <td>Kargo Bedeli</td>
                        <th>10.00TL</th>
                      </tr>
                     
                      <tr class="total">
                        <td>Toplam</td>
                        <th> <?php echo $toplam+10;?> TL</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-lg-3-->
        </div>
       
      </div>
    </div>
  </div>
@endsection

