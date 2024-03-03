<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    // i can use guarded way or fillable both work 

    
    protected $guarded = [];
    use SoftDeletes;
    // protected $fillable = [
    //     'name',
    //     'des',
    //     'img',
    //     'price',
    // ];
    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts (){
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    
    }

    public function orders (){
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'subtotal');
    
    }
}