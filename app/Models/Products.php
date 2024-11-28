<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primarykey = 'products_id';


    protected $fillable = [
        'product_name',
        'product_image',
        'categories_id',
        'price',
        'stocks',
        'is_deleted'
    ];
    
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

}
