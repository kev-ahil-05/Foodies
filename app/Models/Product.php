<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    //
   protected $table = 'products'; 

    protected $fillable = [
        'user_id',
        'Product_name', 
        'Quantity', 
        'Price',
        'Total', 
    ];

  
public function Menu():HasMany
    {
        return $this->HasMany(Menu::class);
    }


      public function User():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
