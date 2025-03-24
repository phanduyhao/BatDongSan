<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Baidang;
use App\Models\Thietbi;
use App\Models\Loainhadat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $tongBaidang = Baidang::count();
        $tongBaidangDuyet  = Baidang::where('adminduyet', true)->count();
        $tongBaidangHuy  = Baidang::where('adminduyet', false)->count();
        $tongBaidangChoduyet  = Baidang::where('adminduyet', null)->count();
        $user = Auth::user();
        return view('profile.index',compact('tongBaidang','tongBaidangDuyet','tongBaidangChoduyet','tongBaidangHuy','user'),[
            'title' => 'Thông tin cá nhân'
        ]);
    }

    public function updateProfile(Request $request, User $user)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Cập nhật thông tin cá nhân
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
    
        // Xử lý avatar giống cách xử lý `$icon`
        $avatar = $request->file('avatar');
        if ($avatar) {
            $fileName = Str::slug($user->name) . '.jpg'; // Tạo tên file dựa theo Slug Name
            $avatar->move(public_path('/temp/images/avatar/'), $fileName); // Lưu vào thư mục tạm
    
            $user->avatar = '/temp/images/avatar/' . $fileName; // Lưu đường dẫn vào database
        }
    
        // Lưu thông tin vào database
        $user->save();
    
        return back()->with('success', 'Cập nhật thông tin thành công!');
    }

    public function listBaidang(Request $request) {
        $perPage = 10;
    
        // Tạo query lấy các bài đăng thuộc user hiện tại
        $query = BaiDang::where('user_id', Auth::user()->id);
    
        // Lọc theo tên user
        if ($request->filled('search_user')) {
            $query->whereHas('User', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search_user . '%');
            });
        }
    
        // Lọc theo tiêu đề bài đăng
        if ($request->filled('search_title')) {
            $query->where('title', 'LIKE', '%' . $request->search_title . '%');
        }
    
        // Lọc theo mô hình (thuê/bán)
        if ($request->filled('search_mohinh')) {
            $query->where('mohinh', 'LIKE', '%' . $request->search_mohinh . '%');
        }
    
        // Lọc theo loại nhà đất
        if ($request->filled('search_loainhadat')) {
            $query->whereHas('nhadat', function ($q) use ($request) {
                $q->where('title', 'LIKE', '%' . $request->search_loainhadat . '%');
            });
        }
    
        // Lọc theo trạng thái bài đăng
        if ($request->filled('search_trangthai')) {
            $query->where('status', 'LIKE', '%' . $request->search_trangthai . '%');
        }
    
        // Lọc theo trạng thái duyệt của Admin
        if ($request->filled('search_duyet')) {
            if ($request->search_duyet === 'pending') {
                $query->whereNull('adminduyet');  // Chưa duyệt
            } elseif ($request->search_duyet === 'approved') {
                $query->where('adminduyet', true); // Đã duyệt
            } elseif ($request->search_duyet === 'rejected') {
                $query->where('adminduyet', false); // Bị từ chối
            }
        }
    
        // Phân trang kết quả và giữ các tham số tìm kiếm
        $BaiDangs = $query->orderByDesc('id')->paginate($perPage)->appends($request->all());
    
        return view('profile.listBaidang', compact('BaiDangs'), [
            'title' => 'Danh sách bài đăng'
        ]);
    }

    // Chỉnh sửa bài đăng
    public function editBaidang($slug)
    {
        $thietbis = Thietbi::select('id', 'title','icon')->get();
        $loainhadats = Loainhadat::all(); 
        $baidang = Baidang::where('slug', $slug)->first();
        return view('profile.editBaiDang', compact('baidang','loainhadats','thietbis'),[
            'title' => 'Chỉnh sửa bài đăng'
        ]);
    }
}
