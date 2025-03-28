<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $title }}</title>	
<link rel="icon" type="image/x-icon" sizes="5760x5760" href="{{$settings['logo']}}" /><!-- Place favicon.ico in the root directory -->
		
<!-- Custom CSS -->
<link href="/temp/assets/css/styles.css" rel="stylesheet">

<!-- Custom Color Option -->
<link href="/temp/assets/css/colors.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    
.pagination nav {
    margin: 0 auto; }
.pagination nav div:nth-child(1) {
    display: none; }
.pagination nav div:nth-child(2) span {
    box-shadow: none !important; }
.pagination nav div:nth-child(2) span span span {
    padding: 10px 14px !important;
    border: none !important;
    margin: 0 5px;
    background-color: #696cff !important;
    color: white; }
.pagination nav div:nth-child(2) span a {
    padding: 10px 14px !important;
    border: none !important;
    margin: 0 5px;
    transition: all .3s; }
.pagination nav div:nth-child(2) span a:hover {
    background-color: #696cff !important;
    color: white;
    transition: all .3s; }
.pagination svg {
    width: 20px; 
}

.img-custom{
    aspect-ratio: 1.5;
    height: auto;
    width: 100%;
    object-fit: cover;
}
.img-loction-custom{
    aspect-ratio: 0.7;
    height: auto;
    width: 100%;
    object-fit: cover;
}
.inner-banner-text{
    background: #ffffff94;
    padding: 18px;
    border-radius: 20px;
    backdrop-filter: blur(3px);
}
.truncate-text{
    white-space: nowrap;     /* Không cho xuống dòng */
    overflow: hidden;        /* Ẩn nội dung bị tràn */
    text-overflow: ellipsis; /* Hiển thị dấu "..." khi quá dài */
    display: block;          /* Đảm bảo hoạt động tốt trong layout */
    max-width: 100%;     
}
.title-cell{
    max-width: 200px; /* Điều chỉnh độ rộng tối đa */
    word-wrap: break-word; /* Xuống dòng nếu quá dài */
    white-space: normal; /* Cho phép xuống dòng */
    overflow: hidden; /* Ẩn phần bị tràn */
    text-overflow: ellipsis; /
}
.cke_notifications_area{
        display: none !important;
    }
    .upload-box {
    border: 2px dashed #ccc;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    background-color: #f8f9fa;
    cursor: pointer;
    transition: border-color 0.3s ease-in-out;
}

.upload-box:hover {
    border-color: #007bff;
}

.upload-area {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.upload-icon {
    font-size: 40px;
    color: #007bff;
}

.upload-box p {
    font-size: 16px;
    color: #555;
}

.preview-container {
    margin-top: 15px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.preview-container img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #ddd;
    transition: transform 0.2s;
}

.preview-container img:hover {
    transform: scale(1.1);
}
/* Khung upload */
#imageUpload {
    padding: 20px;
    text-align: center;
    background-color: #f8f9fa;
    border: 2px dashed #ccc;
    cursor: pointer;
    transition: border-color 0.3s ease-in-out;
}

/* Hiệu ứng khi kéo file vào */
#imageUpload.drag-over {
    border-color: #007bff;
}

/* Khung hiển thị ảnh */
.image-preview {
    position: relative;
    display: inline-block;
    margin: 5px;
}

/* Ảnh preview */
.preview-img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
    object-fit: cover;
    border: 1px solid #ddd;
}

/* Nút X để xóa ảnh */
.remove-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    background: black;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    width: 20px;
    height: 20px;
    font-size: 12px;
    text-align: center;
    line-height: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.listing-name{
    display: block; 
    max-width: 100%; 
    white-space: normal; 
    word-break: break-word;
    display: -webkit-box;
    -webkit-line-clamp: 2; 
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;

}

.img-detail{
    aspect-ratio: 1.5;
    height: auto;
    width: 100%;
    object-fit: cover;
}
</style>