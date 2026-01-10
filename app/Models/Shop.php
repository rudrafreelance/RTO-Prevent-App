<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes; 

    protected $fillable = [
        'name',
        'email',
        'password',
        'shopify_grandfathered',
        'shopify_namespace',
        'shopify_freemium',
        'plan_id',
    ];
}
