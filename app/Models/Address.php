<?php

namespace App\Models;

use App\Models\Ward;
use App\Models\Baidang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;
    protected $table="addresses";

    protected $fillable = ['street', 'house_number', 'ward_id', 'province_id', 'district_id'];

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function baidangs()
    {
        return $this->hasMany(Baidang::class);
    }
}
