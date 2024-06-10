@extends('../layout')

@section('content')
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3">
                <img style="width: 115%;" class="card-img-top" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" alt="">
            </div>
            <div class="col-md-9">
                <style>
                    .infortruyen {
                        list-style: none;
                    }
                </style>

                <ul class="infortruyen">

                    <input type="hidden" value="{{$truyen->tentruyen}}" class="wishlist_title">
                    <input type="hidden" value="{{\URL::current()}}" class="wishlist_url">
                    <input type="hidden" value="{{$truyen->id}}" class="wishlist_id">

                    <li>Tên truyện: {{$truyen->tentruyen}}</li>
                    <li>Tác giả: {{$truyen->tacgia}}</li>
                    <li>Danh mục truyện: <a style="text-decoration: none;" href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
                    <li>Số chapter: Đang tiến hành...</li>
                    <li>Ngày thêm:
                        @if($truyen->created_at !='')
                        {{$truyen->created_at->diffforHumans()}}
                        @else
                        ....
                        @endif
                    </li>
                    <li>Chương mới:
                        @if($truyen->updated_at !='')
                        {{$truyen->updated_at->diffforHumans()}}
                        @else
                        ....
                        @endif
                    </li>
                    <li>Số lượt xem: 2342</li>
                    
                    @if($chapter_dau)
                    <form action="" method="POST">
                        @csrf
                        <li>
                            <a type="button" class="btn btn-primary mt-1" href="{{ url('xem-chapter/'.$chapter_dau->slug_chapter) }}">Đọc ngay</a>
                            <button type="button" onclick="themyeuthich()" data-fa_publisher_id="{{ Session::get('publisher_id') }}" data-fa_title="{{ $truyen->tentruyen }}" data-fa_image="{{ $truyen->hinhanh }}" class="btn btn-danger btn-thich_truyen btn-yeuthichtruyen mt-1 ms-2">
                                <i class="fa-solid fa-heart"></i> Yêu thích
                            </button>


                        </li>
                    </form>


                    <li><a class="btn btn-success mt-2" href="{{url('xem-chapter/'.$chapter_moinhat->slug_chapter)}}">Đọc chương mới nhất</a></li>
                    @else
                    <li><a class="btn btn-danger" href="">Chưa có chương để đọc</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <hr>
        <h5>Tóm tắt:</h5>
        <div class="col-md-12">
            <p>{!! $truyen->tomtat !!}</p>
        </div>
        <hr>
        <h4>Mục lục</h4>
        <ul class="mucluctruyen">
            @php
            $mucluc = count($chapter)
            @endphp

            @if($mucluc > 0)

            @foreach($chapter as $key => $chap)
            <li><a style="text-decoration: none; list-style: square;" href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap -> tieude}}</a></li>
            @endforeach
            @else
            <li>Đang cập nhật...</li>
            @endif
        </ul>
        <div class="col-md-12">
            <div id="disqus_thread"></div>
        </div>
        <script>
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

            var disqus_config = function() {
                this.page.url = '{{\URL::current()}}';
                this.page.identifier = '{{\URL::current()}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };

            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document,
                    s = d.createElement('script');
                s.src = 'https://http-localhost-laravel8-laravel-sachtruyen-1.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <hr>
        <h4>Có thể bạn quan tâm</h4>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($cungdanhmuc as $key => $value)
            <div class="col">
                <div class="card shadow-sm">

                    <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="">
                    <div class="card-body fixed-height">
                        <h7 class="clamp-text-title font-custom-open" style="font-weight: 700;">{{$value->tentruyen}}</h7>
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

        </div>
    </div>
    <div class="col-md-3">
        <h3>Truyện hot</h3>
        @foreach($cungdanhmuc as $key => $value)
        <div class="row mt-2">
            <div class="col-md-5">
                <img style=" aspect-ratio: 1 / 1;" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="" class="img img-responsive card-img-top" width="100%">
            </div>
            <div class="col-md-7 sidebar">
                <a style="text-decoration: none; color: black;" href="{{url('xem-truyen/'.$value->slug_truyen)}}">
                    <p>{{$value -> tentruyen}}</p>
                </a>
            </div>
        </div>
        @endforeach
        <hr>
        <h3>Truyện yêu thích</h3>
        <div class="" id="yeuthich"></div>
    </div>

</div>

@endsection