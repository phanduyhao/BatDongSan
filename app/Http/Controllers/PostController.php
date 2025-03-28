<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Ward;
use App\Models\Address;
use App\Models\Baidang;
use App\Models\Setting;
use App\Models\Thietbi;
use App\Models\District;
use App\Models\Province;
use App\Models\Favourite;
use App\Models\Loainhadat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Baidanglienhe;
use App\Models\BaidangChitiet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
       $loainhadats = Loainhadat::select('id', 'title')->get();
       $thietbis = Thietbi::select('id', 'title','icon')->get();
        return view('posts.index',compact('loainhadats','thietbis'),[
            'title' => 'Đăng tin'
        ]);
    }

    public function listBaidang(Request $request) {
        // Lấy giá trị mô hình từ request
        $mohinh = $request->input('mohinh');
    
        // Query cơ bản
        $query = Baidang::where('status','cosan')->where('adminduyet',1);
    
        // Nếu có giá trị mô hình hợp lệ thì lọc theo mô hình
        if (in_array($mohinh, ['ban', 'thue', 'chuyennhuong', 'oghep'])) {
            $query->where('mohinh', $mohinh);
        }
    
        // Gọi hàm applyFilters để áp dụng bộ lọc chung
        $query = $this->applyFilters($query, $request);
    
        // Lấy danh sách bài đăng
        $list_baidangs = $query->orderByDesc('id')->paginate(10);
        $listnhadats = Loainhadat::select('title', 'id', 'slug', 'icon')->get();
    
        // Xác định tiêu đề trang
        $title = $mohinh === 'thue' ? 'Danh sách nhà đất cho thuê' : ($mohinh === 'ban' ? 'Danh sách nhà đất bán' :  ($mohinh === 'chuyennhuong' ? 'Danh sách chuyển nhượng' :  ($mohinh === 'oghep' ? 'Danh sách ở ghép' : 'Danh sách nhà đất')));
    
        return view('posts.list_baidang', compact('list_baidangs', 'listnhadats', 'mohinh'), [
            'title' => $title
        ]);
    }

    public function getByLoaiNhadat(Request $request, $slug) {
        // Lấy thông tin loại nhà đất theo slug
        $loaiNhadat = Loainhadat::where('slug', $slug)->firstOrFail();
    
        // Query cơ bản
        $query = Baidang::where('loainhadat_id', $loaiNhadat->id)->where('adminduyet',1);
    
        // Gọi hàm applyFilters để áp dụng bộ lọc chung
        $query = $this->applyFilters($query, $request);
    
        // Phân trang
        $list_baidangs = $query->orderByDesc('id')->paginate(10);
        $listnhadats = Loainhadat::select('title', 'id', 'slug', 'icon')->get();
        $slugCurrent = $slug;
    
        return view('posts.list_by_nhadat', compact('list_baidangs', 'listnhadats', 'loaiNhadat', 'slugCurrent'), [
            'title' => 'Danh sách ' . $loaiNhadat->title
        ]);
    }
    
    public function store(Request $request)
    {

        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'mohinh' => 'required|string',
            'loainhadat_id' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'description' => 'nullable|string',
            'email_contact' => 'required|email',
            'phone_contact' => 'nullable|string',
            'link_zalo' => 'nullable|string',
            'facebook' => 'nullable|string',
            'telegram' => 'nullable|string',
            'images' => 'nullable|array',
            'thietbis' => 'nullable|array',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:10000',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422); // Trả về lỗi 422 (Unprocessable Entity)
        }

        $tudongduyet = Setting::where('key', 'tudongduyet')->value('value');

        try {
            DB::beginTransaction(); // Bắt đầu transaction
    
            $provinceCode = $request->input('province');
            $provinceName = $request->input('province_name');
            $province = Province::where('code', $provinceCode)->first();
            if(!$province){
                $province = new Province();
                $province->code = $provinceCode;
                $province->name = $provinceName;
                $province->save();      
            }      
            
            $districtCode = $request->input('districts');
            $districtName = $request->input('district_name');
            $district = District::where('code', $districtCode)->first();
            if (!$district) {
                $district = new District();
                $district->code = $districtCode;
                $district->name = $districtName;
                $district->province_id = $province->id;
                $district->save();
            }    
            $wardCode = $request->input('wards');
            $wardName = $request->input('ward_name');
            $ward = Ward::where('code', $wardCode)->first();
            if (!$ward) {
                $ward = new Ward();
                $ward->code = $wardCode;
                $ward->name = $wardName;
                $ward->district_id = $district->id;
                $ward->save();
            }
                
            $address = new Address();
            $address->street = $request->input('street');
            $address->ward_id = $ward->id;
            $address->latitude = $request->input('latitude');
            $address->longitude = $request->input('Longitude');
            $address->save();
            
            // Lưu thông tin liên hệ
            $contact = new Baidanglienhe();
            $contact->agent_name = $request->name_contact;
            $contact->phone = $request->phone_contact;
            $contact->email = $request->email_contact;
            $contact->zalo_link = $request->link_zalo;
            $contact->facebook = $request->facebook;
            $contact->telegram = $request->telegram;
            $contact->loailienhe = $request->loailienhe;
            $contact->save();
            
            // Xử lý thiết bị
            $thietbis = [];

            if ($request->has('thietbis')) {
                foreach ($request->input('thietbis') as $id => $name) {
                    // Lấy icon dựa vào key giống nhau
                    $icon = $request->input("icon_thietbi.{$id}") ?? null;
            
                    // Thêm vào danh sách
                    $thietbis[] = ['name' => $name, 'icon' => $icon];
                }
            }
            // Kiểm tra kết quả

             // Xử lý video
            // $videoPath = null;
            // if ($request->hasFile('video')) {
            //     $video = $request->file('video');
            //     if ($video->isValid()) {
            //         $videoFileName = Str::slug($request->title) . '-' . time() . '-' . uniqid() . '.' . $video->getClientOriginalExtension();
            //         $video->move(public_path('/temp/video/'), $videoFileName);
            //         $videoPath = '/temp/videos/' . $videoFileName;
            //     }
            // }
            $baidang_chitiet = new BaidangChitiet();
            // $baidang_chitiet->video = $videoPath;
            $baidang_chitiet->sophong = $request->tongsophong;
            $baidang_chitiet->sotang = $request->tongsotang;
            $baidang_chitiet->hoahong = $request->hoahong;
            $baidang_chitiet->thangdatcoc = $request->thangdatcoc;
            $baidang_chitiet->thangtratruoc = $request->thangtratruoc;
            $baidang_chitiet->hopdong = $request->hopdong;
            $baidang_chitiet->save();
    
            // Lưu thông tin bài đăng
            $baidang = new Baidang();
            $baidang->title = $request->title;
            $baidang->mohinh = $request->mohinh;
            $baidang->loainhadat_id = $request->loainhadat_id;
            $baidang->price = $request->price;
            $baidang->dientich = $request->area;
            $baidang->isVip = $request->isVip ? 1 : 0;
            $baidang->bedrooms = $request->bedrooms;
            $baidang->bathrooms = $request->bathrooms;
            $baidang->description = $request->description;
            $baidang->huongnha = $request->huongnha;
            $baidang->huongbancong = $request->huongbancong;
            $baidang->age = $request->age;
            $baidang->user_id = Auth::id();
            $baidang->address_id = $address->id;
            $baidang->baidangchitiet_id = $baidang_chitiet->id;
            $baidang->thietbis = json_encode($thietbis);
            $baidang->status = 1;
            if(Auth::user()->role == 'admin' || $tudongduyet == 1){
                $baidang->adminduyet = 1;
            }
            // Xử lý ảnh
            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    if ($image->isValid()) {
                        $fileName = Str::slug($request->title) . '-' . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('/temp/images/baidang/'), $fileName);
                        $imagePaths[] = '/temp/images/baidang/' . $fileName;
                    }
                }
            }
            $baidang->images = !empty($imagePaths) ? json_encode($imagePaths) : null;
            $baidang->thumb = !empty($imagePaths) ? $imagePaths[0] : null;
            $baidang->lienhe_id= $contact->id;
            $baidang->save();
            $baidang->slug = Str::slug($baidang->title . '-' . $baidang->id);
            $baidang->save();
    
            
            DB::commit();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Bài đăng đã được tạo thành công!',
                'baidang' => $baidang
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('L��i xảy ra khi đăng tin: '. $e->getMessage());
            return response()->json(['status' => 'error'], 500);
        }
    }
    
    public function toggleIsVip(Request $request, $id)
    {
        $baidang = BaiDang::findOrFail($id);
        $baidang->isVip = $request->input('isVip'); // Cập nhật theo giá trị từ frontend
        $baidang->save();
    
        return response()->json(['status' => 'success', 'isVip' => $baidang->isVip]);
    }
    
    public function updateStatus(Request $request) {
        $request->validate([
            'id' => 'required|exists:baidangs,id',
            'status' => 'required|in:cosan,dathue,hethan'
        ]);
    
        $baidang = BaiDang::findOrFail($request->id);
        $baidang->status = $request->status;
        $baidang->save();
    
        return response()->json(['success' => true, 'message' => 'Trạng thái đã được cập nhật.']);
    }

    // Xem preview Bài đăng
    public function baidangDetail($slug)
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        // Tìm baidang theo slug
        $baidang = Baidang::where('slug', $slug)->first();
        $baidanghots = Baidang::where('isVip', true)->take(4)->get();
        
        $favourite = null;
        if (Auth::check()) {
            $favourite = Favourite::where('user_id', Auth::user()->id)->where('baidang_id',$baidang->id)->first();
        }
        // Kiểm tra nếu không tìm thấy baidang
        if (!$baidang) {
            return redirect()->back()->with('error', 'Baidang not found!');
        }
    
        $user = null;
    
        if ($baidang->user_id != null) {
            $user = User::find($baidang->user_id);

        }
        $title = $baidang->title;
        return view('posts.detail',compact('baidang','favourite','user','settings','baidanghots'),[
            'title' => $title 
        ]);
    }

    // private function
    private function applyFilters($query, Request $request) {
        // Lọc theo tỉnh/thành phố
        if ($request->filled('province')) {
            $query->whereHas('address.ward.district.province', function ($q) use ($request) {
                $q->where('code', $request->province);
            });
        }
    
        // Lọc theo quận/huyện
        if ($request->filled('district')) {
            $query->whereHas('address.ward.district', function ($q) use ($request) {
                $q->where('code', $request->district);
            });
        }
    
        // Lọc theo phường/xã
        if ($request->filled('ward')) {
            $query->whereHas('address.ward', function ($q) use ($request) {
                $q->where('code', $request->ward);
            });
        }
    
        // Lọc theo khoảng giá
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }
    
        // Lọc theo diện tích
        if ($request->filled('area_min')) {
            $query->where('dientich', '>=', $request->area_min);
        }
        if ($request->filled('area_max')) {
            $query->where('dientich', '<=', $request->area_max);
        }
    
        // Lọc theo số phòng ngủ
        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }
    
        // Lọc theo số phòng tắm
        if ($request->filled('bathrooms')) {
            $query->where('bathrooms', '>=', $request->bathrooms);
        }
    
        // Lọc theo hướng nhà
        if ($request->filled('huongnha')) {
            $query->where('huongnha', $request->huongnha);
        }
    
        // Lọc theo hướng ban công
        if ($request->filled('huongbancong')) {
            $query->where('huongbancong', $request->huongbancong);
        }
    
        // Lọc theo thời gian đăng
        if ($request->filled('days')) {
            $daysAgo = Carbon::now()->subDays($request->days);
            $query->where('created_at', '>=', $daysAgo);
        }
    
        // Tìm kiếm theo tiêu đề bài đăng
        if ($request->filled('ten_baidang')) {
            $query->where('title', 'LIKE', '%' . $request->ten_baidang . '%');
        }
    
        // Sắp xếp theo tiêu chí
        if ($request->filled('shorty')) {
            if ($request->shorty == 1) {
                $query->orderBy('price', 'asc'); // Giá từ thấp đến cao
            } elseif ($request->shorty == 2) {
                $query->orderBy('price', 'desc'); // Giá từ cao đến thấp
            } elseif ($request->shorty == 3) {
                $query->orderBy('created_at', 'desc'); // Ngày đăng mới nhất
            }
        }
    
        // Lọc theo tin VIP
        if ($request->filled('isVip')) {
            $query->where('isVip', 1);
        }
    
        return $query;
    }
    
    public function deleteImage(Request $request)
    {
        $imagePath = str_replace(asset("storage/"), "", $request->image); // Lấy đường dẫn file thực tế
        $baidang = BaiDang::where("images", "LIKE", "%{$imagePath}%")->first();

        if (!$baidang) {
            return response()->json(["success" => false, "message" => "Không tìm thấy bài đăng!"]);
        }

        // Xóa ảnh khỏi storage
        if (Storage::disk("public")->exists($imagePath)) {
            Storage::disk("public")->delete($imagePath);
        }

        // Cập nhật JSON images trong database
        $images = json_decode($baidang->images, true) ?? [];
        $images = array_filter($images, function ($img) use ($imagePath) {
            return $img !== $imagePath; // Loại bỏ ảnh đã xóa
        });

        $baidang->images = json_encode(array_values($images)); // Lưu lại
        $baidang->save();

        return response()->json(["success" => true]);
    }

    public function update(Request $request, $id)
    {
        // Kiểm tra bài đăng có tồn tại không
        $baidang = Baidang::find($id);
        if (!$baidang) {
            return response()->json(['status' => 'error', 'message' => 'Bài đăng không tồn tại'], 404);
        }

        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'mohinh' => 'required|string',
            'loainhadat_id' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'description' => 'nullable|string',
            'email_contact' => 'required|email',
            'phone_contact' => 'nullable|string',
            'link_zalo' => 'nullable|string',
            'facebook' => 'nullable|string',
            'telegram' => 'nullable|string',
            'images' => 'nullable|array',
            'thietbis' => 'nullable|array',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();
            $provinceCode = $request->input('province');
            $provinceName = $request->input('province_name');
            $province = null;
            if ($provinceCode) {
                $province = Province::where('code', $provinceCode)->first();
                if (!$province) {
                    $province = new Province();
                    $province->code = $provinceCode;
                    $province->name = $provinceName;
                    $province->save();
                }
            }

            // Xử lý quận/huyện
            $districtCode = $request->input('districts');
            $districtName = $request->input('district_name');
            $district = null;
            if ($districtCode && $province) {
                $district = District::where('code', $districtCode)->first();
                if (!$district) {
                    $district = new District();
                    $district->code = $districtCode;
                    $district->name = $districtName;
                    $district->province_id = $province->id;
                    $district->save();
                }
            }

            // Xử lý phường/xã
            $wardCode = $request->input('wards');
            $wardName = $request->input('ward_name');
            $ward = null;
            if ($wardCode && $district) {
                $ward = Ward::where('code', $wardCode)->first();
                if (!$ward) {
                    $ward = new Ward();
                    $ward->code = $wardCode;
                    $ward->name = $wardName;
                    $ward->district_id = $district->id;
                    $ward->save();
                }
            }

            // Cập nhật hoặc tạo mới địa chỉ
            $address = Address::find($baidang->address_id);
            if ($address) {
                $address->street = $request->input('street');
                $address->latitude = $request->input('latitude');
                $address->longitude = $request->input('longitude');
                $address->ward_id = $ward->id;
                $address->save();
            } else {
                $address = new Address();
                $address->street = $request->input('street');
                $address->latitude = $request->input('latitude');
                $address->longitude = $request->input('longitude');
                $address->ward_id = $ward->id;
                $address->save();

                // Gán địa chỉ mới cho bài đăng
                $baidang->address_id = $address->id;
            }

            // Cập nhật thông tin liên hệ
            $contact = Baidanglienhe::find($baidang->lienhe_id);
            if ($contact) {
                $contact->agent_name = $request->name_contact;
                $contact->phone = $request->phone_contact;
                $contact->email = $request->email_contact;
                $contact->zalo_link = $request->link_zalo;
                $contact->facebook = $request->facebook;
                $contact->telegram = $request->telegram;
                $contact->loailienhe = $request->loailienhe;
                $contact->save();
            }

            // Cập nhật danh sách thiết bị
            $thietbis = [];
            if ($request->has('thietbis')) {
                foreach ($request->input('thietbis') as $id => $name) {
                    $icon = $request->input("icon_thietbi.{$id}") ?? null;
                    $thietbis[] = ['name' => $name, 'icon' => $icon];
                }
            }

            // Cập nhật thông tin bài đăng
            $baidang->title = $request->title;
            $baidang->mohinh = $request->mohinh;
            $baidang->loainhadat_id = $request->loainhadat_id;
            $baidang->price = $request->price;
            $baidang->dientich = $request->area;
            $baidang->bedrooms = $request->bedrooms;
            $baidang->bathrooms = $request->bathrooms;
            $baidang->description = $request->description;
            $baidang->huongnha = $request->huongnha;
            $baidang->huongbancong = $request->huongbancong;
            $baidang->age = $request->age;
            $baidang->thietbis = json_encode($thietbis);

            // Cập nhật ảnh (thêm mới, không xóa ảnh cũ)
            $imagePaths = json_decode($baidang->images, true) ?? [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    if ($image->isValid()) {
                        $fileName = Str::slug($request->title) . '-' . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('/temp/images/baidang/'), $fileName);
                        $imagePaths[] = '/temp/images/baidang/' . $fileName;
                    }
                }
            }
            $baidang->images = json_encode($imagePaths);
            $baidang->thumb = $imagePaths[0] ?? null;
            
            $baidang->save();
            DB::commit();

            return response()->json(['status' => 'success', 'message' => 'Bài đăng đã được cập nhật thành công!', 'baidang' => $baidang]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi xảy ra khi cập nhật bài đăng: '. $e->getMessage());
            return response()->json(['status' => 'error'], 500);
        }
    }

    public function destroy(string $id)
    {
        $baidang = Baidang::find($id);

        if (!$baidang) {
            return response()->json([
               'message' => 'Không tìm thấy bài đăng với ID: '. $id
            ], 404); 
        }
        $baidang->delete();
        return redirect()->back();
    }
}
