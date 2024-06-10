<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SachTruyen</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"> -->
    <Style>
        .chapter_custom {
            font-family: "Palatino Linotype", "Arial", "Times New Roman", sans-serif;
            line-height: 190%;
            color: #2B2B2B;
            font-size: 28px;
            text-align: left;
            word-wrap: break-word;
        }

        .font-custom-open {
            font-family: OpenSans, sans-serif;
        }

        .btn-thich_truyen.active {
            background-color: deeppink;
            color: white;
        }

        .fixed-height {
            height: 200px;
        }

        .fixed-height-danh {
            height: 230px;
        }

        .card {
            position: relative;
            /* Thiết lập vị trí tương đối để tiêu đề có thể được thiết lập tuyệt đối */
        }

        .card-img-top {
            width: 100%;
            height: auto;
            /* Đảm bảo ảnh tự động điều chỉnh kích thước */
        }

        .clamp-text {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 4;
            /* Giới hạn số dòng */
            overflow: hidden;
            text-overflow: ellipsis;
            /* Hiển thị dấu ba chấm nếu vượt quá số dòng */
        }

        .clamp-text-title {

            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            /* Giới hạn số dòng */
            overflow: hidden;
            text-overflow: ellipsis;
            /* Hiển thị dấu ba chấm nếu vượt quá số dòng */

        }

        .up-img {
            position: absolute;
            bottom: 0;
            width: 100%;
            color: #f4f4f4;
            background-color: rgba(0, 0, 0, 0.6);
            text-shadow: 1px 2px 2px #000;
            font-size: 15px;
            display: block;
            text-align: center;
            font-family: 'Roboto Condensed', Tahoma, sans-serif;
            margin: 0;
            padding: 7px 0px;
            text-transform: capitalize;
        }

        .custom-border-bottom {
            border-bottom: 1px solid black;
            margin-top: 5px;
            padding-top: 5px;
        }
    </Style>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6651e2edbc91a900195547ba&product=sticky-share-buttons&source=platform" async="async"></script>
</head>

<body>
    <!-- Menu -->
    <nav class="navbar navbar-expand-lg bg-primary" style="background-color: #14425d;">
        <div class="container-fluid">
            <a class="navbar-brand ps-5 text-white fw-bold fs-5" href="{{url('/')}}"><i class="fa-solid fa-book"></i> DocLn.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{url('/')}}">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục truyện
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($danhmuc as $key =>$danh)
                            <li><a class="dropdown-item" href="{{url('danh-muc/'.$danh->slug_danhmuc)}}">{{$danh->tendanhmuc}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    </li>
                    @if(!Session::get('login_publisher'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Khách
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('dang-ki')}}">Đăng kí</a></li>
                            <li><a class="dropdown-item" href="{{route('dang-nhap')}}">Đăng nhập</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Session::get('username')}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="">Truyện đã đăng </a></li>
                            <li><a class="dropdown-item" href="{{route('yeu-thich')}}">Yêu thích</a></li>
                            <li><a class="dropdown-item" href="">Thông tin</a></li>
                            <li><a class="dropdown-item" href="{{route('dang-xuat')}}">Đăng xuất</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
                @csrf
                <form class="d-flex" role="search" action="{{url('tim-kiem')}}" method="GET">
                    <input class="form-control me-2" type="search" id="keywords" name="tukhoa" placeholder="Tìm kiếm truyện, tác giả, ..." aria-label="Search">
                    <button class="btn btn-success mx-2" type="submit">Search</button>
                </form>
                </form>
            </div>
        </div>
    </nav>
    <div class="sharethis-sticky-share-buttons"></div>
    <div class="container">

        <!-- Slide -->
        @yield('slide')

        <!-- Truyện mới -->
        @yield('content')

        <footer class="text-body-secondary py-5">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
                <p class="mb-1">© 2024 Cổng Light Novel - Đọc Light Novel</p>
                <p class="mb-0"><a style="text-decoration: none;"  href="#">Visit the homepage</a> or read <a style="text-decoration: none;"  href="#">getting started guide</a>.</p>
            </div>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            show_wishlist();

            function show_wishlist() {
                const wishlist = localStorage.getItem('wishlist_truyen');
                if (wishlist) {
                    const data = JSON.parse(wishlist).reverse();
                    data.forEach(item => {
                        $('#yeuthich').append(
                            `<div class="row mt-2">
                        <div class="col-md-5">
                            <img src="${item.img}" alt="${item.title}" class="img img-responsive card-img-top" width="100%">
                        </div>
                        <div class="col-md-7 sidebar">
                            <a style="text-decoration: none; color: black;" href="${item.url}"><p>${item.title}</p></a>
                        </div>
                    </div>`
                        );
                    });
                }
            }

            $('.btn-thich_truyen').on('click', function() {
                $('.btn-yeuthichtruyen').css('background-color', 'pink');

                const id = $(".wishlist_id").val();
                const title = $(".wishlist_title").val();
                const img = $(".card-img-top").attr('src');
                const url = $(".wishlist_url").val();

                const item = {
                    id,
                    title,
                    img,
                    url
                };

                if (!localStorage.getItem('wishlist_truyen')) {
                    localStorage.setItem('wishlist_truyen', '[]');
                }

                const old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
                const exists = old_data.some(obj => obj.id === id);

                if (exists) {
                    alert('Bạn đã thích truyện này rồi');
                } else {
                    if (old_data.length < 10) {
                        old_data.push(item);
                        $('#yeuthich').append(
                            `<div class="row mt-2">
                        <div class="col-md-5">
                            <img src="${img}" alt="${title}" class="img img-responsive card-img-top" width="100%">
                        </div>
                        <div class="col-md-7 sidebar">
                            <a style="text-decoration: none; color: black;" href="${url}"><p>${title}</p></a>
                        </div>
                    </div>`
                        );
                        localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
                        alert('Đã lưu vào danh sách truyện yêu thích');
                    } else {
                        alert('Danh sách yêu thích đã đầy');
                    }
                }
            });
        });
    </script>


    <script>
        function themyeuthich() {
            const title = $('.btn-yeuthichtruyen').data('fa_title');
            const image = $('.btn-yeuthichtruyen').data('fa_image');
            const publisher_id = $('.btn-yeuthichtruyen').data('fa_publisher_id');
            const _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{ route("themyeuthich") }}',
                method: 'POST',
                data: {
                    title,
                    image,
                    publisher_id,
                    _token
                },
                success: function(data) {
                    alert('Thêm truyện yêu thích thành công');
                }
            });
        }
    </script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            // nav:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 6
                },
                1000: {
                    items: 8
                }
            }
        })
    </script>
    <script>
        $('.select-chapter').on('change', function() {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });
        current_chapter();

        function current_chapter() {
            var url = window.location.href;
            $('.select-chapter').find('option[value="' + url + '"]').attr("selected", true);
        }
    </script>
</body>

</html>