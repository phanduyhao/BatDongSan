<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use App\Models\Address;
use App\Models\Baidang;
use App\Models\Thietbi;
use App\Models\District;
use App\Models\Province;
use App\Models\Loainhadat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Baidanglienhe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index(){
       $loainhadats = Loainhadat::select('id', 'title')->get();
       $thietbis = Thietbi::select('id', 'title','icon')->get();
        return view('posts.index',compact('loainhadats','thietbis'),[
            'title' => 'Đăng tin'
        ]);
    }

    public function store(Request $request)
    {
        Log::info('DATA: ', $request->all());

        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'mohinh' => 'required|string',
            'area' => 'required|numeric',
            'loainhadat_id' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'description' => 'nullable|string',
            'email_contact' => 'required|email',
            'phone_contact' => 'nullable|string',
            'link_zalo' => 'nullable|string',
            'images' => 'nullable|array',
            'thietbis' => 'nullable|array',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422); // Trả về lỗi 422 (Unprocessable Entity)
        }
    
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
    
            // Xử lý thiết bị
            $thietbis = [];
            if ($request->has('thietbis')) {
                foreach ($request->input('thietbis') as $id => $name) {
                    $icon = Thietbi::find($id)->icon ?? null;
                    $thietbis[] = ['name' => $name, 'icon' => $icon];
                }
            }
    
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
            $baidang->thietbis = json_encode($thietbis);
            $baidang->status = 1;
            if(Auth::user()->role == 'admin'){
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
    
            $baidang->save();
            $baidang->slug = Str::slug($baidang->title . '-' . $baidang->id);
            $baidang->save();
    
            // Lưu thông tin liên hệ
            $contact = new Baidanglienhe();
            $contact->baidang_id = $baidang->id;
            $contact->agent_name = $request->name_contact;
            $contact->phone = $request->phone_contact;
            $contact->email = $request->email_contact;
            $contact->zalo_link = $request->link_zalo;
            $contact->save();
    
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
    
}
