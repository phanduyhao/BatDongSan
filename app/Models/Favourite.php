<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $table = "favourites";
    protected $fillable = [
        'user_id',
        'baidang_id',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Baidang()
    {
        return $this->belongsTo(Baidang::class, 'baidang_id');
    }
}
