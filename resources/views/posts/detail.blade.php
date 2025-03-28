@extends('layout.layout')
@section('content')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    
  
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    
    
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="featured_slick_gallery gray">
        <div class="featured_slick_gallery-slide overflow-hidden">
            @foreach(json_decode($baidang->images, true) ?? [] as $image)
            <div class="featured_slick_padd">
                <a href="{{ $image }}" class="mfp-gallery">
                    <img src="{{ $image }}" class="img-detail mx-auto" alt="" />
                </a>
            </div>
            @endforeach
        </div>
    </div>
    
    <!-- ============================ Hero Banner End ================================== -->
    
    <!-- ============================ Property Header Info Start================================== -->
    <section class="gray-simple rtl p-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-md-12">
            
                    <div class="property_block_wrap style-3">
                    
                        <div class="pbw-flex-1">
                            <div class="pbw-flex-thumb p-4">
                                <img src="{{$baidang->thumb}}" class="img-fluid thumb-baidang" alt="" />
                            </div>
                        </div>
                        
                        <div class="pbw-flex">
                            <div class="prt-detail-title-desc">
                                <div>
                                    <span class="label bg-light-success text-success prt-type me-2">
                                        @php
                                            $moHinhMap = [
                                                'thue' => 'Cho thuê',
                                                'ban' => 'Bán',
                                                'chuyennhuong' => 'Chuyển nhượng',
                                                'oghep' => 'Ở ghép'
                                            ];
                                        @endphp
                                        
                                    <span>{{ $moHinhMap[$baidang->mohinh] ?? 'Không xác định' }}</span>
                                    </span>
                                    <span class="label bg-light-purple text-purple property-cats">
                                        {{ $baidang->nhadat->title }}
                                    </span>
                                </div>
                                <h3 class="mt-3 listing-name">{{$baidang->title}}</h3>
                                <span>
                                    <img src="/temp/images/location.png" width="15px" alt="">
                                    {{ $baidang->address->name 
                                        ? $baidang->address->name . ', ' . $baidang->address->ward->name . ', ' . $baidang->address->ward->district->name . ', ' . $baidang->address->ward->district->province->name 
                                        : $baidang->address->ward->name . ', ' . $baidang->address->ward->district->name . ', ' . $baidang->address->ward->district->province->name 
                                    }}
                                    
                                </span>
                                <h3 class="prt-price-fix text-primary mt-2">
                                    {{ $baidang->price ? number_format($baidang->price, 0, ',', '.') . ' VND' . ($baidang->mohinh == 'thue' ? '/tháng' : '') : 'Giá thỏa thuận' }} - {{$baidang->dientich}} m<sup>2</sup>
                                </h3>
                                <div class="list-fx-features">
                                    <div class="listing-card-info-icon">
                                        <div class="inc-fleat-icon me-1"><img src="/temp/assets/img/bed.svg" width="20" alt=""></div>{{$baidang->bedrooms}} Phòng ngủ
                                    </div>
                                    <div class="listing-card-info-icon">
                                        <div class="inc-fleat-icon me-1"><img src="/temp/assets/img/bathtub.svg" width="20" alt=""></div>{{$baidang->bathrooms}} Phòng tắm
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>	
            </div>
        </div>
    </section>
    <!-- ============================ Property Header Info Start================================== -->
    
    
    <!-- ============================ Property Detail Start ================================== -->
    <section class="gray-simple min">
        <div class="container">
            <div class="row">
                
                <!-- property main detail -->
                <div class="col-lg-8 col-md-12 col-sm-12">
                    
                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap style-2">
                        
                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#features" data-bs-target="#clOne" aria-controls="clOne" href="javascript:void(0);" aria-expanded="false">
                                <h4 class="property_block_title">Chi tiết & Đặc điểm</h4>
                            </a>
                        </div>
                        <div id="clOne" class="panel-collapse collapse show" aria-labelledby="clOne">
                            <div class="block-body pb-0">
                                <ul class="deatil_features">
                                    <li><strong>Mô hình:</strong>
                                        {{ $baidang->mohinh == 'thue' ? 'Cho thuê' : 'Bán' }}
                                    </li>
                                    <li><strong>Loại nhà đất:</strong>{{$baidang->nhadat->title}}</li>
                                    <li>
                                        <strong>Diện tích:</strong>{{ number_format($baidang->dientich, 0, ',', '.') }} m<sup>2</sup>
                                    </li>
                                    <li><strong>Tháng đặt cọc:</strong>{{$baidang->baidangchitiet->thangdatcoc ?? ""}}</li>
                                    <li><strong>Tháng trả trước:</strong>{{$baidang->baidangchitiet->thangtratruoc ?? ""}}</li>

                                    <li><strong>Tuổi nhà:</strong>{{$baidang->age}}</li>
                                    @if($baidang->huongnha)
                                    <li><strong>Hướng nhà:</strong>{{$baidang->huongnha}}</li>
                                    @endif
                                    @if($baidang->huongbancong)
                                    <li><strong>Hướng bán công:</strong>{{$baidang->huongbancong}}</li>
                                    @endif
                                    @if($baidang->baidangchitiet && $baidang->baidangchitiet->sophong)
                                    <li>
                                        <strong>
                                            {{ Str::contains($baidang->nhadat->title, 'chung cư') ? "Số phòng" : "Tổng số phòng:" }}
                                        </strong>{{$baidang->baidangchitiet->sophong}}</li>
                                    @endif
                                    @if($baidang->baidangchitiet && $baidang->baidangchitiet->sotang)
                                    <li>
                                        <strong>
                                            {{ Str::contains($baidang->nhadat->title, 'chung cư') ? "Tầng" : "Số tầng:" }}
                                        </strong>{{$baidang->baidangchitiet->sotang}}</li>
                                    @endif
                                    <li><strong>Phòng ngủ:</strong>{{$baidang->bedrooms}}</li>
                                    <li><strong>Phòng tắm:</strong>{{$baidang->bathrooms}}</li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>

                    <div class="property_block_wrap style-2">
                        
                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#clTwo1" aria-controls="clTwo1" href="javascript:void(0);" aria-expanded="true"><h4 class="property_block_title">Nội thất/ Dịch vụ</h4></a>
                        </div>
                        <div id="clTwo1" class="panel-collapse collapse show">
                            <div class="block-body">
                                <ul class="deatil_features">
                                    @foreach(json_decode($baidang->thietbis, true) ?? [] as $thietbi)
                                        <li>
                                            <img src="{{ $thietbi['icon'] }}" width="20" alt="">
                                            <b>{{ $thietbi['name'] }}</b>
                                        </li>
                                    @endforeach
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap style-2">
                        
                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#clTwo" aria-controls="clTwo" href="javascript:void(0);" aria-expanded="true"><h4 class="property_block_title">Description</h4></a>
                        </div>
                        <div id="clTwo" class="panel-collapse collapse show">
                            <div class="block-body">
                                {!! $baidang->description !!}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap style-2">
                        
                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#loca"  data-bs-target="#clSix" aria-controls="clSix" href="javascript:void(0);" aria-expanded="true" class="collapsed"><h4 class="property_block_title">Location</h4></a>
                        </div>
                        
                        <div id="clSix" class="panel-collapse collapse">
                            <div class="block-body">
                                <div class="map-container">
                                    <div id="map" class="d-none" style="width: 100%; height: 400px;" data-longitude="{{$baidang->address->longitude}}" data-latitude="{{$baidang->address->latitude}}"></div>

                                </div>

                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap style-2">
                        
                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#clSev"  data-bs-target="#clSev" aria-controls="clOne" href="javascript:void(0);" aria-expanded="true" class="collapsed"><h4 class="property_block_title">Gallery</h4></a>
                        </div>
                        
                        <div id="clSev" class="panel-collapse collapse">
                            <div class="block-body">
                                <ul class="list-gallery-inline">
                                    @foreach(json_decode($baidang->images, true) ?? [] as $image)
                                    <li>
                                        <a href="{{ $image }}" class="mfp-gallery"><img src="{{ $image }}" class="img-custom mx-auto  " alt=""/></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    @if($baidang->user_id == Auth::user()->id)
                    <div class="details-sidebar">
                        <!-- Agent Detail -->
                        <div class="sides-widget border rounded shadow-sm p-3 bg-white">
                            <div class="sides-widget-header text-center py-0 rounded py-1">
                                <div class="agent-photo ">
                                    <img src="{{ optional($baidang->user)->avatar ?? '/temp/images/user.png' }}" 
                                         width="100" height="100" 
                                         class="rounded-circle border" 
                                         alt="Avatar">
                                </div>
                    
                                <div class="sides-widget-details">
                                    <h3 class="fw-bold text-primary">
                                        <a href="#" class="text-decoration-none">{{ optional($baidang->lienhe)->agent_name ?? optional($baidang->user)->name }}</a>
                                    </h3>
                                    <p>{{ $baidang->lienhe->loailienhe == 'moigioi' ? 'Môi giới' : ($baidang->lienhe->loailienhe == 'daidien' ? 'Đại diện chủ nhà' : 'Chủ nhà') }}</p>
                                </div>
                            </div>
                    
                            <div class="sides-widget-body text-center">
                                <!-- Email -->
                                @if(optional($baidang->lienhe)->email)
                                    <div class="contact-item my-2 p-2 bg-light rounded">
                                        <strong>Email:</strong> 
                                        <a href="mailto:{{ $baidang->lienhe->email }}" class="text-dark fw-semibold">
                                            {{ $baidang->lienhe->email }}
                                        </a>
                                    </div>
                                @endif
                    
                                <!-- Số điện thoại -->
                                @if(optional($baidang->lienhe)->phone)
                                    <div class="contact-item my-2 p-2 bg-light rounded">
                                        <strong>Điện thoại:</strong> 
                                        <a href="tel:{{ $baidang->lienhe->phone }}" class="text-dark fw-semibold">
                                            {{ $baidang->lienhe->phone }}
                                        </a>
                                    </div>
                                @endif
                    
                                <!-- Zalo -->
                                @if(optional($baidang->lienhe)->zalo_link)
                                    <a href="{{ $baidang->lienhe->zalo_link }}" 
                                       class="btn btn-outline-primary w-100 my-2 py-2 fw-bold d-flex align-items-center justify-content-center" 
                                       target="_blank">
                                        <img src="/temp/images/zalo.png" alt="Zalo" width="25" class="me-2"> Chat Zalo
                                    </a>
                                @endif
                    
                                <!-- Facebook -->
                                @if(optional($baidang->lienhe)->facebook)
                                    <a href="{{ $baidang->lienhe->facebook }}" 
                                       class="btn btn-outline-primary w-100 my-2 py-2 fw-bold d-flex align-items-center justify-content-center" 
                                       target="_blank">
                                        <img src="/temp/images/facebook.png" alt="Facebook" width="25" class="me-2"> Facebook
                                    </a>
                                @endif
                    
                                <!-- Telegram -->
                                @if(optional($baidang->lienhe)->telegram)
                                    <a href="{{ $baidang->lienhe->telegram }}" 
                                       class="btn btn-outline-info w-100 my-2 py-2 fw-bold d-flex align-items-center justify-content-center" 
                                       target="_blank">
                                        <img src="/temp/images/telegram.png" alt="Telegram" width="25" class="me-2"> Telegram
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="sidebar-widgets">
									
                            <h4>Bài đăng Vip</h4>
                            
                            <div class="sidebar_featured_property">
                                @foreach($baidanghots as $item)
                                    <!-- List Sibar Property -->
                                    <div class="sides_list_property">
                                        <div class="sides_list_property_thumb">
                                            <img src="{{$item->thumb}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="sides_list_property_detail">
                                            <h4 class="mb-2 listing-name"><a href="{{ route('baidangDetail', $item->slug) }}">{{$item->title}}</a></h4>
                                            <span><i class="fa-solid fa-location-dot"></i>
                                                {{ $item->address->name 
                                                    ? $item->address->name . ', ' . $item->address->ward->name . ', ' . $item->address->ward->district->name . ', ' . $item->address->ward->district->province->name 
                                                    : $item->address->ward->name . ', ' . $item->address->ward->district->name . ', ' . $item->address->ward->district->province->name 
                                                }}
                                            </span>
                                            <div class="lists_property_price">
                                                <div class="lists_property_types">
                                                    <div class="property_types_vlix sale">{{$item->mohinh == 'thue' ? "Cho thuê" : "Bán"}}</div>
                                                </div>
                                                <div class="lists_property_price_value">
                                                    @if($item->price == null)
                                                    <h6>Giá thỏa thuận</h6>
                                                @else
                                                    <h6 class="listing-info-price-4 mb-0">
                                                        {{ number_format($item->price , 0, ',', '.') }} đ
                                                        @if($item->mohinh != 'ban') 
                                                            / Tháng
                                                        @endif
                                                    </h6>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="details-sidebar">
                        <!-- Agent Detail -->
                        <div class="sides-widget border rounded shadow-sm p-3 bg-white">
                            <div class="sides-widget-header text-center py-0 rounded py-3 justify-content-center">
                                <div class="sides-widget-details text-center p-0">
                                    <h3 class="fw-bold text-primary m-0">
                                        <a href="#" class="text-decoration-none">Thông tin liên hệ</a>
                                    </h3>
                                </div>
                            </div>
                    
                            <div class="sides-widget-body text-center">
                                <!-- Email -->
                                @if(optional($baidang->lienhe)->email)
                                    <div class="contact-item my-2 p-2 bg-light rounded">
                                        <strong>Email:</strong> 
                                        <a href="mailto:{{ $settings['email'] }}" class="text-dark fw-semibold">
                                            {{ $settings['email'] }}
                                        </a>
                                    </div>
                                @endif
                    
                                <!-- Số điện thoại -->
                                <div class="contact-item my-2 p-2 bg-light rounded">
                                    <strong>Điện thoại:</strong> 
                                    <a href="tel:{{ $settings['phone'] }}" class="text-dark fw-semibold">
                                        {{ $settings['phone'] }}
                                    </a>
                                </div>
                                <!-- Facebook -->
                                <a href="{{ $baidang->lienhe->facebook }}" 
                                    class="btn btn-outline-primary w-100 my-2 py-2 fw-bold d-flex align-items-center justify-content-center" 
                                    target="_blank">
                                    <img src="/temp/images/facebook.png" alt="Facebook" width="25" class="me-2"> Facebook
                                </a>
                
                                <!-- Telegram -->
                                <a href="{{ $baidang->lienhe->telegram }}" 
                                    class="btn btn-outline-info w-100 my-2 py-2 fw-bold d-flex align-items-center justify-content-center" 
                                    target="_blank">
                                    <img src="/temp/images/telegram.png" alt="Telegram" width="25" class="me-2"> Telegram
                                </a>
                            </div>
                        </div>
                        <div class="sidebar-widgets">
									
                            <h4>Bài đăng Vip</h4>
                            
                            <div class="sidebar_featured_property">
                                @foreach($baidanghots as $item)
                                    <!-- List Sibar Property -->
                                    <div class="sides_list_property">
                                        <div class="sides_list_property_thumb">
                                            <img src="{{$item->thumb}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="sides_list_property_detail">
                                            <h4 class="mb-2 listing-name"><a href="{{ route('baidangDetail', $item->slug) }}">{{$item->title}}</a></h4>
                                            <span><i class="fa-solid fa-location-dot"></i>
                                                {{ $item->address->name 
                                                    ? $item->address->name . ', ' . $item->address->ward->name . ', ' . $item->address->ward->district->name . ', ' . $item->address->ward->district->province->name 
                                                    : $item->address->ward->name . ', ' . $item->address->ward->district->name . ', ' . $item->address->ward->district->province->name 
                                                }}
                                            </span>
                                            <div class="lists_property_price">
                                                <div class="lists_property_types">
                                                    <div class="property_types_vlix sale">{{$item->mohinh == 'thue' ? "Cho thuê" : "Bán"}}</div>
                                                </div>
                                                <div class="lists_property_price_value">
                                                    @if($item->price == null)
                                                    <h6>Giá thỏa thuận</h6>
                                                @else
                                                    <h6 class="listing-info-price-4 mb-0">
                                                        {{ number_format($item->price , 0, ',', '.') }} đ
                                                        @if($item->mohinh != 'ban') 
                                                            / Tháng
                                                        @endif
                                                    </h6>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                
            </div>
        </div>
    </section>
    <!-- ============================ Property Detail End ================================== -->
</div>
    <!-- ============================================================== -->
@endsection