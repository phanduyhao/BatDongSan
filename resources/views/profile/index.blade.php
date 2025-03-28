@extends('layout.layout')
@section('content')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    
                    <h2 class="ipt-title">Trang cá nhân!</h2>
                    <span class="ipn-subtitle">Trang cá nhân của bạn!</span>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
    
    <!-- ============================ User Dashboard ================================== -->
    <section class="bg-light">
        <div class="container-fluid">
        
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="filter_search_opt">
                        <a href="javascript:void(0);" onclick="openFilterSearch()" class="btn btn-dark full-width mb-4">Dashboard Navigation<i class="fa-solid fa-bars ms-2"></i></a>
                    </div>
                </div>
            </div>
                        
            <div class="row">
                
                <div class="col-lg-2 col-md-12">
                    
                    <div class="simple-sidebar sm-sidebar" id="filter_search">
                        
                        <div class="search-sidebar_header">
                            <h4 class="ssh_heading">Close Filter</h4>
                            <button onclick="closeFilterSearch()" class="w3-bar-item w3-button w3-large"><i class="fa-regular fa-circle-xmark fs-5 text-muted-2"></i></button>
                        </div>
                        
                        <div class="sidebar-widgets">
                            <div class="dashboard-navbar">
                                <div class="fr-grid-thumb mx-auto text-center mt-5 mb-0">
                                    <a href="agent-page.html" class="d-inline-flex p-1 circle border">
                                        <img src="{{Auth::user()->avatar}}" width="150" class="img-fluid circle object-fit-cover" alt="" style="height: 150px" />
                                    </a>
                                </div>
                                <div class="d-user-avater mt-0">
                                    <h4>{{Auth::user()->name}}</h4>
                                    <span>{{Auth::user()->email}}</span>
                                </div>
                                
                                <div class="d-navigation">
                                    <ul>
                                        <li class="active"><a href="{{route('profile.index')}}"><i class="fa-solid fa-gauge"></i>Tổng quát</a></li>
                                        <li><a href="{{route('profile.listBaidang')}}"><i class="fa-solid fa-address-card"></i>Danh sách bài đăng</a></li>
                                        <li><a href="{{route('showChangePass')}}"><i class="fa-solid fa-unlock"></i>Thay đổi mật khẩu</a></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-lg-10 col-md-12">
                    <div class="row">
                     
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="dashboard-stat widget-1">
                                <div class="dashboard-stat-content"><h4>{{$tongBaidang}}</h4> <span class="mt-3 fw-bold text-dark">Tổng số bài đăng</span></div>
                                <div class="dashboard-stat-icon "><i class="fa-solid fa-location-dot"></i></div>
                            </div>	
                        </div>
                        
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="dashboard-stat widget-6">
                                <div class="dashboard-stat-content"><h4>{{$tongBaidangDuyet}}</h4> <span class="mt-3 fw-bold text-dark">Bài đăng đã duyệt</span></div>
                                <div class="dashboard-stat-icon"><i class="ti-user"></i></div>
                            </div>	
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="dashboard-stat widget-2">
                                <div class="dashboard-stat-content"><h4>{{$tongBaidangChoduyet}}</h4> <span class="mt-3 fw-bold text-dark">Bài đăng chờ duyệt</span></div>
                                <div class="dashboard-stat-icon"><i class="ti-pie-chart"></i></div>
                            </div>	
                        </div>
                        
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="dashboard-stat widget-4">
                                <div class="dashboard-stat-content"><h4>{{$tongBaidangHuy}}</h4> <span class="mt-3 fw-bold text-dark">Bài đăng bị hủy</span></div>
                                <div class="dashboard-stat-icon"><i class="fa-solid fa-location-dot"></i></div>
                            </div>	
                        </div>

                    </div>
            
                    <div class="dashboard-wraper">
                    
                        <!-- Basic Information -->
                        <div class="form-submit">	
                            <h4>Thông tin cá nhân</h4>
                            <form method="POST" action="{{ route('profile.update',['user' => $user]) }}" enctype="multipart/form-data" class="submit-section mt-5">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group col-12">
                                            <div class="fr-grid-thumb mx-auto">
                                                <!-- Avatar Preview -->
                                                <label for="avatar-upload" class="d-inline-flex p-1 border cursor-pointer">
                                                    <img id="avatar-preview" src="{{ Auth::user()->avatar }}" width="300" class="img-fluid object-fit-cover" alt="" style="height: 300px; cursor: pointer;" />
                                                </label>
                                            
                                                <!-- Hidden File Input -->
                                                <input type="file" id="avatar-upload" name="avatar" class="d-none" accept="image/*" onchange="previewAvatar(event)" />
                                            
                                                <!-- Buttons -->
                                                <div class="mt-2">
                                                    <button type="button" class="btn btn-secondary btn-sm" onclick="document.getElementById('avatar-upload').click()">Upload ảnh</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-12 row">
                                        <div class="form-group col-md-6">
                                            <label>Tên</label>
                                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Quyền tài khoản</label>
                                            <input type="text" class="form-control" disabled value="Người dùng">
                                        </div>
                                    </div>
                                    <div >
                                        <button class="btn btn-primary w-auto float-end" type="submit">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ============================ Call To Action End ================================== -->
    <script>
        function previewAvatar(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatar-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
        </script>
@endsection