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
                
                <div class="col-lg-3 col-md-12">
                    
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
                                        <li><a href="{{route('profile.index')}}"><i class="fa-solid fa-gauge"></i>Tổng quát</a></li>
                                        <li class="active"><a href="{{route('profile.listBaidang')}}"><i class="fa-solid fa-address-card"></i>Danh sách bài đăng</a></li>
                                        <li><a href="{{route('showChangePass')}}"><i class="fa-solid fa-unlock"></i>Thay đổi mật khẩu</a></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-lg-9 col-md-12">
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h3 class="fw-bold text-primary py-3 mb-4">{{ $title }}</h3>
                        <div>
                            <form class="form-search" method="GET" action="">
                                @csrf
                                <div class="mb-3">
                                    <div class="row">
                                        <!-- Tìm kiếm theo tên người đăng -->
                                        <div class="col-lg-3 col-sm-6 col-12 mb-3">
                                            <input class="form-control shadow-none" type="text" name="search_user"
                                                placeholder="Tìm theo tên người đăng" value="{{ request()->search_user }}">
                                        </div>
                
                                        <!-- Tìm kiếm theo tên công ty -->
                                        <div class="col-lg-3 col-sm-6 col-12 mb-3">
                                            <input class="form-control shadow-none" type="text" name="search_title"
                                                placeholder="Tìm theo tiêu đề bài đăng" value="{{ request()->search_title }}">
                                        </div>
                
                                        <!-- Tìm kiếm theo tiêu đề công việc -->
                                        <div class="col-lg-3 col-sm-6 col-12 mb-3">
                                            <select class="form-control shadow-none" name="search_mohinh">
                                                <option value="">-- Chọn mô hình --</option>
                                                <option value="thue" {{ request()->search_mohinh == 'thue' ? 'selected' : '' }}>Cho thuê</option>
                                                <option value="ban" {{ request()->search_mohinh == 'ban' ? 'selected' : '' }}>Bán</option>
                                            </select>
                                        </div>
                
                                        <!-- Tìm kiếm theo vị trí -->
                                        <div class="col-lg-3 col-sm-6 col-12 mb-3">
                                            <input class="form-control shadow-none" type="text" name="search_loainhadat"
                                                placeholder="Tìm theo loại nhà đất" value="{{ request()->search_loainhadat }}">
                                        </div>
                
                                        <div class="col-lg-3 col-sm-6 col-12 mb-3">
                                            <select class="form-control shadow-none" name="search_trangthai">
                                                <option value="">-- Chọn trạng thái --</option>
                                                <option value="cosan" {{ request()->search_mohinh == 'cosan' ? 'selected' : '' }}>Có sẵn</option>
                                                <option value="dathue" {{ request()->search_mohinh == 'dathue' ? 'selected' : '' }}>Đã thuê</option>
                                                <option value="hethan" {{ request()->search_mohinh == 'hethan' ? 'selected' : '' }}>Hết hạn</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12 mb-3">
                                            <select name="search_duyet" id="search_duyet" class="form-control me-3">
                                                <option value="">-- Chọn trạng thái duyệt --</option>
                                                <option value="pending" {{ request('search_duyet') === 'pending' ? 'selected' : '' }}>Chưa duyệt</option>
                                                <option value="approved" {{ request('search_duyet') === 'approved' ? 'selected' : '' }}>Đã duyệt</option>
                                                <option value="rejected" {{ request('search_duyet') === 'rejected' ? 'selected' : '' }}>Bị từ chối</option>
                                            </select>
                                        </div>
                                        <!-- Nút tìm kiếm và xóa lọc -->
                                        <div class="col-lg-3 col-sm-6 col-12 mb-3">
                                            <div class="text-center text-nowrap">
                                                <button type="submit" class="btn btn-danger rounded-pill">
                                                    <i class="fas fa-search me-2"></i>Tìm kiếm
                                                </button>
                                                <a href="{{ route('profile.listBaidang') }}" class="btn btn-secondary rounded-pill ms-2">
                                                    <i class="fas fa-times me-2"></i>Xóa lọc
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Người đăng</th>
                                            <th>Hình ảnh</th>
                                            <th>Tiêu đề</th>
                                            <th>Giá </th>
                                            <th>Diện tích</th>
                                            <th>Mô hình</th>
                                            <th>Loại nhà đất</th>
                                            <th>Bài Vip</th>
                                            <th>Duyệt</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày đăng</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @if($BaiDangs->isEmpty())
                                            <tr>
                                                <td colspan="11" class="text-center">Không tìm thấy công việc nào phù hợp với từ khóa tìm kiếm.</td>
                                            </tr>
                                        @else
                                            @foreach ($BaiDangs as $baidang)
                                                <tr data-id="{{ $baidang->id }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $baidang->User->name }}</td>
                                                    <td>
                                                        <img src="{{ $baidang->thumb}}" alt="{{ $baidang->title }}"
                                                        width="90px" height="90px">
                                                    </td>
                                                    <td  class="title-cell">{{ $baidang->title }}</td>
                                                    <td>{{ number_format($baidang->price , 0, ',', '.') }} đ</td>
                                                    <td>{{ $baidang->dientich }} M2</td>
                                                    <td>
                                                        <span>{{ $baidang->mohinh == 'thue' ? 'Cho thuê' : 'Bán' }}</span>
                                                    </td>
                                                    <td>{{ $baidang->nhadat->title ?? "" }}</td>
                                                    <td>
                                                        <input type="checkbox" class="toggle-isVip" data-id="{{ $baidang->id }}"
                                                               {{ $baidang->isVip ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        @if (is_null($baidang->adminduyet))
                                                            <span class="badge bg-warning">Chưa duyệt</span>
                                                        @elseif ($baidang->adminduyet)
                                                            <span class="badge bg-success">Đã duyệt</span>
                                                        @else
                                                            <span class="badge bg-danger">Bị từ chối</span>
                                                        @endif
                                                                                                        
                                                    </td>
                                                    <td>
                                                        <select class="form-control status-select" data-id="{{ $baidang->id }}">
                                                            <option value="cosan" {{ $baidang->status == 'cosan' ? 'selected' : '' }}>Có sẵn</option>
                                                            <option value="dathue" {{ $baidang->status == 'dathue' ? 'selected' : '' }}>Đã thuê</option>
                                                            <option value="hethan" {{ $baidang->status == 'hethan' ? 'selected' : '' }}>Hết hạn</option>
                                                        </select>
                                                    </td>
                                                    
                                                    
                                                    <td>{{ $baidang->created_at}}</td>
                                                    <td class="text-nowrap text-center">
                                                        <a href="{{ route('baidangDetail', $baidang->slug) }}" class="bg-info rounded border px-2 py-1 text-dark text-dark fw-bold" target="_blank">Chi tiết</a>
                                                        <a href="{{ route('baidang.edit', $baidang->slug) }}" class="bg-warning rounded border px-2 py-1 text-dark fw-bold mx-1">Chỉnh sửa</a>
                                                        <form class="mt-2" action="{{route('baidang.cancel', $baidang->id)}}" method="post">
                                                            @csrf
                                                            <button class="bg-danger rounded text-white">Hủy</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                
                                </table>
                                <div class="pagination mt-4 pb-4">
                                    {{ $BaiDangs->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection