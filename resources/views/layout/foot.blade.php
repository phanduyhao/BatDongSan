<script>
    CKEDITOR.replace("description_post");
</script>
<script src="/temp/assets/js/jquery.min.js"></script>
<script src="/temp/assets/js/popper.min.js"></script>
<script src="/temp/assets/js/bootstrap.min.js"></script>
<script src="/temp/assets/js/rangeslider.js"></script>
<script src="/temp/assets/js/select2.min.js"></script>
<script src="/temp/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/temp/assets/js/slick.js"></script>
<script src="/temp/assets/js/slider-bg.js"></script>
<script src="/temp/assets/js/lightbox.js"></script> 
<script src="/temp/assets/js/imagesloaded.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="/temp/assets/js/custom.js"></script>
<script src="/ckeditor/ckeditor.js"></script>
<script src="/temp/js/main.js"></script>
<script src="/temp/js/validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- ============================================================== -->
<!-- This page plugins -->
<script>
   $(document).ready(function () {
    let mapContainer = $("#map");

    // Lấy tọa độ từ data-attribute của div
    let lat = parseFloat(mapContainer.data("latitude"));
    let lon = parseFloat(mapContainer.data("longitude"));

    // Kiểm tra nếu có tọa độ hợp lệ
    if (!lat || !lon || isNaN(lat) || isNaN(lon)) {
        console.error("Lỗi: Tọa độ không hợp lệ!", lat, lon);
        return;
    }

    // Hiển thị bản đồ
    mapContainer.removeClass("d-none");

    // Khai báo bản đồ
    let map = L.map('map').setView([lat, lon], 15);

    // Thêm tile layer từ CARTO
    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://carto.com/">CARTO</a>'
    }).addTo(map);

    // Thêm marker
    let marker = L.marker([lat, lon]).addTo(map)
        .bindPopup("Vị trí của bạn")
        .openPopup();

    // Đảm bảo bản đồ hiển thị đúng kích thước sau khi hiển thị
    setTimeout(() => {
        map.invalidateSize();
    }, 1000);

    // Nếu bản đồ nằm trong collapse, xử lý khi mở
    $('#clSix').on('shown.bs.collapse', function () {
        setTimeout(() => {
            map.invalidateSize();
        }, 500);
    });
});
$('.toggle-isVip').on('change', function (event) {
    event.stopPropagation();
    let baidangId = $(this).data('id');
    let isChecked = $(this).is(':checked');

    $.ajax({
        url: `/posts/isVip/${baidangId}`,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: JSON.stringify({ isVip: isChecked }),
        contentType: 'application/json',
        success: function (response) {
            toastr.success("✅ Cập nhật trạng thái thành công!");
        },
        error: function (xhr, status, error) {
            console.error('Lỗi:', error);
            alert('Có lỗi xảy ra!');
        },
    });
});
$(".status-select").on("change", function () {
    let baidangId = $(this).data("id"); // Lấy ID bài đăng
    let newStatus = $(this).val(); // Lấy giá trị trạng thái mới
    let selectElement = $(this); // Lưu lại phần tử để xử lý UI

    $.ajax({
        url: "/posts/update-status", // Route xử lý cập nhật
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}", // Token CSRF
            id: baidangId,
            status: newStatus
        },
        beforeSend: function () {
            selectElement.prop("disabled", true); // Vô hiệu hóa trong lúc gửi request
        },
        success: function (response) {
            if (response.success) {
                toastr.success("✅ Cập nhật trạng thái thành công!");
            } else {
                alert("Có lỗi xảy ra, vui lòng thử lại!");
            }
        },
        error: function () {
            alert("Lỗi kết nối server!");
        },
        complete: function () {
            selectElement.prop("disabled", false); // Bật lại select sau khi request hoàn tất
        }
    });
});
$(document).on("submit", "#form-change-password", function (e) {
    e.preventDefault();
    let form = $(this);
    let formData = form.serialize();

    // Xóa lỗi cũ trước khi gửi
    $(".error-message").text("");

    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: formData,
        beforeSend: function () {
            $(".btn-primary").prop("disabled", true);
        },
        success: function (response) {
            $(".btn-primary").prop("disabled", false);
            alert(response.message); // Hoặc hiển thị thông báo thành công đẹp hơn
            form[0].reset(); // Reset form nếu đổi mật khẩu thành công
        },
        error: function (xhr) {
            $(".btn-primary").prop("disabled", false);
            let errors = xhr.responseJSON.errors;

            // Hiển thị lỗi ngay dưới mỗi input
            for (let key in errors) {
                let errorMessage = errors[key][0]; // Lấy lỗi đầu tiên
                $(`input[name="${key}"]`).next(".error-message").text(errorMessage);
            }
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    var ptypes = document.getElementById('ptypes');
    var soTangLabel = document.getElementById('label-so-tang');
    var soPhongLabel = document.getElementById('label-so-phong');

    function updateLabels() {
        var selectedOption = ptypes.options[ptypes.selectedIndex];
        var mohinh = selectedOption.getAttribute('data-type') || ''; // Tránh lỗi nếu data-type không tồn tại

        console.log('Loại nhà đất:', mohinh); // Debug xem giá trị có đúng không

        if (mohinh.toLowerCase().includes('chung cư')) { 
            soTangLabel.textContent = 'Tầng';
            soPhongLabel.textContent = 'Số phòng';
        } else {
            soTangLabel.textContent = 'Số tầng';
            soPhongLabel.textContent = 'Tổng số phòng';
        }
    }

    // Gọi khi trang load xong để cập nhật giá trị ban đầu
    updateLabels();

    // Gán sự kiện change để thay đổi khi người dùng chọn giá trị mới
    ptypes.addEventListener('change', updateLabels);
});


</script>

