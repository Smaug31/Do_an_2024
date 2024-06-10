<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Publisher;
use App\Models\Favourite; 
use Illuminate\Support\Facades\Session;

use Storage;

class IndexController extends Controller
{
    public function home(){
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC') -> get();
        $truyen = Truyen::orderBy('id', 'DESC') -> where('kichhoat', 0) -> take(18)->get();
        return view('pages.home')-> with(compact('danhmuc','truyen'));
    }
    public function danhmuc($slug){
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC') -> get();
        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc',$slug) ->first();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        $truyen = Truyen::orderBy('id', 'DESC') -> where('kichhoat', 0) -> where('danhmuc_id',$danhmuc_id-> id)-> get();
        return view('pages.danhmuc') -> with(compact('danhmuc','truyen','tendanhmuc'));
    }
    public function xemtruyen($slug){
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC') -> get();

        $truyen = Truyen::with('danhmuctruyen')->where('slug_truyen', $slug) -> where('kichhoat',0)-> first();
        $chapter = Chapter::with('truyen') -> orderBy('id','ASC')->where('truyen_id',$truyen->id)->get();

        $chapter_dau = Chapter::with('truyen') -> orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();
        $chapter_moinhat = Chapter::with('truyen') -> orderBy('id','DESC')->where('truyen_id',$truyen->id)->first();
        // $truyennoibat = Truyen::with('truyen') ->take(5) ->get();
        
        $cungdanhmuc = Truyen::with('danhmuctruyen')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->get();
        return view('pages.truyen') -> with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau','chapter_moinhat'));
    }
    public function xemchapter($slug){
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC') -> get();
        $truyen = Chapter::where('slug_chapter',$slug )->first();
        // bc
        $truyen_bc = Truyen::with('danhmuctruyen')->where('id', $truyen->truyen_id) -> first();
        // end bc
        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();

        $all_chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();

        $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');
        $previous_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');

        $max_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();
        $min_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();

        return view('pages.chapter') -> with(compact('danhmuc','chapter','all_chapter','next_chapter','previous_chapter','max_id','min_id','truyen_bc'));

    }
    public function timkiem(){
        $tukhoa = $_GET['tukhoa'];
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC') -> get();

        $truyen = Truyen::with('danhmuctruyen')->where('tentruyen','LIKE','%'.$tukhoa.'%')->orWhere('tomtat','LIKE','%'.$tukhoa.'%')->orWhere('tacgia','LIKE','%'.$tukhoa.'%')->get();
        return view('pages.timkiem')-> with(compact('danhmuc','truyen','tukhoa'));
    }
    function dangki(){
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC') -> get();
        return view('pages.users.dangki')-> with(compact('danhmuc'));
    }
    
    function dangnhap(){
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC') -> get();
        return view('pages.users.dangnhap')-> with(compact('danhmuc'));
    }

    public function register_publisher(Request $request){
        $data = $request -> validate(
            [
            'username' => 'required|unique:publishers|max:100',
            'email' => 'required|unique:publishers|max:100',
            'password' => 'required|required_with:password_conbfirmation|same:password|max:100',
            ],
            [
                'username.unique' => 'Tên đã được dùng, hãy điền tên khác',
                'username.required' => 'Tên đăng kí phải có',
                'email.required' => 'Email phải có',
                'email.unique' => 'Tên đã được dùng, hãy điền tên khác',
                'password.required' => 'Hãy điền mật khẩu',
            ],
        );
        $publisher = new Publisher();
        $publisher -> username = $data['username'];
        $publisher -> password = md5($data['password']);
        $publisher -> email = $data['email'];
        $publisher -> save();

        return redirect() -> back() -> with('status', 'Đăng kí thành công!');
    }
    public function login_publisher(Request $request){
        $data = $request -> validate(
            [
            'username' => 'required',
            'password' => 'required',
            ],
            [
                'username.required' => 'Tên đăng nhập phải có',
                'password.required' => 'Hãy điền mật khẩu',
            ],
        );
        $publisher = Publisher::where('username',$data['username'])->where('password',md5($data['password']))->first();
        if ($publisher) {
            Session::put('login_publisher', true);
            Session::put('publisher_id', $publisher->id);
            Session::put('publisher_id', $publisher->username);
            Session::put('email_publisher', $publisher->email);
            return redirect() -> back() -> with('status', 'Đăng nhập thành công!');
        }else{
            return redirect() -> back() -> with('status', 'Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }
    public function dangxuat(){
        Session::forget('login_publisher');
        Session::forget('publisher_id');
        Session::forget('publisher_id');
        Session::forget('email_publisher');
        return redirect() -> back() -> with('status', 'Đăng xuất thành công!');
    }
    public function yeu_thich(){
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC') -> get();
        return view('pages.users.yeuthich')-> with(compact('danhmuc'));
    }
    public function themyeuthich(Request $request){
        $data = $request->all();

        $favourite = new Favourite();
        $favourite->title = $data['title'];
        $favourite->publisher_id = $data['publisher_id'];
        $favourite->image = $data['image'];
        $favourite->status = 0;
    
        $favourite->save();
    }
}
