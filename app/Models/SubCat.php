<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCat extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'updated_at', 'created_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function mainCat() {
        return $this->belongsTo(MainCat::class);
    }

    public function blogs() {
        return $this->hasMany(Blog::class);
    }
}
