<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Baidang extends Model
{
    use HasFactory;

    protected $table= 'baidangs';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function lienhes()
    {
        return $this->hasMany(BaidangLienhe::class);
    }

    public function nhadat()
    {
        return $this->belongsTo(Loainhadat::class);
    }
}
