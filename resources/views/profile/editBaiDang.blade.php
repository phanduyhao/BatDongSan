@extends('layout.layout')
@section('content')
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="ipt-title">{{$title}} </h2>
                <span class="ipn-subtitle">Hãy chỉnh sửa bài đăng nhà đất của bạn</span>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Submit Property Start ================================== -->
<section class="gray-simple">
    <div class="container">
        <!-- row Start -->
     
        <!-- /row -->

        <div class="row">
            <!-- Submit Form -->
            <div class="col-lg-12 col-md-12">
           <form id="form-capnhat-tin" class="form-baidang" method="POST" action="{{ route('updateBaidang', $baidang->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="submit-page" style="line-height: 3rem">
                <!-- Basic Information -->
                <div class="form-submit">
                    <h3>Thông Tin Cơ Bản</h3>
                    <div class="submit-section">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="d-flex align-items-center gx-2">
                                    <input type="checkbox" class="form-check-input mt-0 me-2" id="isVip" name="isVip" {{ $baidang->isVip ? 'checked' : '' }}> 
                                    <span>Bài Đăng Vip</span>
                                </label>
                            </div>
                
                            <div class="form-group col-md-12">
                                <label> <span class="text-danger">*</span> Tiêu Đề Tài Sản</label>
                                <input type="text" class="form-control input-field" name="title" value="{{ $baidang->title }}" required>
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label>Mô hình</label>
                                <select id="mohinh" class="form-control" name="mohinh">
                                    <option value="thue" {{ $baidang->mohinh == 'thue' ? 'selected' : '' }}>Cho Thuê</option>
                                    <option value="ban" {{ $baidang->mohinh == 'ban' ? 'selected' : '' }}>Bán</option>
                                    <option value="chuyennhuong" {{ $baidang->mohinh == 'chuyennhuong' ? 'selected' : '' }}>Chuyển nhượng</option>
                                    <option value="oghep" {{ $baidang->mohinh == 'oghep' ? 'selected' : '' }}>Ở ghép</option>
                                </select>
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label>Loại Tài Sản</label>
                                <select id="ptypes" class="form-control" name="loainhadat_id">
                                    @foreach($loainhadats as $loainhadat)
                                        <option value="{{$loainhadat->id}}" {{ $baidang->loainhadat_id == $loainhadat->id ? 'selected' : '' }}>
                                            {{$loainhadat->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label class="d-flex align-items-center">
                                    Giá ( 
                                    <input type="checkbox" class="form-check-input mt-0 me-2" id="priceNegotiable" {{ $baidang->price == 0 ? 'checked' : '' }}> 
                                    <span>Giá thỏa thuận</span> 
                                    )
                                </label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ $baidang->price}}">
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label> <span class="text-danger">*</span> Diện Tích</label>
                                <input type="text" class="form-control" name="area" value="{{ $baidang->dientich }}" placeholder="m2" required>
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label> <span class="text-danger">*</span> Tổng số phòng</label>
                                <input type="number" class="form-control input-field" name="tongsophong" value="{{ $baidang->baidangchitiet->sophong}}" required>
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label>Số tầng</label>
                                <input type="number" class="form-control" name="tongsotang" value="{{ $baidang->baidangchitiet->sotang}}">
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label>Hoa hồng</label>
                                <input type="number" class="form-control" name="hoahong" value="{{ $baidang->baidangchitiet->hoahong }}">
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label><span class="text-danger">*</span> Tháng đặt cọc</label>
                                <input type="number" class="form-control input-field" name="thangdatcoc" value="{{ $baidang->baidangchitiet->thangdatcoc }}" required>
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label><span class="text-danger">*</span> Tháng trả trước</label>
                                <input type="number" class="form-control input-field" name="thangtratruoc" value="{{ $baidang->baidangchitiet->thangtratruoc }}" required>
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label> <span class="text-danger">*</span> Số Phòng Ngủ</label>
                                <input type="number" class="form-control input-field" name="bedrooms" value="{{ $baidang->bedrooms }}" required>
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label> <span class="text-danger">*</span> Số Phòng Tắm</label>
                                <input type="number" class="form-control input-field" name="bathrooms" value="{{ $baidang->bathrooms}}" required>
                            </div>
                
                            <div class="form-group col-md-3 col-sm-4 col-12">
                                <label>Loại hợp đồng</label>
                                <select id="loaihopdong" class="form-control" name="hopdong">
                                    <option value="">Chọn loại hợp đồng</option>
                                    <option value="1thang" {{ $baidang->baidangchitiet->hopdong == '1thang' ? 'selected' : '' }}>1 - 5 tháng</option>
                                    <option value="6thang" {{ $baidang->baidangchitiet->hopdong == '6thang' ? 'selected' : '' }}>6 tháng</option>
                                    <option value="1nam" {{ $baidang->baidangchitiet->hopdong == '1 nam' ? 'selected' : '' }}>1 năm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                

                <!-- Gallery -->
                <div class="form-submit">	
                    <h3>Thư Viện Ảnh</h3>
                    <div class="submit-section">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div id="imageUpload" class="upload-box">
                                    <div class="upload-area">
                                        <i class="fa-solid fa-images upload-icon"></i>
                                        <p>Kéo & Thả hoặc Nhấn Để Chọn Ảnh</p>
                                        <input type="file" id="imageInput" name="image[]" accept="image/*" multiple hidden>
                                    </div>
                                </div>
                                <div id="previewContainer" class="preview-container" data-images="{{ json_encode($baidang->images ?? []) }}">
                                    @foreach(json_decode($baidang->images, true) ?? [] as $image)
                                        <div class="image-preview">
                                            <img src="{{ (is_array($image) ? $image['image'] : $image) }}" alt="">
                                            <span class="remove-btn" data-image-url="{{ is_array($image) ? $image['image'] : $image }}">×</span>
                                        </div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="images" id="images">
                                <input type="hidden" name="Thumb" id="Thumb">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Location -->
                <div class="form-submit">
                    <h3>Địa Chỉ</h3>
                    <div class="submit-section">
                        <div class="row">
                            <div class="form-group col-md-3 col-6">
                                <label> <span class="text-danger">*</span> Tỉnh/ Thành phố</label>
                                <select id="province" class="form-control input-field" name="province" data-require='Mời chọn tỉnh thành'>
                                    <option value="{{$baidang->address->ward->district->province->code}}">{{$baidang->address->ward->district->province->name}}</option>
                                </select>
                                <input type="hidden" name="province_name" id="province_name">

                            </div>
            
                            <div class="form-group col-md-3 col-6">
                                <label> <span class="text-danger">*</span> Quận/ Huyện</label>
                                <select id="district" class="form-control input-field" name="districts" data-require='Mời chọn quận huyện'>
                                    <option value="{{$baidang->address->ward->district->code}}">{{$baidang->address->ward->district->name}}</option>
                                </select>
                                <input type="hidden" name="district_name" id="district_name">

                            </div>
            
                            <div class="form-group col-md-3 col-6">
                                <label> <span class="text-danger">*</span> Phường/ Xã</label>
                                <select id="ward" class="form-control input-field" name="wards" data-require='Mời chọn phường xã'>
                                    <option value="{{$baidang->address->ward->code}}">{{$baidang->address->ward->name}}</option>
                                </select>
                                <input type="hidden" name="ward_name" id="ward_name">

                            </div>
            
                            <div class="form-group col-md-3 col-6">
                                <label>Đường/ Phố</label>
                                <input type="text" id="street" class="form-control" placeholder="Nhập đường/phố"  value="{{$baidang->address->street}}" name="address">
                            </div>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="Longitude" id="Longitude">

                        </div>
                    </div>
                </div>
            
                {{-- <iframe class="d-none" id="mapFrame" width="100%" height="400" style="border:0;" 
                allowfullscreen="" loading="lazy"></iframe> --}}
                <div id="map" class="d-none" style="width: 100%; height: 400px;"></div>

                
                <!-- Detailed Information -->
                <div class="form-submit mt-4">	
                    <h3>Thông Tin Chi Tiết</h3>
                    <div class="submit-section">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Mô Tả</label>
                                <textarea id="description_post" class="form-control h-120 description_post ckeditor" name="description">{{$baidang->description}}</textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Tuổi Tòa Nhà (tùy chọn)</label>
                                <select id="bage" class="form-control" name="age">
                                    <option value="0 - 5 Năm" {{ $baidang->age == "0 - 5 Năm" ? 'selected' : '' }}>0 - 5 Năm</option>
                                    <option value="0 - 10 Năm" {{ $baidang->age == "0 - 10 Năm" ? 'selected' : '' }}>0 - 10 Năm</option>
                                    <option value="0 - 15 Năm" {{ $baidang->age == "0 - 15 Năm" ? 'selected' : '' }}>0 - 15 Năm</option>
                                    <option value="0 - 20 Năm" {{ $baidang->age == "0 - 20 Năm" ? 'selected' : '' }}>0 - 20 Năm</option>
                                    <option value="20+ Năm" {{ $baidang->age == "20+ Năm" ? 'selected' : '' }}>20+ Năm</option>
                                </select>
                                
                            </div>
                            <div class="form-group col-md-4">
                                <label>Hướng nhà</label>
                                <select id="house_direction" class="form-control" name="huongnha">
                                    <option value="">Chọn hướng nhà</option>
                                    <option value="Đông" {{ $baidang->huongnha == "Đông" ? 'selected' : '' }}>Đông</option>
                                    <option value="Tây" {{ $baidang->huongnha == "Tây" ? 'selected' : '' }}>Tây</option>
                                    <option value="Nam" {{ $baidang->huongnha == "Nam" ? 'selected' : '' }}>Nam</option>
                                    <option value="Bắc" {{ $baidang->huongnha == "Bắc" ? 'selected' : '' }}>Bắc</option>
                                    <option value="Đông Bắc" {{ $baidang->huongnha == "Đông Bắc" ? 'selected' : '' }}>Đông Bắc</option>
                                    <option value="Đông Nam" {{ $baidang->huongnha == "Đông Nam" ? 'selected' : '' }}>Đông Nam</option>
                                    <option value="Tây Bắc" {{ $baidang->huongnha == "Tây Bắc" ? 'selected' : '' }}>Tây Bắc</option>
                                    <option value="Tây Nam" {{ $baidang->huongnha == "Tây Nam" ? 'selected' : '' }}>Tây Nam</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Hướng ban công</label>
                                <select id="balcony_direction" class="form-control" name="huongbancong">
                                    <option value="">Chọn hướng ban công</option>
                                    <option value="Đông" {{ $baidang->huongnha == "Đông" ? 'selected' : '' }}>Đông</option>
                                    <option value="Tây" {{ $baidang->huongnha == "Tây" ? 'selected' : '' }}>Tây</option>
                                    <option value="Nam" {{ $baidang->huongnha == "Nam" ? 'selected' : '' }}>Nam</option>
                                    <option value="Bắc" {{ $baidang->huongnha == "Bắc" ? 'selected' : '' }}>Bắc</option>
                                    <option value="Đông Bắc" {{ $baidang->huongnha == "Đông Bắc" ? 'selected' : '' }}>Đông Bắc</option>
                                    <option value="Đông Nam" {{ $baidang->huongnha == "Đông Nam" ? 'selected' : '' }}>Đông Nam</option>
                                    <option value="Tây Bắc" {{ $baidang->huongnha == "Tây Bắc" ? 'selected' : '' }}>Tây Bắc</option>
                                    <option value="Tây Nam" {{ $baidang->huongnha == "Tây Nam" ? 'selected' : '' }}>Tây Nam</option>
                                </select>
                            </div>
                            
                            @php
                                // Lấy danh sách thiết bị đã chọn từ dữ liệu bài đăng (chuyển JSON thành mảng)
                                $selectedThietBis = json_decode($baidang->thietbis ?? '[]', true);
                                $selectedThietBiNames = array_column($selectedThietBis, 'name'); // Lấy danh sách tên
                            @endphp
                            
                            <div class="form-group col-md-12">
                                <label>Thiết bị / Dịch Vụ</label>
                                <div class="o-features">
                                    <ul class="no-ul-list third-row">
                                        @foreach($thietbis as $thietbi)
                                            @php
                                                // Kiểm tra nếu thiết bị có trong danh sách đã chọn
                                                $isChecked = in_array($thietbi->title, $selectedThietBiNames);
                                            @endphp
                                            <li class="d-flex align-items-center gap-2">
                                                <input id="{{$thietbi->id}}" class="form-check-input" 
                                                    name="thietbis[{{$thietbi->id}}]" type="checkbox" 
                                                    value="{{$thietbi->title}}" {{ $isChecked ? 'checked' : '' }}>
                            
                                                <input type="hidden" name="icon_thietbi[{{$thietbi->id}}]" value="{{$thietbi->icon}}">
                                                
                                                <div>
                                                    @if($thietbi->icon != null)
                                                        <img src="{{$thietbi->icon}}" width="30px" alt="">
                                                    @endif
                                                    <label for="{{$thietbi->id}}" class="form-check-label">{{$thietbi->title}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="form-submit">	
                    <h3>Thông Tin Liên Hệ</h3>
                    <div class="submit-section">
                        <div class="row">
                            
                            <div class="form-group col-md-4">
                                <label> <span class="text-danger">*</span> Tên</label>
                                <input type="text" class="form-control input-field" name="name_contact" value="{{$baidang->lienhe->agent_name}}" data-require='Mời nhập danh thiếp'>
                            </div>

                            <div class="form-group col-md-4">
                                <label> <span class="text-danger">*</span> Email</label>
                                <input type="text" class="form-control input-field" name="email_contact" value="{{$baidang->lienhe->email}}" data-require='Mời nhập email'>
                            </div>

                            <div class="form-group col-md-4">
                                <label> <span class="text-danger">*</span> Điện Thoại (tùy chọn)</label>
                                <input type="text" class="form-control input-field" name="phone_contact" value="{{$baidang->lienhe->phone}}" data-require='Mời nhập số điện thoại'>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Loại liên hệ</label>
                                <select id="loailienhe" class="form-control" name="loailienhe">
                                    <option value="moigioi" {{ $baidang->lienhe->loailienhe == 'moigioi' ? 'selected' : '' }}>Môi giới</option>
                                    <option value="daidien" {{ $baidang->lienhe->loailienhe == 'daidien' ? 'selected' : '' }}>Đại diện chủ nhà</option>
                                    <option value="chunha" {{ $baidang->lienhe->loailienhe == 'chunha' ? 'selected' : '' }}>Chủ nhà</option>
                                </select>                            </div>
                            <div class="form-group col-md-4">
                                <label>Link Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="{{$baidang->lienhe->facebook}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Link Telegram</label>
                                <input type="text" class="form-control" name="telegram" value="{{$baidang->lienhe->telegram}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-12 col-md-12">
                    <button class="btn btn-primary fw-medium px-5" type="submit">Cập nhật</button>
                </div>
            </div>
           </form>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Submit Property End ================================== -->

@endsection