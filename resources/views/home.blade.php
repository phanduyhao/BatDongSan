@extends('layout.layout')
@section('content')
<!-- End Navigation -->
<div class="clearfix"></div>
			
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Compare & Selected Property</h5>
        <a href="#" data-bs-dismiss="offcanvas" aria-label="Close">
            <span class="svg-icon text-primary svg-icon-2hx">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor"/>
                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor"/>
                </svg>
            </span>
        </a>
    </div>
    <div class="offcanvas-body">
        <ul class="nav nav-pills sider_tab mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-compare-tab" data-bs-toggle="pill" data-bs-target="#pills-compare" type="button" role="tab" aria-controls="pills-compare" aria-selected="true">Compare Property</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-saved-tab" data-bs-toggle="pill" data-bs-target="#pills-saved" type="button" role="tab" aria-controls="pills-saved" aria-selected="false">Saved Property</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-compare" role="tabpanel" aria-labelledby="pills-compare-tab" tabindex="0">
                <div class="sidebar_featured_property">
                            
                    <!-- List Sibar Property -->
                    <div class="sides_list_property p-2">
                        <div class="sides_list_property_thumb">
                            <img src="/temp/assets/img/p-1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="sides_list_property_detail">
                            <h4><a href="single-property-1.html">Loss vengel New Apartment</a></h4>
                            <span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Sans Fransico</span>
                            <div class="lists_property_price">
                                <div class="lists_property_types">
                                    <div class="property_types_vlix sale">For Sale</div>
                                </div>
                                <div class="lists_property_price_value">
                                    <h4 class="text-primary">$4,240</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- List Sibar Property -->
                    <div class="sides_list_property p-2">
                        <div class="sides_list_property_thumb">
                            <img src="/temp/assets/img/p-4.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="sides_list_property_detail">
                            <h4><a href="single-property-1.html">Montreal Quriqe Apartment</a></h4>
                            <span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Liverpool, London</span>
                            <div class="lists_property_price">
                                <div class="lists_property_types">
                                    <div class="property_types_vlix">For Rent</div>
                                </div>
                                <div class="lists_property_price_value">
                                    <h4 class="text-primary">$7,380</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- List Sibar Property -->
                    <div class="sides_list_property p-2">
                        <div class="sides_list_property_thumb">
                            <img src="/temp/assets/img/p-7.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="sides_list_property_detail">
                            <h4><a href="single-property-1.html">Curmic Studio For Office</a></h4>
                            <span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Montreal, Canada</span>
                            <div class="lists_property_price">
                                <div class="lists_property_types">
                                    <div class="property_types_vlix buy">For Buy</div>
                                </div>
                                <div class="lists_property_price_value">
                                    <h4 class="text-primary">$8,730</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- List Sibar Property -->
                    <div class="sides_list_property p-2">
                        <div class="sides_list_property_thumb">
                            <img src="/temp/assets/img/p-5.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="sides_list_property_detail">
                            <h4><a href="single-property-1.html">Montreal Quebec City</a></h4>
                            <span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Sreek View, New York</span>
                            <div class="lists_property_price">
                                <div class="lists_property_types">
                                    <div class="property_types_vlix">For Rent</div>
                                </div>
                                <div class="lists_property_price_value">
                                    <h4 class="text-primary">$6,240</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <a href="compare-property.html" class="btn btn-light-primary fw-medium full-width">View & Compare</a>
                    </div>
                </div>	
            </div>
            <div class="tab-pane fade" id="pills-saved" role="tabpanel" aria-labelledby="pills-saved-tab" tabindex="0">
                <div class="sidebar_featured_property">
                            
                    <!-- List Sibar Property -->
                    <div class="sides_list_property p-2">
                        <div class="sides_list_property_thumb">
                            <img src="/temp/assets/img/p-2.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="sides_list_property_detail">
                            <h4><a href="single-property-1.html">Loss vengel New Apartment</a></h4>
                            <span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Sans Fransico</span>
                            <div class="lists_property_price">
                                <div class="lists_property_types">
                                    <div class="property_types_vlix sale">For Sale</div>
                                </div>
                                <div class="lists_property_price_value">
                                    <h4 class="text-primary">$4,240</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- List Sibar Property -->
                    <div class="sides_list_property p-2">
                        <div class="sides_list_property_thumb">
                            <img src="/temp/assets/img/p-3.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="sides_list_property_detail">
                            <h4><a href="single-property-1.html">Montreal Quriqe Apartment</a></h4>
                            <span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Liverpool, London</span>
                            <div class="lists_property_price">
                                <div class="lists_property_types">
                                    <div class="property_types_vlix">For Rent</div>
                                </div>
                                <div class="lists_property_price_value">
                                    <h4 class="text-primary">$7,380</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- List Sibar Property -->
                    <div class="sides_list_property p-2">
                        <div class="sides_list_property_thumb">
                            <img src="/temp/assets/img/p-4.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="sides_list_property_detail">
                            <h4><a href="single-property-1.html">Curmic Studio For Office</a></h4>
                            <span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Montreal, Canada</span>
                            <div class="lists_property_price">
                                <div class="lists_property_types">
                                    <div class="property_types_vlix buy">For Buy</div>
                                </div>
                                <div class="lists_property_price_value">
                                    <h4 class="text-primary">$8,730</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- List Sibar Property -->
                    <div class="sides_list_property p-2">
                        <div class="sides_list_property_thumb">
                            <img src="/temp/assets/img/p-27.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="sides_list_property_detail">
                            <h4><a href="single-property-1.html">Montreal Quebec City</a></h4>
                            <span class="text-muted-2"><i class="fa-solid fa-location-dot"></i>Sreek View, New York</span>
                            <div class="lists_property_price">
                                <div class="lists_property_types">
                                    <div class="property_types_vlix">For Rent</div>
                                </div>
                                <div class="lists_property_price_value">
                                    <h4 class="text-primary">$6,240</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <a href="#" class="btn btn-light-primary fw-medium full-width">View & Compare</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================ Hero Banner  Start================================== -->
<div class="image-cover hero-banner" style="background:#eff6ff url({{$settings['banner']}}) no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11 col-sm-12">
                <div class="inner-banner-text text-center">
                    <h2>Tìm <span class="text-primary">Bất động sản</span> với giá rẻ nhất tại Việt Nam</h2>
                </div>
                <div class="full-search-2 eclip-search italian-search hero-search-radius shadow-hard mt-5">
                    <div class="hero-search-content">
                        <form method="get" method="GET" action="{{route('posts.list')}}" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col-xl-9 col-lg-6 col-md-4 col-sm-12 p-md-0 elio">
                                    <div class="form-group border-start borders">
                                        <div class="position-relative">
                                            <input type="text" name="ten_baidang" class="form-control border-0 ps-5" placeholder="Tìm kiếm theo tên bài đăng">
                                            <div class="position-absolute top-50 start-0 translate-middle-y ms-2">
                                                <span class="svg-icon text-primary svg-icon-2hx">
                                                    <svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor"/>
                                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor"/>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-2">
                                    <div class="form-group">
                                        <a class="collapsed ad-search" data-bs-toggle="collapse" data-bs-parent="#search" data-bs-target="#advance-search" href="javascript:void(0);" aria-expanded="false" aria-controls="advance-search"><i class="fa fa-sliders-h"></i></a>
                                    </div>
                                </div>
                                
                                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark full-width">Tìm kiếm</button>
                                    </div>
                                </div>
                                        
                            </div>
                        </form>
                        <!-- Collapse Advance Search Form -->
                        <div class="collapse border" id="advance-search" aria-expanded="false" role="banner">
                            <form action="{{ route('posts.list') }}" method="GET">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Tỉnh/ Thành phố</label>
                                        <select id="province" class="form-control input-field" name="province" data-require='Mời chọn tỉnh thành'>
                                            <option value="">Chọn tỉnh/thành</option>
                                        </select>
                                        <input type="hidden" name="province_name" id="province_name" value="{{ request('province_name') }}">
                                    </div>
                    
                                    <div class="form-group col-md-4">
                                        <label>Quận/ Huyện</label>
                                        <select id="district" class="form-control input-field" name="districts" data-require='Mời chọn quận huyện' {{ request('districts') ? '' : 'disabled' }}>
                                            <option value="">Chọn quận/huyện</option>
                                        </select>
                                        <input type="hidden" name="district_name" id="district_name" value="{{ request('district_name') }}">
                                    </div>
                    
                                    <div class="form-group col-md-4">
                                        <label>Phường/ Xã</label>
                                        <select id="ward" class="form-control input-field" name="wards" data-require='Mời chọn phường xã' {{ request('wards') ? '' : 'disabled' }}>
                                            <option value="">Chọn phường/xã</option>
                                        </select>
                                        <input type="hidden" name="ward_name" id="ward_name" value="{{ request('ward_name') }}">
                                    </div>
                                </div>
                                <div class="row g-3 py-4">
                                    <div class="col-md-4">
                                        <label for="author" class="form-label">Tên người đăng</label>
                                        <input type="text" class="form-control" id="author" name="author" value="{{ request('author') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date" class="form-label">Ngày đăng</label>
                                        <input type="date" class="form-control" id="date" name="date" value="{{ request('date') }}">
                                    </div>
                                    <div class="form-group col-md-4 mt-4">
                                        <label>Loại nhà đất</label>
                                        <select class="form-select form-control" id="loainhadat" name="loainhadat">
                                            <option value="">Chọn loại</option>
                                            @foreach($listnhadats as $loainhadat)
                                               <option value="{{ $loainhadat->id }}" {{ request('loainhadat') == $loainhadat->id ? 'selected' : '' }}>{{ $loainhadat->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Giá (VNĐ)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="price_min" placeholder="Từ" value="{{ request('price_min') }}">
                                            <span class="input-group-text">-</span>
                                            <input type="number" class="form-control" name="price_max" placeholder="Đến" value="{{ request('price_max') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Diện tích (m²)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="area_min" placeholder="Từ" value="{{ request('area_min') }}">
                                            <span class="input-group-text">-</span>
                                            <input type="number" class="form-control" name="area_max" placeholder="Đến" value="{{ request('area_max') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bedrooms" class="form-label">Phòng ngủ</label>
                                        <input type="number" class="form-control" id="bedrooms" name="bedrooms" value="{{ request('bedrooms') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bathrooms" class="form-label">Phòng tắm</label>
                                        <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{ request('bathrooms') }}">
                                    </div>
                                    <div class="form-group col-md-3 mt-4">
                                        <label>Hướng ban công</label>
                                        <select class="form-select form-control" id="huongbancong" name="huongbancong">
                                            <option value="">Chọn hướng ban công</option>
                                            @foreach(['Đông', 'Tây', 'Nam', 'Bắc', 'Đông Bắc', 'Đông Nam', 'Tây Bắc', 'Tây Nam'] as $huong)
                                                <option value="{{ $huong }}" {{ request('huongbancong') == $huong ? 'selected' : '' }}>{{ $huong }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 mt-4">
                                        <label>Hướng nhà</label>
                                        <select class="form-select form-control" id="huongnha" name="huongnha">
                                            <option value="">Chọn hướng nhà</option>
                                            @foreach(['Đông', 'Tây', 'Nam', 'Bắc', 'Đông Bắc', 'Đông Nam', 'Tây Bắc', 'Tây Nam'] as $huong)
                                                <option value="{{ $huong }}" {{ request('huongnha') == $huong ? 'selected' : '' }}>{{ $huong }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->

<!-- ============================ Category Start ================================== -->
<section>
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center mb-4">
                    <h2>Khám phá các danh mục</h2>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center gx-3 gy-3">
           @foreach($listnhadats as $item)
                <div class="col-xl-2 col-lg-3 col-md-3 col-6">
                    <div class="classical-cats-wrap">
                        <a class="classical-cats-boxs" href="{{ route('listByNhadat', ['slug' => $item->slug]) }}">
                            <div class="classical-cats-icon px-4 py-4 rounded bg-light-success text-success fs-2">
                                @if($item->icon != null)
                                    <img src="{{$item->icon}} " width="36" alt="">
                                @else
                                    <i class="fa-solid fa-house"></i>
                                @endif
                            </div>
                            <div class="classical-cats-wrap-content">
                                <h4>{{$item->title}}</h4>
                            </div>
                        </a>
                    </div>
                </div>
           @endforeach
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Category End ================================== -->

<section class="pt-0">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2>Tìm kiếm địa điểm tốt nhất</h2>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center g-xl-4 g-md-3 g-4">
        
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="location-property-wrap rounded-4 p-2">
                    <div class="location-property-thumb rounded-4">
                        <a href="{{ route('posts.list', ['province' => '1', 'province_name'=>'Thành phố Hà Nội']) }}"><img src="/temp/images/general/hanoi.jpg" class="img-loction-custom" alt=""></a>
                    </div>
                    <div class="location-property-content">
                        <div class="lp-content-flex">
                            <h4 class="lp-content-title">Thủ đô Hà Nội</h4>
                            
                        </div>
                        <div class="lp-content-right">
                            <a href="{{ route('posts.list', ['province' => '1']) }}" class="text-primary">
                                <span class="svg-icon svg-icon-2hx">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                        <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="location-property-wrap rounded-4 p-2">
                    <div class="location-property-thumb rounded-4">
                        <a href="{{ route('posts.list', ['province' => '48', 'province_name'=>'Thành phố Đà Nẵng']) }}"><img src="/temp/images/general/danang.jpg" class="img-loction-custom" alt=""></a>
                    </div>
                    <div class="location-property-content">
                        <div class="lp-content-flex">
                            <h4 class="lp-content-title">Thành phố Đà Nẵng</h4>
                            
                        </div>
                        <div class="lp-content-right">
                            <a href="{{ route('posts.list', ['province' => '48']) }}" class="text-primary">
                                <span class="svg-icon svg-icon-2hx">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                        <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="location-property-wrap rounded-4 p-2">
                    <div class="location-property-thumb rounded-4">
                        <a href="{{ route('posts.list', ['province' => '79']) }}"><img src="/temp/images/general/tphcm.jpg" class="img-loction-custom" alt=""></a>
                    </div>
                    <div class="location-property-content">
                        <div class="lp-content-flex">
                            <h4 class="lp-content-title">Thành phố Hồ Chí Minh</h4>
                            
                        </div>
                        <div class="lp-content-right">
                            <a href="{{ route('posts.list', ['province' => '79']) }}" class="text-primary">
                                <span class="svg-icon svg-icon-2hx">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                        <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="location-property-wrap rounded-4 p-2">
                    <div class="location-property-thumb rounded-4">
                        <a href="{{ route('posts.list', ['province' => '92']) }}"><img src="/temp/images/general/cantho.jpg" class="img-loction-custom" alt=""></a>
                    </div>
                    <div class="location-property-content">
                        <div class="lp-content-flex">
                            <h4 class="lp-content-title">Thành phố Cần Thơ</h4>
                            
                        </div>
                        <div class="lp-content-right">
                            <a href="{{ route('posts.list', ['province' => '92']) }}" class="text-primary">
                                <span class="svg-icon svg-icon-2hx">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
                                        <path d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-5">
                <a href="{{ route('posts.list') }}" class="btn btn-primary px-lg-5 rounded">Xem tất cả</a>
            </div>
        </div>
        
    </div>
</section>

<!-- ================================ All Property ========================================= -->
<section class="bg-light">
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                <div class="sec-heading mss">
                    <h2>Những bài đăng mới nhất</h2>
                </div>
            </div>
        </div>
    
        <div class="row justify-content-center g-4">
            @foreach($baidangnews as $item)
             <!-- Single Property -->
             <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="property-listing card border-0 rounded-3">
                    
                    <div class="listing-img-wrapper p-3 pb-0">
                        <div class="position-relative">
                            <div class=" position-absolute top-0 left-0 ms-3 mt-3 z-1">
                                @if($item->isVip)
                                <div class="label bg-success text-light d-inline-flex align-items-center justify-content-center">
                                    <span class="svg-icon text-light svg-icon-2hx me-1">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                            <path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="currentColor"></path>
                                        </svg>
                                        Vip
                                    </span>
                                </div>
                            @endif
                            </div>
                            <div class="list-img-slide">
                                <div class="clior">
                                    @foreach(json_decode($item->images, true) ?? [] as $image)
                                        <div><a href="{{ route('baidangDetail', $item->slug) }}"><img src="{{ $image }}" class="mx-auto img-custom rounded-4" alt="" /></a></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="listing-caption-wrapper px-3">
                        <div class="listing-detail-wrapper">
                            <div class="listing-short-detail-wrap">
                                <div class="listing-short-detail">
                                    <div class="d-flex align-items-center mb-1">
                                        <div>
                                            <span class="label bg-light-success text-success prt-type me-2">
                                                {{ $item->mohinh == 'thue' ? 'Cho thuê' : 'Bán' }}
                                            </span>
                                            <span class="label bg-light-purple text-purple property-cats">
                                                {{ $item->nhadat->title }}
                                            </span>
                                        </div>
                                    </div>
                                    <h4 class="listing-name fw-semibold fs-6 my-2"><a href="{{ route('baidangDetail', $item->slug) }}" class="prt-link-detail">{{$item->title}}</a></h4>
                                    <div class="prt-location text-muted-2 truncate-text">
                                        <span class="svg-icon svg-icon-2hx">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor"></path>
                                                <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        {{ $item->address->name 
                                            ? $item->address->name . ', ' . $item->address->ward->name . ', ' . $item->address->ward->district->name . ', ' . $item->address->ward->district->province->name 
                                            : $item->address->ward->name . ', ' . $item->address->ward->district->name . ', ' . $item->address->ward->district->province->name 
                                        }}                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="price-features-wrapper d-flex align-items-center justify-content-between my-4">
                            <div class="listing-short-detail-flex">
                                <h6 class="listing-card-info-price text-primary ps-0 m-0">
                                    @if($item->price == null)
                                        <span>Giá thỏa thuận</span>
                                    @else
                                        <span class="listing-info-price text-primary fs-4 mb-0">
                                            {{ number_format($item->price , 0, ',', '.') }} đ
                                            @if($item->mohinh != 'ban') 
                                                / Tháng
                                            @endif
                                        </span>
                                    @endif   
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="lst-detail-footer border-top py-2 px-3">
                        <div class="price-features-wrapper mb-3">
                            <div class="list-fx-features d-flex align-items-center justify-content-between">
                                <div class="listing-card d-flex align-items-center">
                                    <div class="square--30 text-muted-2 fs-sm circle gray-simple me-2"><img src="/temp/assets/img/bed.svg" width="20" alt=""></div><span class="text-muted-2">{{$item->bedrooms}} Phòng ngủ</span>
                                </div>
                                <div class="listing-card d-flex align-items-center">
                                    <div class="square--30 text-muted-2 fs-sm circle gray-simple me-2"><img src="/temp/assets/img/bathtub.svg" width="20" alt=""></div><span class="text-muted-2">{{$item->bathrooms}} Phòng tắm</span>
                                </div>
                                <div class="listing-card d-flex align-items-center">
                                    <div class="square--30 text-muted-2 fs-sm circle gray-simple me-2"><i class="fa-solid fa-building-shield fs-sm"></i></div><span class="text-muted-2">{{$item->dientich}} m<sub>2</sub></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            @endforeach
           
        </div>
        
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-5">
                <a href="{{ route('posts.list') }}" class="btn btn-primary px-lg-5 rounded">Xem tất cả</a>
            </div>
        </div>
        
    </div>		
</section>
<!-- ============================ All Featured Property ================================== -->


<!-- ============================ Explore Featured Agents Start ================================== -->
<section>
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2>Khám phá các đại lý nổi bật</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center g-4">
            
            @foreach($topUsers as $item)
                <!-- Single Agent -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="agents-grid card rounded-3 shadow">
                        
                        <div class="agents-grid-wrap">
                            <div class="fr-grid-thumb mx-auto text-center mt-5 mb-3">
                                <a href="agent-page.html" class="d-inline-flex p-1 circle border">
                                    <img src="{{$item->avatar}}" width="150" class="img-fluid circle object-fit-cover" alt="" style="height: 150px" />
                                </a>
                            </div>
                            <div class="fr-grid-deatil text-center">
                                <div class="fr-grid-deatil-flex">
                                    <h5 class="fr-can-name mb-0"><a href="#">{{$item->name}}</a></h5>
                                    <span class="agent-property text-muted-2">{{ $item->baidangs_count }} Bài đăng</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="fr-grid-info d-flex align-items-center justify-content-between px-4 py-4">
                            <div class="fr-grid-sder">
                                <ul class="p-0">
                                    <li><strong>Call:</strong><span class="fw-medium text-primary ms-2">{{$item->phone}}</span></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
        
        
    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Explore Featured Agents End ================================== -->


<!-- ============================ Smart Testimonials ================================== -->
<section class="gray-bg">
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2>Những đánh giá tốt từ khách hàng</h2>
                    <p>Những phản hồi chân thật từ khách hàng giúp chúng tôi không ngừng cải thiện và mang đến dịch vụ tốt nhất.</p>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            
            <div class="col-lg-12 col-md-12">
                
                <div class="smart-textimonials smart-center" id="smart-textimonials">
                    
                    <!-- Đánh giá 1 -->
                    <div class="item">
                        <div class="item-box">
                            <div class="smart-tes-author">
                                <div class="st-author-box">
                                    <div class="st-author-thumb">
                                        <div class="quotes bg-primary"><i class="fa-solid fa-quote-left"></i></div>
                                        <img src="/temp/assets/img/user-3.png" class="img-fluid" alt="" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="smart-tes-content">
                                <p>Dịch vụ tuyệt vời! Tôi rất hài lòng với chất lượng và sự chuyên nghiệp của đội ngũ.</p>
                            </div>
                            
                            <div class="st-author-info">
                                <h4 class="st-author-title">Adam Williams</h4>
                                <span class="st-author-subtitle">CEO của Microwoft</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Đánh giá 2 -->
                    <div class="item">
                        <div class="item-box">
                            <div class="smart-tes-author">
                                <div class="st-author-box">
                                    <div class="st-author-thumb">
                                        <div class="quotes bg-success"><i class="fa-solid fa-quote-left"></i></div>
                                        <img src="/temp/assets/img/user-8.png" class="img-fluid" alt="" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="smart-tes-content">
                                <p>Sản phẩm chất lượng cao, đội ngũ hỗ trợ nhiệt tình. Tôi sẽ tiếp tục sử dụng dịch vụ.</p>
                            </div>
                            
                            <div class="st-author-info">
                                <h4 class="st-author-title">Retha Deowalim</h4>
                                <span class="st-author-subtitle">CEO của Apple</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Đánh giá 3 -->
                    <div class="item">
                        <div class="item-box">
                            <div class="smart-tes-author">
                                <div class="st-author-box">
                                    <div class="st-author-thumb">
                                        <div class="quotes bg-purple"><i class="fa-solid fa-quote-left"></i></div>
                                        <img src="/temp/assets/img/user-4.png" class="img-fluid" alt="" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="smart-tes-content">
                                <p>Trải nghiệm tuyệt vời! Tôi rất ấn tượng với phong cách làm việc chuyên nghiệp.</p>
                            </div>
                            
                            <div class="st-author-info">
                                <h4 class="st-author-title">Sam J. Wasim</h4>
                                <span class="st-author-subtitle">Nhà sáng lập Pio</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Đánh giá 4 -->
                    <div class="item">
                        <div class="item-box">
                            <div class="smart-tes-author">
                                <div class="st-author-box">
                                    <div class="st-author-thumb">
                                        <div class="quotes bg-seegreen"><i class="fa-solid fa-quote-left"></i></div>
                                        <img src="/temp/assets/img/user-5.png" class="img-fluid" alt="" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="smart-tes-content">
                                <p>Tôi cảm thấy rất yên tâm khi sử dụng dịch vụ. Chắc chắn sẽ giới thiệu cho bạn bè.</p>
                            </div>
                            
                            <div class="st-author-info">
                                <h4 class="st-author-title">Usan Gulwarm</h4>
                                <span class="st-author-subtitle">CEO của Facewarm</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Đánh giá 5 -->
                    <div class="item">
                        <div class="item-box">
                            <div class="smart-tes-author">
                                <div class="st-author-box">
                                    <div class="st-author-thumb">
                                        <div class="quotes bg-danger"><i class="fa-solid fa-quote-left"></i></div>
                                        <img src="/temp/assets/img/user-6.png" class="img-fluid" alt="" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="smart-tes-content">
                                <p>Thật sự rất hài lòng, dịch vụ chuyên nghiệp và đội ngũ hỗ trợ tận tâm.</p>
                            </div>
                            
                            <div class="st-author-info">
                                <h4 class="st-author-title">Shilpa Shethy</h4>
                                <span class="st-author-subtitle">CEO của Zapple</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
    </div>
</section>

<!-- ============================ Smart Testimonials End ================================== -->

<!-- ========================== Download App Section =============================== -->
<section class="bg-light">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                <div class="content_block_2">
                    <div class="content-box">
                        <div class="sec-title light">
                            <p class="d-inline-flex align-items-center justify-content-center label bg-primary text-light">Tải xuống ứng dụng</p>
                            <h2 class="fs-1 lh-base">Tải xuống ứng dụng cho Iphone và Android</h2>
                        </div>
                        <div class="btn-box clearfix mt-5">
                            <a href="index.html" class="download-btn play-store">
                                <i class="fab fa-google-play"></i>
                                <span>Tải xuống từ</span>
                                <h3>Google Play</h3>
                            </a>
                            
                            <a href="index.html" class="download-btn app-store">
                                <i class="fab fa-apple"></i>
                                <span>Tải xuống từ</span>
                                <h3>App Store</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5 col-md-12 col-sm-12 image-column">
                <div class="image-box">
                    <figure class="image"><img src="/temp/assets/img/app.png" class="img-fluid" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================== Download App Section =============================== -->

<!-- ============================ Kêu Gọi Hành Động ================================== -->
<section class="bg-primary">
    <div class="container">
        
        <div class="row align-items-center justify-content-center gx-5 gy-5">
        
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-4">
                <div class="explor-thumb">
                    <img src="/temp/assets/img/partners/booking-light.png" class="img-fluid" alt="">
                </div>
            </div>
            
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-4">
                <div class="explor-thumb">
                    <img src="/temp/assets/img/partners/columbia-light.png" class="img-fluid" alt="">
                </div>
            </div>
            
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-4">
                <div class="explor-thumb">
                    <img src="/temp/assets/img/partners/Payoneer-light.png" class="img-fluid" alt="">
                </div>
            </div>
            
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-4">
                <div class="explor-thumb">
                    <img src="/temp/assets/img/partners/Paypal-light.png" class="img-fluid" alt="">
                </div>
            </div>
            
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-4">
                <div class="explor-thumb">
                    <img src="/temp/assets/img/partners/razorpay-light.png" class="img-fluid" alt="">
                </div>
            </div>
            
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-4">
                <div class="explor-thumb">
                    <img src="/temp/assets/img/partners/microsoft-light.png" class="img-fluid" alt="">
                </div>
            </div>
            
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-4">
                <div class="explor-thumb">
                    <img src="/temp/assets/img/partners/trivago-light.png" class="img-fluid" alt="">
                </div>
            </div>
            
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-4">
                <div class="explor-thumb">
                    <img src="/temp/assets/img/partners/visa-light.png" class="img-fluid" alt="">
                </div>
            </div>
            
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-4">
                <div class="explor-thumb">
                    <img src="/temp/assets/img/partners/columbia-light.png" class="img-fluid" alt="">
                </div>
            </div>
            
        </div>
        
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-7 col-lg-11">
                
                <div class="call-to-act-wrap text-center">
                    <div class="call-to-act-head mb-2">
                        <h2 class="fs-1 mb-3 lh-sm text-light">Đăng ký &<br>nhận ưu đãi đặc biệt</h2>
                        <span class="text-light opacity-75">
                            Chúng tôi cam kết mang đến cho bạn những ưu đãi tốt nhất.  
                            Hãy tham gia ngay để không bỏ lỡ bất kỳ cơ hội nào!
                        </span>
                    </div>
                </div>
                <div class="call-to-act-form">
                    <form class="newsletter-boxes p-2">
                        <div class="row m-0 g-0">
                          <div class="col-xl-10 col-9">
                            <input type="text" class="form-control border-0" placeholder="Nhập email của bạn...">
                          </div>
                          <div class="col-xl-2 col-3">
                            <button type="submit" class="btn btn-dark rounded-pill full-width">Đăng ký</button>
                          </div>
                      </div>
                    </form>
                </div>
                
            </div>
        </div>
        
    </div>
</section>

@endsection