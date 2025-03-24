@extends('layout.layout')
@section('content')
<section class="bg-primary position-relative py-3">
    <div class="position-absolute start-0 top-0 w-25 h-15 bg-light rounded-end-pill opacity-25 mt-4"></div>
    <div class="position-absolute start-0 bottom-0 w-15 h-20 bg-light rounded-top-pill opacity-25 ms-4"></div>
    <div class="position-absolute end-0 top-0 w-15 h-25 bg-light rounded-bottom-pill opacity-25 me-4"></div>
    <div class="position-absolute end-0 bottom-0 w-25 h-15 bg-light rounded-start-pill opacity-25 mb-4"></div>
    <div class="ht-30"></div>
    <div class="container text-center">
        <h2>{{$title}}</h2>
    </div>
    <div class="ht-30"></div>
</section>
<!-- ============================ All Property ================================== -->
<section class="gray-simple">
    <div class="container">
       
        <div class="row m-0">
            <div class="short_wraping">
                <div class="row px-3 align-items-center">
                    @php
                        $filters = [];

                        // Lọc theo địa điểm
                        if (request()->filled('province')) {
                            $filters[] = "Tỉnh/Thành phố: " . \App\Models\Province::where('code', request('province'))->value('name');
                        }
                        if (request()->filled('district')) {
                            $filters[] = "Quận/Huyện: " . \App\Models\District::where('code', request('district'))->value('name');
                        }
                        if (request()->filled('ward')) {
                            $filters[] = "Phường/Xã: " . \App\Models\Ward::where('code', request('ward'))->value('name');
                        }

                        // Lọc theo khoảng giá
                        if (request()->filled('price_min') && request()->filled('price_max')) {
                            $filters[] = "Khoảng giá: " . number_format(request('price_min')) . " - " . number_format(request('price_max')) . " VND";
                        } elseif (request()->filled('price_min')) {
                            $filters[] = "Giá từ: " . number_format(request('price_min')) . " VND";
                        } elseif (request()->filled('price_max')) {
                            $filters[] = "Giá đến: " . number_format(request('price_max')) . " VND";
                        }

                        // Lọc theo diện tích
                        if (request()->filled('area_min') && request()->filled('area_max')) {
                            $filters[] = "Diện tích: " . request('area_min') . " - " . request('area_max') . " m²";
                        } elseif (request()->filled('area_min')) {
                            $filters[] = "Diện tích từ: " . request('area_min') . " m²";
                        } elseif (request()->filled('area_max')) {
                            $filters[] = "Diện tích đến: " . request('area_max') . " m²";
                        }

                        // Lọc theo số phòng
                        if (request()->filled('bedrooms')) {
                            $filters[] = "Số phòng ngủ: " . request('bedrooms') . "+";
                        }
                        if (request()->filled('bathrooms')) {
                            $filters[] = "Số phòng tắm: " . request('bathrooms') . "+";
                        }

                        // Lọc theo hướng nhà và ban công
                        if (request()->filled('huongnha')) {
                            $filters[] = "Hướng nhà: " . request('huongnha');
                        }
                        if (request()->filled('huongbancong')) {
                            $filters[] = "Hướng ban công: " . request('huongbancong');
                        }

                        // Lọc theo thời gian đăng
                        if (request()->filled('days')) {
                            $filters[] = "Đăng trong " . request('days') . " ngày gần đây";
                        }

                        // Lọc theo tin VIP
                        if (request()->filled('isVip')) {
                            $filters[] = "Tin VIP";
                        }

                        // Lọc theo tiêu đề bài đăng
                        if (request()->filled('ten_baidang')) {
                            $filters[] = "Từ khóa: \"" . request('ten_baidang') . "\"";
                        }

                        // Sắp xếp theo tiêu chí
                        $sortingOptions = [
                            1 => "Giá thấp đến cao",
                            2 => "Giá cao đến thấp",
                            3 => "Mới nhất"
                        ];
                        if (request()->filled('shorty') && isset($sortingOptions[request('shorty')])) {
                            $filters[] = "Sắp xếp theo: " . $sortingOptions[request('shorty')];
                        }
                    @endphp

                    <div class="col-lg-9 col-md-6 col-sm-12">
                        <h5>
                            Kết quả tìm kiếm theo: {!! implode(', ', $filters) !!}
                        </h5>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 order-lg-3 order-md-2 col-sm-6 pe-0">
                        <div class="shorting-right">
                            <label class="me-2">Sắp xếp:</label>
                            <form method="GET" action="{{ route('posts.list') }}" class="shorting-by border rounded" id="sort-form">
                                @csrf
                    
                                {{-- Duy trì tất cả các query params trước đó (trừ shorty để tránh trùng lặp) --}}
                                @foreach(request()->query() as $key => $value)
                                    @if($key != 'shorty') 
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endif
                                @endforeach
                    
                                <select id="shorty" name="shorty" class="form-control rounded" onchange="document.getElementById('sort-form').submit();">
                                    <option value="">Sắp xếp</option>
                                    <option value="1" {{ request('shorty') == '1' ? 'selected' : '' }}>Thấp đến cao</option>
                                    <option value="2" {{ request('shorty') == '2' ? 'selected' : '' }}>Cao đến thấp</option>
                                    <option value="3" {{ request('shorty') == '3' ? 'selected' : '' }}>Mới nhất</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <div class="row">
        
            <!-- property Sidebar -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="position-sticky" style="top:15%">
                    <div class="simple-sidebar sm-sidebar" id="filter_search" style="left:0;">							
                
                        <div class="search-sidebar_header">
                            <h4 class="ssh_heading">Close Filter</h4>
                            <button onclick="closeFilterSearch()" class="w3-bar-item w3-button w3-large"><i class="fa-regular fa-circle-xmark fs-5 text-muted-2"></i></button>
                        </div>
                        
                        <!-- Find New Property -->
                        <div class="sidebar-widgets">
                            
                            <div class="search-inner p-0">
                                
                                <div class="filter-search-box">
                                    <form method="get" method="GET" action="{{route('posts.list')}}" class="form-group">
                                        @csrf
                                        <div class="position-relative">
                                            <input type="text" class="form-control rounded-3 ps-5" name="ten_baidang" placeholder="Tìm kiếm theo tên bài đăng">
                                            <div class="position-absolute top-50 start-0 translate-middle-y ms-2">
                                                <span class="svg-icon text-primary svg-icon-2hx">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>	
                                            </div>
                                            <button class="btn btn-dark position-absolute top-0 end-0">
                                                Tìm kiếm
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="position-relative d-flex flex-xl-row flex-column align-items-center">
                                    <div class="verifyd-prt-block flex-fill full-width my-1 me-1 d-flex align-items-center justify-content-between gx-2">
                                        <div class="d-flex align-items-center justify-content-center justify-content-between border rounded-3 px-2 py-3">
                                            <div class="eliok-cliops d-flex align-items-center">
                                                <span class="svg-icon text-success svg-icon-2hx">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                                                    </svg>
                                                </span><span class="text-muted-2 fw-medium me-3 text-nowrap">Bài đăng Vip</span>
                                            </div>
                                            <div class="form-check form-switch d-flex justify-content-center gx-2 m-0 align-items-center">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                                {{ request('isVip') == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                            </div>
                                        </div>
                                        <div class="ms-1 ">
                                            <button type="button" class="btn btn-white border fw-bold" data-bs-toggle="modal" data-bs-target="#filterModal">
                                                <img src="/temp/images/filter.png" width="30px" alt="">
                                                <span>Lọc</span>
                                            </button>
                                        </div>
    
                                    </div>
                                    <button type="button" class="btn btn-secondary text-nowrap" onclick="window.location.href='{{ route('posts.list') }}'">Đặt lại</button>
    
                                </div>
                            </div>							
                        </div>
                    </div>
                    <div class="simple-sidebar sm-sidebar" id="filter_search" style="left:0;">							
                        <h4 class="ssh_heading">Loại nhà đất</h4>
                        <div class="filter_wraps">
                                                
                                                
                            <div class="single_search_boxed">
                                <div class="widget-boxed-body collapse show" id="where" data-parent="#where" style="">
                                    <div class="side-list no-border">
                                        <!-- Single Filter Card -->
                                        <div class="single_filter_card">
                                            <div class="card-body pt-0">
                                                <div class="inner_widget_link">
                                                    <ul class="no-ul-list filter-list">
                                                        @foreach($listnhadats as $item)
                                                            <li class="form-check">
                                                                <a href="{{ route('listByNhadat', ['slug' => $item->slug]) }}">
                                                                    <img src="{{ $item->icon }}" width="20px" alt="">
                                                                    <span class="text-muted-2 fw-medium">{{ $item->title }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-12 list-layout">
                <div class="row justify-content-center g-4">
                    <!-- Single Property -->
                    @foreach($list_baidangs as $item)
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="property-listing list_view style_new row">
                               <div class="col-6">
                                    <div class="listing-img-wrapper position-relative">
                                        <div class="position-absolute top-0 left-0 ms-3 mt-3 z-1">
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
                                                    <div><a href="{{ route('baidangDetail', $item->slug) }}"><img src="{{ $image }}" class="img-fluid mx-auto rounded-4" alt="" /></a></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                               </div>
                                
                                <div class="col-6">
                                    <div class="list_view_flex">
                                        <div class="listing-detail-wrapper mt-1">
                                            <div class="listing-short-detail-wrap">
                                                <div class="_card_list_flex mb-2">
                                                    <div class="_card_flex_01 d-flex align-items-center">
                                                        <span class="label bg-light-purple text-purple">{{$item->mohinh == 'thue' ? "Cho thuê" : "Bán"}}</span>
                                                    </div>
                                                    <div class="_card_flex_last">
                                                        @if($item->price == null)
                                                            <h6>Giá thỏa thuận</h6>
                                                        @else
                                                            <h6 class="listing-info-price text-primary fs-4 mb-0">
                                                                {{ number_format($item->price , 0, ',', '.') }} đ
                                                                @if($item->mohinh != 'ban') 
                                                                    / Tháng
                                                                @endif
                                                            </h6>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="_card_list_flex">
                                                    <div class="_card_flex_01">
                                                        <h4 class="listing-name mt-2"><a href="{{ route('baidangDetail', $item->slug) }}" class="prt-link-detail mt-3">{{$item->title}}</a></h4>
                                                    </div>
                                                </div>
                                                <span class="truncate-text">
                                                    <img src="/temp/images/location.png" width="15px" alt="">
                                                    {{ $item->address->name 
                                                        ? $item->address->name . ', ' . $item->address->ward->name . ', ' . $item->address->ward->district->name . ', ' . $item->address->ward->district->province->name 
                                                        : $item->address->ward->name . ', ' . $item->address->ward->district->name . ', ' . $item->address->ward->district->province->name 
                                                    }}
                                                    
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="price-features-wrapper">
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
                                        
                                        <div class="listing-detail-footer text-end">
                                            <div class="footer-flex d-flex justify-content-between">
                                                <div class="d-flex flex-column align-items-start fw-bold">
                                                    @if($item->baidangchitiet && $item->baidangchitiet->thangdatcoc)
                                                        <span>Đặt cọc: {{ $item->baidangchitiet->thangdatcoc }} tháng </span>
                                                    @endif
                                                    
                                                    @if($item->baidangchitiet && $item->baidangchitiet->thangtratruoc)
                                                        <span>Trả trước: {{ $item->baidangchitiet->thangtratruoc }} tháng </span>
                                                    @endif
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <div class="sides-widget-body text-center p-0 border-top ">   
                                <div class="sides-widget-header text-center py-2 justify-content-between align-items-center bg-light">
                                   <div class="d-flex align-items-center">
                                        <div class="agent-photo">
                                            <img src="{{ optional($item->user)->avatar ?? '/temp/images/user.png' }}" width="40" height="40" alt="Avatar">
                                        </div>
                                        
                                        <div class="">
                                            <h4 class="text-truncate text-dark mb-0 ms-3" style="max-width: 200px;">
                                                <a href="#">{{ optional($item->lienhe)->agent_name ?? optional($item->user)->name }}</a>
                                            </h4>
                                        </div>
                                   </div>
                                    
                                </div>       
                            </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End Single Property -->
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <ul class="pagination p-center">
                            {{ $list_baidangs->links() }}
                        </ul>
                    </div>
                </div>
        
            </div>
            
        </div>
    </div>	
</section>
<!-- ============================ All Property ================================== -->
<!-- Modal Lọc Bài Đăng -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 1024px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Lọc Bài Đăng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('posts.list') }}'">Đặt lại</button>
                        <button type="submit" class="btn btn-primary">Lọc</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('shorty').addEventListener('change', function() {
        this.form.submit(); // Gửi form khi thay đổi
    });
    document.getElementById("flexSwitchCheckChecked").addEventListener("change", function() {
    let isVip = this.checked ? 1 : 0; // Nếu checked thì = 1, ngược lại = 0
    let searchParams = new URLSearchParams(window.location.search);
    
    if (isVip) {
        searchParams.set("isVip", 1); // Thêm isVip vào URL
    } else {
        searchParams.delete("isVip"); // Xóa nếu không chọn VIP
    }

    window.location.search = searchParams.toString(); // Load lại trang với URL mới
});
function showFullPhone(btn, fullPhone) {
        if (fullPhone && fullPhone !== "Chưa có số") {
            btn.querySelector("span").textContent = fullPhone;
        }
    }
</script>
@endsection