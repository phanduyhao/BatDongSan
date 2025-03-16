<?php

namespace App\Models;

use App\Models\District;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ward extends Model
{
    use HasFactory;
    protected $table="wards";

    protected $fillable = ['name', 'district_id'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
