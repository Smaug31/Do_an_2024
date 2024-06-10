@extends('../layout')

@section('content')
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen_bc->danhmuctruyen->slug_danhmuc)}}">{{$truyen_bc->danhmuctruyen->tendanhmuc}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$truyen_bc->tentruyen}}</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12">
        <h4>{{$chapter->truyen->tentruyen}}</h4>
        <p>{{$chapter->tieude}}</p>
        <div class="col-md-12">
            <style>
                .isDisabled {
                    color: currentColor;
                    pointer-events: none;
                    opacity: 0.5;
                    text-decoration: none;
                }
            </style>
            <div class="row">
                <div class="mb-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto">
                            <div class="mb-3 text-center">
                                <p><a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Chap trước</a></p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="mb-3">
                                <select name="select-chapter" class="form-select select-chapter">
                                    @foreach($all_chapter as $key => $chap)
                                    <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="mb-3 text-center">
                                <p><a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$next_chapter)}}">Chap sau</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="noidungchuong chapter_custom">
            <p>{!!$chapter->noidung!!}</p>
        </div>
        <br>
    </div>
    <div class="col-md-12">
    <div class="row">
                <div class="mb-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto">
                            <div class="mb-3 text-center">
                                <p><a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Chap trước</a></p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="mb-3">
                                <select name="select-chapter" class="form-select select-chapter">
                                    @foreach($all_chapter as $key => $chap)
                                    <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="mb-3 text-center">
                                <p><a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$next_chapter)}}">Chap sau</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>
</div>
<div class="col-md-12">
    <div id="disqus_thread"></div>
</div>
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

    var disqus_config = function() {
        this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document,
            s = d.createElement('script');
        s.src = 'https://http-localhost-laravel8-laravel-sachtruyen-1.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>

@endsection