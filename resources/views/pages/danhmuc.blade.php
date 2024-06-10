@extends('../layout')

@section('content')
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$tendanhmuc}}</li>
    </ol>
</nav>
<h3 style="font-weight: 600;">{{$tendanhmuc}} </h3>
<br>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-6">
    @php
    $count = count($truyen)
    @endphp

    @if($count == 0)
    <p>Truyện đang cập nhật...</p>
    @else
    @foreach($truyen as $key => $value)
    <div class="col">
        <div class="card shadow-sm">
            <img class="card-img-top" style="height: 282px;" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="">
            <div style="padding: 0.5rem 0.5rem;" class="card-body fixed-height">
                <h7 class="clamp-text-title" style="font-weight: 700;">{{$value->tentruyen}}</h7>
                <p class="card-text clamp-text" style="font-size: 14px;">{{$value->tomtat}}</p>
                <div class=" justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
<!-- <br><a class="btn btn-success" style="float: right;" href="">Xem tất cả </a> -->
@endsection