// Hàm để cập nhật placeholder
function updatePricePlaceholder() {
    var mohinh = $('#mohinh').val();
    var priceInput = $('#price');

    if (mohinh === 'thue' || mohinh === 'oghep') {
        priceInput.attr('placeholder', 'Tổng số tiền / tháng');
    } else {
        priceInput.attr('placeholder', 'Tổng số tiền');
    }
}

// Gọi hàm khi trang được tải
updatePricePlaceholder();

// Gọi hàm khi thay đổi giá trị của dropdown
$('#mohinh').change(function() {
    updatePricePlaceholder();
});
   let map, marker;

   function initMap() {
       map = L.map('map').setView([10.7769, 106.7009], 13); // Mặc định Sài Gòn

       // Load bản đồ từ OpenStreetMap
       L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
           attribution: '&copy; OpenStreetMap contributors'
       }).addTo(map);

       marker = L.marker([10.7769, 106.7009], { draggable: true }).addTo(map);

       // Khi kéo thả marker, cập nhật địa chỉ
       marker.on('dragend', function () {
           let position = marker.getLatLng();
           map.setView(position);
           reverseGeocode(position.lat, position.lng);
       });
   }

   function reverseGeocode(lat, lng) {
       let url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`;

       $.get(url, function (data) {
           if (data && data.display_name) {
               alert("Địa chỉ gần nhất: " + data.display_name);
           }
       });
   }

   function updateMap() {
    let street = $("#street").val();
    let ward = $("#ward option:selected").text();
    let district = $("#district option:selected").text();
    let province = $("#province option:selected").text();

    let address = `${street}, ${ward}, ${district}, ${province}, Vietnam`.trim().replace(/ ,/g, "");
    if (!address || address === ", , , Vietnam") return;

    let apiKey = "ea030217a5d34685a9923c7e0d79f49b";  // Thay bằng API Key của bạn
    let geocodeUrl = `https://api.opencagedata.com/geocode/v1/json?q=${encodeURIComponent(address)}&key=${apiKey}`;

    $.get(geocodeUrl, function(data) {
        if (data.results.length > 0) {
            let latitude = data.results[0].geometry.lat;
            let longitude = data.results[0].geometry.lng;
            $('#Longitude').val(longitude);
            $('#latitude').val(latitude);

            console.log(`Tọa độ: Latitude = ${latitude}, Longitude = ${longitude}`);

            // **Hiển thị bản đồ nếu chưa hiển thị**
            $("#map").removeClass("d-none");

            // Nếu bản đồ chưa có, tạo mới
            if (!map) {
                map = L.map('map').setView([latitude, longitude], 15);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);
            } else {
                // Nếu đã có, chỉ cập nhật tọa độ
                map.setView([latitude, longitude], 15);
            }

            // Xóa marker cũ nếu có
            if (marker) {
                map.removeLayer(marker);
            }

            // Thêm marker mới
            marker = L.marker([latitude, longitude]).addTo(map)
                .bindPopup("Vị trí đã chọn")
                .openPopup();
        } else {
            console.log("Không tìm thấy địa điểm.");
            $("#map").addClass("d-none"); // Ẩn bản đồ nếu không có dữ liệu
        }
    });
}



$(document).ready(function () {
   let checkSrc = setInterval(function () {
    let iframe = $('#mapFrame');
    if (iframe.attr('src')) {
        iframe.removeClass('d-none'); // Xóa d-none khi có src
        clearInterval(checkSrc); // Dừng kiểm tra khi đã có src
    }
}, 500); // Kiểm tra mỗi 500ms

    // Load danh sách tỉnh/thành
    $.get("https://provinces.open-api.vn/api/p/", function (data) {
        let provinceSelect = $("#province");
        $.each(data, function (index, province) {
            provinceSelect.append(new Option(province.name, province.code));
        });
    });

    // Khi chọn tỉnh/thành
    $("#province").change(function () {
        let provinceCode = $(this).val();
        let provinceName = $(this).find("option:selected").text(); // Lấy tên tỉnh
        $("#province_name").val(provinceName); // Cập nhật trường tên tỉ
        let districtSelect = $("#district");
        let wardSelect = $("#ward");

        districtSelect.html('<option value="">Chọn quận/huyện</option>').prop("disabled", true);
        wardSelect.html('<option value="">Chọn phường/xã</option>').prop("disabled", true);

        if (provinceCode) {
            $.get(`https://provinces.open-api.vn/api/p/${provinceCode}?depth=2`, function (data) {
                $.each(data.districts, function (index, district) {
                    districtSelect.append(new Option(district.name, district.code));
                });
                districtSelect.prop("disabled", false);
            });
        }
        updateMap();
    });

    // Khi chọn quận/huyện
    $("#district").change(function () {
        let districtCode = $(this).val();
        let districtName = $(this).find("option:selected").text(); // Lấy tên huyện
        $("#district_name").val(districtName); // Cập nhật trường tên huyện
        let wardSelect = $("#ward");

        wardSelect.html('<option value="">Chọn phường/xã</option>').prop("disabled", true);

        if (districtCode) {
            $.get(`https://provinces.open-api.vn/api/d/${districtCode}?depth=2`, function (data) {
                $.each(data.wards, function (index, ward) {
                    wardSelect.append(new Option(ward.name, ward.code));
                });
                wardSelect.prop("disabled", false);
            });
        }
        updateMap();
    });
    // Khi chọn phường/xã
    $("#ward").change(function () {
        let wardCode = $(this).val();
        let wardName = $(this).find("option:selected").text(); // Lấy tên phường/xã

        // Cập nhật trường ẩn với mã và tên phường/xã
        $("#ward_name").val(wardName); // Cập nhật tên phường/xã
        $("#ward_code").val(wardCode); // Cập nhật mã phường/xã (nếu có trường ẩn)

        // Gọi hàm cập nhật bản đồ (nếu cần)
        updateMap();
    });
    // Khi thay đổi địa chỉ hoặc nhập đường/phố, cập nhật iframe
    $("#street, #ward, #district, #province").on("change keyup", function () {
        updateMap();
    });

    
});

// Hàm để cập nhật placeholder
function updatePricePlaceholder() {
    var mohinh = $('#mohinh').val();
    var priceInput = $('#price');

    if (mohinh === 'thue' || mohinh === 'oghep') {
        priceInput.attr('placeholder', 'Tổng số tiền / tháng');
    } else {
        priceInput.attr('placeholder', 'Tổng số tiền');
    }
}

// Gọi hàm khi trang được tải
updatePricePlaceholder();

// Gọi hàm khi thay đổi giá trị của dropdown
$('#mohinh').change(function() {
    updatePricePlaceholder();
});

$('#priceNegotiable').change(function() {
    if ($(this).is(':checked')) {
        $('#price').hide(); // Ẩn ô nhập giá
    } else {
        $('#price').show(); // Hiện ô nhập giá
    }
});



// Đăng tin
$(document).ready(function () {
    
    let $imageUpload = $("#imageUpload");
    let $imageInput = $("#imageInput");
    let $previewContainer = $("#previewContainer");

    let uploadedFiles = []; // Mảng lưu trữ file ảnh đã chọn

    // Tránh vòng lặp sự kiện click
    let isManualTrigger = false;

    // Kéo & Thả file
    $imageUpload.on("dragover", function (e) {
        e.preventDefault();
        $(this).css("border-color", "#007bff");
    });

    $imageUpload.on("dragleave", function () {
        $(this).css("border-color", "#ccc");
    });

    $imageUpload.on("drop", function (e) {
        e.preventDefault();
        $(this).css("border-color", "#ccc");
        let files = e.originalEvent.dataTransfer.files;
        handleFiles(files);
    });

    // Click vào khung để chọn file
    $imageUpload.on("click", function (e) {
        if (!isManualTrigger) {
            isManualTrigger = true;
            $imageInput.trigger("click"); // Kích hoạt input file
        }
        setTimeout(() => {
            isManualTrigger = false;
        }, 500); // Reset tránh vòng lặp
    });

    // Khi chọn file từ input
    $imageInput.on("change", function () {
        let files = this.files;
        handleFiles(files);
        $imageInput.val(""); // 🔥 Reset input file để lần sau có thể chọn lại cùng ảnh
    });

    function handleFiles(files) {
        $.each(files, function (index, file) {
            if (!file.type.startsWith("image/")) {
                alert("Chỉ được chọn file ảnh!");
                return;
            }

            uploadedFiles.push(file); // Lưu file vào mảng

            let reader = new FileReader();
            reader.onload = function (e) {
                let imgElement = $("<div class='image-preview'>")
                    .append(
                        $("<img>").attr("src", e.target.result)
                    )
                    .append(
                        $("<span class='remove-btn'>&times;</span>").on(
                            "click",
                            function () {
                                let indexToRemove =
                                    $(".remove-btn").index(this);
                                uploadedFiles.splice(indexToRemove, 1); // Xóa file khỏi mảng
                                $(this).parent().remove(); // Xóa ảnh xem trước

                                // 🔥 Reset input file nếu không còn ảnh nào
                                if (uploadedFiles.length === 0) {
                                    $imageInput.val("");
                                }
                            }
                        )
                    );
                $previewContainer.append(imgElement);
            };
            reader.readAsDataURL(file);
        });
    }
    // Upload video
    // upload video 
const $videoInput = $("#videoInput");
const $videoPreviewContainer = $("#videoPreviewContainer");
const $videoUrlInput = $("#video_url");
const $uploadBox = $("#videoUploadBox");

// Khi click vào vùng upload thì mở file chọn video
$uploadBox.on("click", function (event) {
    event.stopPropagation(); // Ngăn chặn vòng lặp sự kiện
    $videoInput[0].click();  // Click vào input file
});

    // Xử lý khi người dùng chọn file
    // $videoInput.on("change", function () {
    //     if (this.files.length > 0) {
    //         const file = this.files[0]; // Lấy file duy nhất
    //         $videoPreviewContainer.empty(); // Xóa video cũ nếu có

    //         // Tạo thẻ video
    //         const videoElement = $("<video>", {
    //             controls: true,
    //             width: 250,
    //             src: URL.createObjectURL(file)
    //         });

    //         // Tạo nút xoá video
    //         const deleteButton = $("<button>", {
    //             text: "Xóa video",
    //             class: "btn btn-danger btn-sm mt-2",
    //             click: function () {
    //                 $videoPreviewContainer.empty(); // Xóa video
    //                 $videoInput.val(""); // Xóa giá trị trong input file
    //                 $videoUrlInput.val(""); // Xóa giá trị đường dẫn video
    //             }
    //         });

    //         // Thêm video + nút xoá vào vùng hiển thị
    //         $videoPreviewContainer.append(videoElement, deleteButton);

    //         // Lưu file name vào input hidden
    //         $videoUrlInput.val(file.name);
    //     }
    // });


    $('.form-baidang').submit(function (e) {
        e.preventDefault();
        const id = $(this).attr('id');
        const action = $(this).attr('action');
        let descriptionContent = CKEDITOR.instances['description_post'].getData();
        $('textarea[name="description"]').val(descriptionContent); // Cập nhật dữ liệu vào form

        let formData = new FormData(this);
        uploadedFiles.forEach((file) => {
            formData.append("images[]", file); // ✅ Đảm bảo file được thêm đúng
        });
        // if ($videoInput[0].files.length > 0) {
        //     formData.append("video", $videoInput[0].files[0]);
        // }
        for (let pair of formData.entries()) {
            console.log(pair[0], pair[1]); 
        }
        $.ajax({
            url: action,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('#loading').show(); // Nếu có loading
            },
            success: function (response) {
                $('#loading').hide();
                if (response.status === "success") {
                    if( id == 'form-dang-tin'){
                        $('#form-dang-tin')[0].reset();
                    }
                    $('#form-dang-tin input[type="file"]').val('');
                    uploadedFiles = []; // ✅ Xóa danh sách file đã chọn
                    $('#previewContainer').empty(); // ✅ Xóa ảnh xem trước
                    $("html, body").animate({ scrollTop: 0 }, "fast");
                    toastr.success("✅ Đăng tin thành công!");
                } else {
                    alert("Có lỗi xảy ra, vui lòng thử lại!");
                }
            },
            error: function (xhr) {
                $('#loading').hide();
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = "Lỗi khi gửi dữ liệu:\n";
                    for (let key in errors) {
                        errorMessage += errors[key] + "\n";
                    }
                    alert(errorMessage);
                } else {
                    alert("Lỗi máy chủ, vui lòng thử lại!");
                }
            }
        });
    });
    $(".remove-btn").on("click", function () {
        let imageUrl = $(this).data("image-url"); // Lấy URL ảnh
        let $previewItem = $(this).closest(".image-preview"); // Lấy phần tử cần xóa

        if (!confirm("Bạn có chắc chắn muốn xóa ảnh này?")) return;

        $.ajax({
            url: "/posts/delete-image", // Đường dẫn đến controller xử lý
            type: "POST",
            data: {
                image: imageUrl, // Gửi URL ảnh cần xóa
                _token: $('meta[name="csrf-token"]').attr("content"), // CSRF token
            },
            success: function (response) {
                $previewItem.remove(); // Xóa ảnh khỏi giao diện nếu xóa thành công
            },
            error: function () {
                alert("Có lỗi xảy ra, vui lòng thử lại.");
            },
        });
    });

});