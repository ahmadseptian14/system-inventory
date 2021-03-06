<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductIn extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'products_id', 'quantity', 'date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    
}
