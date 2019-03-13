@section('content')
        <!--
        *** ADVANTAGES HOMEPAGE ***
        _________________________________________________________
        -->
        <div id="advantages">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                            <div class="icon"><i class="fa fa-heart"></i></div>
                            <h3><a href="{{url('/')}}/">Biz Müşterİlerİmİzİ sevİyoruz</a></h3>
                            <p class="mb-0"> Mümkün olan en iyi hizmeti sağladığımız bilinmektedir.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                            <div class="icon"><i class="fa fa-tags"></i></div>
                            <h3><a href="{{url('/')}}/">EN İYİ FİYATLAR BURADA</a></h3>
                            <p class="mb-0">Müşterilerimize en uygun fiyatları sunuyoruz .</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
                            <div class="icon"><i class="fa fa-thumbs-up"></i></div>
                        <h3><a href="{{url('/')}}/"> MEMNUNİYET GARANTİLİ</a></h3>
                            <p class="mb-0">3 ay boyunca her şeyde ücretsiz iade.</p>
                        </div>
                    </div>
                </div>
                <!-- /.row-->
            </div>
            <!-- /.container-->
        </div>
        <!-- /#advantages-->
        <!-- *** ADVANTAGES END ***-->
        <!--
        *** HOT PRODUCT SLIDESHOW ***
        _________________________________________________________
        -->
        <div id="hot">
            <div class="box py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mb-0">GÜNÜN FIRSATLARI</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="product-slider owl-carousel owl-theme">
@foreach ($urun as $u)
    

                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front"><a href="{{url('/')}}/urun/{{$u->Id}}"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a></div>
                                    <div class="back"><a href="{{url('/')}}/urun/{{$u->Id}}"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a></div>
                                </div>
                            </div><a href="{{url('/')}}/urun/{{$u->Id}}" class="invisible"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a>
                            <div class="text">
                                <h3><a href="{{url('/')}}/urun/{{$u->Id}}">{{$u->Ad}}</a></h3>
                                <p class="price">
                                    <del></del>{{$u->Fiyat}} TL
                                </p>
                            </div>
                            <!-- /.text-->
                           
                            <!-- /.ribbon-->
                            <div class="ribbon new">
                                <div class="theribbon">YENİ</div>
                                <div class="ribbon-background"></div>
                            </div>
                           
                        </div>
                        <!-- /.product-->
                    </div>
                    @endforeach
                    <!-- /.product-slider-->
                </div>
                <!-- /.container-->
            </div>
            <!-- /#hot-->
            <!-- *** HOT END ***-->
        </div>
        <!--
        *** GET INSPIRED ***
        _________________________________________________________
        -->
        <div id="hot">
                <div class="box py-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="mb-0">Çok satanlar</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="product-slider owl-carousel owl-theme">
    @foreach ($urunler as $u)
        
    
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front"><a href="{{url('/')}}/urun/{{$u->Id}}"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a></div>
                                        <div class="back"><a href="{{url('/')}}/urun/{{$u->Id}}"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a></div>
                                    </div>
                                </div><a href="{{url('/')}}/urun/{{$u->Id}}" class="invisible"><img src="{{url('/')}}/userfiles/{{$u->Resim}}" alt="" class="img-fluid"></a>
                                <div class="text">
                                    <h3><a href="{{url('/')}}/urun/{{$u->Id}}">{{$u->Ad}}</a></h3>
                                    <p class="price">
                                        <del></del>{{$u->Fiyat}} TL
                                    </p>
                                </div>
                                <!-- /.text-->
                              
                                <!-- /.ribbon-->
                                <div class="ribbon new">
                                    <div class="theribbon">YENİ</div>
                                    <div class="ribbon-background"></div>
                                </div>
                               
                            </div>
                            <!-- /.product-->
                        </div>
                        @endforeach
                        <!-- /.product-slider-->
                    </div>
                    <!-- /.container-->
                </div>
                <!-- /#hot-->
                <!-- *** HOT END ***-->
            </div>
        <!-- *** GET INSPIRED END ***-->
        <!--
        *** BLOG HOMEPAGE ***
        _________________________________________________________
        -->
        
        <!-- /.container-->
        <!-- *** BLOG HOMEPAGE END ***-->
@endsection