@extends('admin.main')

@section('contents')
<div class="content-wrapper">
    <div class="container-fluid py-4">
        <h2 class="text-center mb-4">Thống kê bài đăng</h2>

        <!-- Form lọc theo ngày -->
        {{-- <form method="GET" action="{{ route('homeAdmin') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="from_date">Từ ngày:</label>
                    <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                </div>
                <div class="col-md-4">
                    <label for="to_date">Đến ngày:</label>
                    <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Lọc</button>
                </div>
            </div>
        </form> --}}

        <!-- Thống kê tổng số bài đăng -->
        <div class="card mb-4">
            <div class="card-header text-white">
                <h4 class="mb-0">Tổng số bài đăng của mỗi user</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered text-center table-hover">
                        <thead class="">
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Số bài đăng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($thongkes as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role == 'nhanvien' ? 'Nhân viên' : ($user->role == 'user' ? 'Người dùng' : 'Quản trị') }}</td>
                                <td class="text-center">{{ $user->baidangs_count }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- Thống kê bài đăng theo tháng -->
        <div class="card mb-4">
            <div class="card-header text-white">
                <h4 class="mb-0">Bài đăng trong tháng này</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                <table class="table table-bordered text-center table-hover">
                    <thead class="">
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Bài đăng trong tháng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thongkeotheothang as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role == 'nhanvien' ? 'Nhân viên' : ($user->role == 'user' ? 'Người dùng' : 'Quản trị') }}                            </td>
                            <td class="text-center">{{ $user->baidangs_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <!-- Thống kê bài đăng hôm nay -->
        <div class="card mb-4">
            <div class="card-header text-dark">
                <h4 class="mb-0">Bài đăng hôm nay</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                <table class="table table-bordered text-center table-hover">
                    <thead class="">
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Bài đăng hôm nay</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thongketheongay as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role == 'nhanvien' ? 'Nhân viên' : ($user->role == 'user' ? 'Người dùng' : 'Quản trị') }}</td>
                            <td class="text-center">{{ $user->baidangs_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
