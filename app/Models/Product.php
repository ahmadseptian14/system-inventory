<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['suppliers_id', 'categories_id', 'name', 'slug', 'price', 'image', 'stock', 'keterangan'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id', 'id')->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }


    

}
