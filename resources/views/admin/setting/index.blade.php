@extends('admin.main')

@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">Cấu hình hệ thống</h3>

        <!-- Hiển thị thông báo thành công -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Hiển thị lỗi -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form cập nhật toàn bộ cấu hình -->
        <form action="{{route('updateSetting')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Cấu hình Logo -->
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header fw-bold">Cấu hình Logo</div>
                        <div class="card-body text-center">
                            <input type="file" class="form-control mb-2" name="logo">
                            <img src="{{ $settings['logo'] }}" alt="Logo" class="img-fluid rounded" width="150">
                        </div>
                    </div>
                </div>

                <!-- Cấu hình Banner Trang Chủ -->
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header fw-bold">Cấu hình Banner Trang Chủ</div>
                        <div class="card-body text-center">
                            <input type="file" class="form-control mb-2" name="banner">
                            <img src="{{ $settings['banner'] }}" alt="Banner" class="img-fluid rounded" width="250">
                        </div>
                    </div>
                </div>

                <!-- Cấu hình Số điện thoại -->
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header fw-bold">Cấu hình Số điện thoại</div>
                        <div class="card-body">
                            <input type="text" class="form-control" name="phone" value="{{ $settings['phone'] ?? '' }}" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                </div>

                <!-- Cấu hình Email -->
                <div class="col-md-6">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header fw-bold">Cấu hình Email</div>
                        <div class="card-body">
                            <input type="email" class="form-control" name="email" value="{{ $settings['email'] ?? '' }}" placeholder="Nhập email">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nút Cập nhật -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary fw-bold px-4 py-2">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection
