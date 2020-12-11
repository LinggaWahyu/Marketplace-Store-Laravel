<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'products_id', 'users_id'
    ];

    protected $hidden = [

    ];

    public function product() {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
