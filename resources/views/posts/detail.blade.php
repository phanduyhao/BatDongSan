@extends('layout.layout')
@section('content')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    
  
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    
    
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="featured_slick_gallery gray">
        <div class="featured_slick_gallery-slide overflow-hidden" style="height: 40rem">
            @foreach(json_decode($baidang->images, true) ?? [] as $image)
            <div class="featured_slick_padd">
                <a href="{{ $image }}" class="mfp-gallery">
                    <img src="{{ $image }}" class="img-fluid mx-auto" alt="" />
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
                                <img src="{{$baidang->thumb}}" width="150" class="img-fluid" alt="" />
                            </div>
                        </div>
                        
                        <div class="pbw-flex">
                            <div class="prt-detail-title-desc">
                                <div>
                                    <span class="label text-light bg-success fs-6">
                                        {{ $baidang->mohinh == 'thue' ? 'Cho thuê' : 'Bán' }}
                                    </span>
                                    <span class="label text-light bg-info ms-3 fs-6">
                                        {{ $baidang->nhadat->title }}
                                    </span>
                                </div>
                                <h3 class="mt-3">{{$baidang->title}}</h3>
                                <span>
                                    <img src="/temp/images/location.png" width="15px" alt="">
                                    {{ $baidang->address->name 
                                        ? $baidang->address->name . ', ' . $baidang->address->ward->name . ', ' . $baidang->address->ward->district->name . ', ' . $baidang->address->ward->district->province->name 
                                        : $baidang->address->ward->name . ', ' . $baidang->address->ward->district->name . ', ' . $baidang->address->ward->district->province->name 
                                    }}
                                    
                                </span>
                                <h3 class="prt-price-fix text-primary">
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
                                    <li><strong>Tổng số phòng:</strong>{{$baidang->baidangchitiet->sophong}}</li>
                                    @endif
                                    @if($baidang->baidangchitiet && $baidang->baidangchitiet->sotang)
                                    <li><strong>Tổng số tầng:</strong>{{$baidang->baidangchitiet->sotang}}</li>
                                    @endif
                                    <li><strong>Phòng ngủ:</strong>{{$baidang->bedrooms}}</li>
                                    <li><strong>Phòng tắm:</strong>{{$baidang->bathrooms}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="property_block_wrap_header">
                            <a data-bs-toggle="collapse" data-parent="#features" data-bs-target="#clOne" aria-controls="clOne" href="javascript:void(0);" aria-expanded="false">
                                <h4 class="property_block_title">Nội thất/ Dịch vụ</h4>
                            </a>
                        </div>
                        <div id="clOne" class="panel-collapse collapse show" aria-labelledby="clOne">
                            <div class="block-body pb-0">
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
                                        <a href="{{ $image }}" class="mfp-gallery"><img src="{{ $image }}" class="img-fluid mx-auto object-fit-contain " alt="" width="200px" style="height: 150px"/></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    
                    <!-- Like And Share -->
                    <div class="like_share_wrap b-0">
                        <ul class="like_share_list">
                            <li><a href="JavaScript:Void(0);" class="btn btn-likes" data-toggle="tooltip" data-original-title="Share"><i class="fas fa-share"></i>Share</a></li>
                            <li><a href="JavaScript:Void(0);" class="btn btn-likes" data-toggle="tooltip" data-original-title="Save"><i class="fas fa-heart"></i>Save</a></li>
                        </ul>
                    </div>
                    
                    <div class="details-sidebar">
                    
                        <!-- Agent Detail -->
                        <div class="sides-widget">
                            <div class="sides-widget-header text-center py-2">
                                <div class="agent-photo">
                                    <img src="{{ optional($baidang->user)->avatar ?? '/temp/images/user.png' }}" width="70" height="70" alt="Avatar">
                                </div>
                                
                                <div class="sides-widget-details mt-2">
                                    <h4 class="text-truncate" style="max-width: 200px;">
                                        <a href="#">{{ optional($baidang->lienhe)->agent_name ?? optional($baidang->user)->name }}</a>
                                    </h4>
                                </div>
                            </div>
                            
                            <div class="sides-widget-body text-center ">
                                <!-- Nút chat qua Zalo -->
                                @if(optional($baidang->lienhe)->zalo_link)
                                    <a href="{{ $baidang->lienhe->zalo_link }}" class="btn btn-light d-flex align-items-center justify-content-center" target="_blank">
                                        <img src="/temp/images/zalo.png" alt="Zalo" width="20" class="me-2"> Chat qua Zalo
                                    </a>
                                @endif
                        
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ============================ Property Detail End ================================== -->
</div>
    <!-- ============================================================== -->
@endsection