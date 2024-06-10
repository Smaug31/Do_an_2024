<br>
<h3 class="custom-border-bottom fw-5" style="font-weight: 600;"> Truyện hot <i class="fa-solid fa-fire"></i> </h3>
<br>
<div class="owl-carousel owl-theme">
    <!-- <div class="item"> -->
    @foreach($truyen as $key => $value)
    <div class="col">
        <div class="card shadow-sm">
            <a href="{{url('xem-truyen/'.$value->slug_truyen)}}">
                <img class="card-img-top" style="height: 220px;" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="">
                <div class=" ">
                    <h5 class="clamp-text-title up-img">{{$value->tentruyen}}</h5>
                </div>
            </a>

        </div>
    </div>
    @endforeach
</div>