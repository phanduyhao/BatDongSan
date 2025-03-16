@extends('layout.layout')
@section('content')
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="ipt-title">Đăng tin </h2>
                <span class="ipn-subtitle">Hãy đăng tin nhà đất của bạn</span>
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
           <form id="form-dang-tin" method="POST" action="{{route('dangbai')}}" enctype="multipart/form-data">
            @csrf
            <div class="submit-page">
                <!-- Basic Information -->
                <div class="form-submit">	
                    <h3>Thông Tin Cơ Bản</h3>
                    <div class="submit-section">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label> <input type="checkbox" class="form-check-input" id="isVip" style="margin-left: 5px;" name="isVip"> Bài Đăng Vip</label>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Tiêu Đề Tài Sản<span class="tip-topdata" data-tip="Tiêu Đề Tài Sản"><i class="fa-solid fa-info"></i></span></label>
                                <input type="text" class="form-control input-field" name="title" data-require='Mời nhập tiêu đề bài đăng'>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Mô hình</label>
                                <select id="mohinh" class="form-control" name="mohinh">
                                    <option value="thue">Cho Thuê</option>
                                    <option value="ban">Bán</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Loại Tài Sản</label>
                                <select id="ptypes" class="form-control" name="loainhadat_id">
                                    @foreach($loainhadats as $loainhadat)
                                        <option value="{{$loainhadat->id}}">{{$loainhadat->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Giá ( <input type="checkbox" class="form-check-input" id="priceNegotiable" style="margin-left: 5px;"> Giá thỏa thuận )</label>
                                <input type="text" class="form-control" id="price" placeholder="" name="price">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Diện Tích</label>
                                <input type="text" class="form-control input-field" name="area" placeholder="m2" data-require='Mời nhập diện tích'>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Số Phòng Ngủ</label>
                                <input type="number" class="form-control input-field" name="bedrooms" value="0" data-require='Mời nhập số phòng ngủ'>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Số Phòng Tắm</label>
                                <input type="number" class="form-control input-field" name="bathrooms" value="0" data-require='Mời nhập số phòng tắm'>
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
                                <div id="previewContainer" class="preview-container"></div>
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
                            <div class="form-group col-md-6">
                                <label>Tỉnh/ Thành phố</label>
                                <select id="province" class="form-control input-field" name="province" data-require='Mời chọn tỉnh thành'>
                                    <option value="">Chọn tỉnh/thành</option>
                                </select>
                                <input type="hidden" name="province_name" id="province_name">

                            </div>
            
                            <div class="form-group col-md-6">
                                <label>Quận/ Huyện</label>
                                <select id="district" class="form-control input-field" disabled name="districts" data-require='Mời chọn quận huyện'>
                                    <option value="">Chọn quận/huyện</option>
                                </select>
                                <input type="hidden" name="district_name" id="district_name">

                            </div>
            
                            <div class="form-group col-md-6">
                                <label>Phường/ Xã</label>
                                <select id="ward" class="form-control input-field" disabled name="wards" data-require='Mời chọn phường xã'>
                                    <option value="">Chọn phường/xã</option>
                                </select>
                                <input type="hidden" name="ward_name" id="ward_name">

                            </div>
            
                            <div class="form-group col-md-6">
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
                                    <option value=""></option>
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
                                    <option value=""></option>
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
                            <div class="form-group col-md-3">
                                <label>Tên</label>
                                <input type="text" class="form-control input-field" name="name_contact" value="{{Auth::user()->name}}" data-require='Mời nhập danh thiếp'>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Email</label>
                                <input type="text" class="form-control input-field" name="email_contact" value="{{Auth::user()->email}}" data-require='Mời nhập email'>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Điện Thoại (tùy chọn)</label>
                                <input type="text" class="form-control input-field" name="phone_contact" value="{{Auth::user()->phone}}" data-require='Mời nhập số điện thoại'>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Link zalo</label>
                                <input type="text" class="form-control" name="link_zalo">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-12 col-md-12">
                    <label>Thỏa Thuận GDPR *</label>
                    <ul class="no-ul-list">
                        <li>
                            <input id="aj-1" class="form-check-input" name="aj-1" type="checkbox">
                            <label for="aj-1" class="form-check-label">Tôi đồng ý để trang web này lưu trữ thông tin tôi đã gửi để họ có thể phản hồi yêu cầu của tôi.</label>
                        </li>
                    </ul>
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
<style>
    .cke_notifications_area{
        display: none !important;
    }
    .upload-box {
    border: 2px dashed #ccc;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    background-color: #f8f9fa;
    cursor: pointer;
    transition: border-color 0.3s ease-in-out;
}

.upload-box:hover {
    border-color: #007bff;
}

.upload-area {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.upload-icon {
    font-size: 40px;
    color: #007bff;
}

.upload-box p {
    font-size: 16px;
    color: #555;
}

.preview-container {
    margin-top: 15px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.preview-container img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #ddd;
    transition: transform 0.2s;
}

.preview-container img:hover {
    transform: scale(1.1);
}
/* Khung upload */
#imageUpload {
    padding: 20px;
    text-align: center;
    background-color: #f8f9fa;
    border: 2px dashed #ccc;
    cursor: pointer;
    transition: border-color 0.3s ease-in-out;
}

/* Hiệu ứng khi kéo file vào */
#imageUpload.drag-over {
    border-color: #007bff;
}

/* Khung hiển thị ảnh */
.image-preview {
    position: relative;
    display: inline-block;
    margin: 5px;
}

/* Ảnh preview */
.preview-img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
    object-fit: cover;
    border: 1px solid #ddd;
}

/* Nút X để xóa ảnh */
.remove-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    background: black;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    width: 20px;
    height: 20px;
    font-size: 12px;
    text-align: center;
    line-height: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>