@section('slider')
                <div class="col-md-12">
                    <div id="main-slider" class="owl-carousel owl-theme">
                        @foreach ($slider as $s)
                            
                     
                        <div class="item"><img  src="{{url('/')}}/userfiles/{{$s->Resim}}" alt="" class="img-fluid"></div>
                        @endforeach
                        
                    </div>
                    <!-- /#main-slider-->
                </div>
    @endsection
