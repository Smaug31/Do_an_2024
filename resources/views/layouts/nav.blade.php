<div class="container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Admin</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Quản lí danh mục
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a></li>
            <li><a class="dropdown-item" href="{{route('danhmuc.index')}}">Liệt kê danh mục</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sách truyện
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('truyen.create')}}">Thêm sách truyện</a></li>
            <li><a class="dropdown-item" href="{{route('truyen.index')}}">Liệt kê sách truyện</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Chapter
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('chapter.create')}}">Thêm chapter</a></li>
            <li><a class="dropdown-item" href="{{route('chapter.index')}}">Liệt kê chapter</a></li>
          </ul>
        </li>
      </ul>
      <!-- <form class="d-flex" role="search" action="{{url('tim-kiem')}}" method="GET">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" name="tukhoa" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
</div>
</nav>
</div>