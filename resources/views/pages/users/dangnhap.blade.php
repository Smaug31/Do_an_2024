@extends('../layout')

@section('content')
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
    </ol>
</nav>
<br>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
@if (session('status'))
<div class="alert alert-success" role="alert">
  {{ session('status') }}
</div>
@endif
<form method="POST" action="{{route('login-publisher')}}">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tên đăng nhập</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Ghi nhớ đăng nhập</label>
  </div>
  <button type="submit" class="btn btn-primary">Đăng nhập</button>
</form>
@endsection