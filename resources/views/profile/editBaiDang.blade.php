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
           <form id="form-dang-tin" method="POST" action="{{ route('baidang.edit', $baidang->slug) }}" enctype="multipart/form-data">
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
                                    <option value="1 nam" {{ $baidang->baidangchitiet->hopdong == '1 nam' ? 'selected' : '' }}>1 năm</option>
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
                                            <img src="{{ asset('storage/' . (is_array($image) ? $image['image'] : $image)) }}" alt="">
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
{{--                 
                <div class="form-submit">	
                    <h3>Video</h3>
                    <div class="submit-section">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div id="videoUploadBox" class="upload-box">
                                    <div class="upload-area">
                                        <i class="fa-solid fa-video upload-icon"></i>
                                        <p>Nhấn để chọn video</p>
                                        <input type="file" id="videoInput" name="video" accept="video/*" hidden>
                                    </div>
                                </div>
                                
                                <div id="videoPreviewContainer" class="preview-container"></div>
                                <input type="hidden" name="video_url" id="video_url">
                                
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Location -->
                <div class="form-submit">
                    <h3>Địa Chỉ</h3>
                    <div class="submit-section">
                        <div class="row">
                            <div class="form-group col-md-3 col-6">
                                <label> <span class="text-danger">*</span> Tỉnh/ Thành phố</label>
                                <select id="province" class="form-control input-field" name="province" data-require='Mời chọn tỉnh thành'>
                                    <option value="">Chọn tỉnh/thành</option>
                                </select>
                                <input type="hidden" name="province_name" id="province_name">

                            </div>
            
                            <div class="form-group col-md-3 col-6">
                                <label> <span class="text-danger">*</span> Quận/ Huyện</label>
                                <select id="district" class="form-control input-field" disabled name="districts" data-require='Mời chọn quận huyện'>
                                    <option value="">Chọn quận/huyện</option>
                                </select>
                                <input type="hidden" name="district_name" id="district_name">

                            </div>
            
                            <div class="form-group col-md-3 col-6">
                                <label> <span class="text-danger">*</span> Phường/ Xã</label>
                                <select id="ward" class="form-control input-field" disabled name="wards" data-require='Mời chọn phường xã'>
                                    <option value="">Chọn phường/xã</option>
                                </select>
                                <input type="hidden" name="ward_name" id="ward_name">

                            </div>
            
                            <div class="form-group col-md-3 col-6">
                                <label>Đường/ Phố</label>
                                <input type="text" id="street" class="form-control" placeholder="Nhập đường/phố" name="address">
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
                                <textarea id="description_post" class="form-control h-120 description_post ckeditor" name="description"></textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Tuổi Tòa Nhà (tùy chọn)</label>
                                <select id="bage" class="form-control" name="age">
                                    <option value="0 - 5 Năm">0 - 5 Năm</option>
                                    <option value="0 - 10 Năm">0 - 10 Năm</option>
                                    <option value="0 - 15 Năm">0 - 15 Năm</option>
                                    <option value="0 - 20 Năm">0 - 20 Năm</option>
                                    <option value="20+ Năm">20+ Năm</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Hướng nhà</label>
                                <select id="house_direction" class="form-control" name="huongnha">
                                    <option value="">Chọn hướng nhà</option>
                                    <option value="Đông">Đông</option>
                                    <option value="Tây">Tây</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Bắc">Bắc</option>
                                    <option value="Đông Bắc">Đông Bắc</option>
                                    <option value="Đông Nam">Đông Nam</option>
                                    <option value="Tây Bắc">Tây Bắc</option>
                                    <option value="Tây Nam">Tây Nam</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Hướng ban công</label>
                                <select id="balcony_direction" class="form-control" name="huongbancong">
                                    <option value="">Chọn hướng ban công</option>
                                    <option value="Đông">Đông</option>
                                    <option value="Tây">Tây</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Bắc">Bắc</option>
                                    <option value="Đông Bắc">Đông Bắc</option>
                                    <option value="Đông Nam">Đông Nam</option>
                                    <option value="Tây Bắc">Tây Bắc</option>
                                    <option value="Tây Nam">Tây Nam</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>Thiết bị / Nội thất</label>
                                <div class="o-features">
                                    <ul class="no-ul-list third-row">
                                        @foreach($thietbis as $thietbi)
                                            <li class="d-flex align-items-center gap-2">
                                                <input id="{{$thietbi->id}}" class="form-check-input" name="thietbis[{{$thietbi->id}}]" type="checkbox" value="{{$thietbi->title}}">
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
                                <input type="text" class="form-control input-field" name="name_contact" value="{{Auth::user()->name}}" data-require='Mời nhập danh thiếp'>
                            </div>

                            <div class="form-group col-md-4">
                                <label> <span class="text-danger">*</span> Email</label>
                                <input type="text" class="form-control input-field" name="email_contact" value="{{Auth::user()->email}}" data-require='Mời nhập email'>
                            </div>

                            <div class="form-group col-md-4">
                                <label> <span class="text-danger">*</span> Điện Thoại (tùy chọn)</label>
                                <input type="text" class="form-control input-field" name="phone_contact" value="{{Auth::user()->phone}}" data-require='Mời nhập số điện thoại'>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Link zalo</label>
                                <input type="text" class="form-control" name="link_zalo">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Link Facebook</label>
                                <input type="text" class="form-control" name="link_fb">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Link Telegram</label>
                                <input type="text" class="form-control" name="link_tele">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-12 col-md-12">
                    <button class="btn btn-primary fw-medium px-5" type="submit">Gửi & Xem Trước</button>
                </div>
            </div>
           </form>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Submit Property End ================================== -->

@endsection