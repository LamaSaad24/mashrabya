<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function blogger() {
        return $this->belongsTo(Blogger::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subCat() {
        return $this->belongsTo(SubCat::class);
    }

}
