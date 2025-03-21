<aside
    id='layout-menu'
    class='layout-menu menu-vertical menu bg-menu-theme'
    data-bg-class='bg-menu-theme'
>
    <div class='app-brand demo'>
        <a href='/admin' class='app-brand-link'>
            <img src='/temp//temp/assets/images/general/logo.png' width='200' alt='' />
        </a>

        <a
            href='javascript:void(0);'
            class='layout-menu-toggle menu-link text-large ms-auto d-xl-none'
        >
            <i class='bx bx-chevron-left bx-sm align-middle'></i>
        </a>
    </div>

    <div class='menu-inner-shadow'></div>

    <ul class='menu-inner py-1 ps ps--active-y'>
        <!-- Dashboard -->
        <li class='menu-item active'>
            <a href='/admin' class='menu-link'>
                <i class='menu-icon tf-icons bx bx-home-circle'></i>
                <div data-i18n='Analytics'>Trang quản trị</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Người dùng</span>
        </li>
        <li class='menu-item'>
            <a href='javascript:void(0);' class='menu-link menu-toggle'>
                <i class='menu-icon tf-icons bx bxs-user-account'></i>
                <div data-i18n='Layouts'>Quản lý tài khoản</div>
            </a>
            <ul class='menu-sub'>
                <li class='menu-item'>
                    <a href='{{route('adminUser')}}' class='menu-link'>
                        <div data-i18n='Without menu'>Tài khoản quản trị</div>
                    </a>
                </li>
                <li class='menu-item'>
                    <a href='{{route('user')}}' class='menu-link'>
                        <div data-i18n='Without menu'>Tài khoản người dùng</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Công việc</span>
        </li>
        <li class='menu-item'>
            <a href='{{route('thietbi.index')}}' class='menu-link'>
                <i class='menu-icon tf-icons bx bx-category-alt'></i>
                <div data-i18n='Layouts'>Quản lý thiết bị</div>
            </a>
        </li>
        <li class='menu-item'>
            <a href='{{route('loainhadat.index')}}' class='menu-link'>
                <i class='menu-icon tf-icons bx bx-category-alt'></i>
                <div data-i18n='Layouts'>Quản lý loại nhà đất</div>
            </a>
        </li>
        <li class='menu-item'>
            <a href='javascript:void(0);' class='menu-link menu-toggle'>
                <i class='menu-icon tf-icons bx bxs-user-account'></i>
                <div data-i18n='Layouts'>Quản lý công việc</div>
                <span class="badge bg-danger">12</span>
            </a>
            <ul class='menu-sub'>
                <li class='menu-item'>
                    <a href='' class='menu-link'>
                        <div data-i18n='Without menu'>Công việc đã duyệt</div>
                    </a>
                </li>
                <li class='menu-item'>
                    <a href='' class='menu-link'>
                        <div data-i18n='Without menu'>Công việc đang chờ duyệt</div>
                        <span class="badge bg-danger ms-3">12</span>
                    </a>
                </li>
                <li class='menu-item'>
                    <a href='' class='menu-link'>
                        <div data-i18n='Without menu'>Công việc đã hủy</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class='menu-item'>
            <a href='' class='menu-link'>
                <i class='menu-icon tf-icons bx bx-street-view'></i>
                <div data-i18n='Layouts'>Quản lý đơn đã ứng tuyển</div>
            </a>
        </li>
        <li class='menu-item'>
            <a href='' class='menu-link'>
                <i class='menu-icon tf-icons bx bx-news'></i>
                <div data-i18n='Layouts'>Quản lý bài viết</div>
            </a>
        </li>
        
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Khác</span>
        </li>
        <li class='menu-item'>
            <a href='' class='menu-link'>
                <i class="menu-icon tf-icons bx bx-comment-detail"></i>
                <div data-i18n='Layouts'>Quản lý phản hồi</div>
            </a>
        </li>
        <li class='menu-item'>
            <a href='' class='menu-link'>
                <i class='menu-icon tf-icons bx bx-food-menu'></i>
                <div data-i18n='Layouts'>Lịch sử doanh thu</div>
            </a>
        </li>
        <li class='menu-item'>
            <a href='' class='menu-link'>
                <i class='menu-icon tf-icons bx bx-food-menu'></i>
                <div data-i18n='Layouts'>Lịch sử gửi mail</div>
            </a>
        </li>
        <li class='menu-item'>
            <a href='{{route('settings.index')}}' class='menu-link'>
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n='Layouts'>Thiết lập</div>
            </a>
        </li>
    </ul>
</aside>
