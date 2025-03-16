<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('baidangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Người đăng tin
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('cascade');
            $table->string('title'); // Tiêu đề tin đăng
            $table->string('slug')->unique()->nullable(); // Slug
            $table->json('images')->nullable(); // Ảnh
            $table->text('description')->nullable(); // Mô tả chi tiết
            $table->integer('price')->nullable(); // Giá thuê (đơn vị: VNĐ)
            $table->decimal('dientich'); // Diện tích (m²)
            $table->integer('bedrooms')->default(0); // Số phòng ngủ
            $table->integer('bathrooms')->default(0); // Số phòng vệ sinh
            $table->string('huongnha')->nullable(); // Hướng nhà (Đông, Tây,...)
            $table->boolean('noithat')->default(false); // Nội thất đầy đủ hay không
            $table->boolean('adminduyet')->default(false); // Nội thất đầy đủ hay không
            $table->enum('status', ['cosan', 'dathue', 'hethan'])->default('cosan'); // Trạng thái tin đăng
            $table->enum('mohinh', ['thue', 'ban'])->nullable(); // Trạng thái bán / thuê
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baidangs');
    }
};
