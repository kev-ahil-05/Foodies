<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Menu extends Model
{
    // Tukuyin kung anong table ang gagamitin sa database (optional kung 'menus' ang table name mo)
    protected $table = 'menus';

    // Ang mga fields na pinapayagang ma-save sa database gamit ang Form/Controller
    protected $fillable = [
        'product_name',
        'price',
        'product_image',
    ];

     public function User():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Product():HasMany
    {
        return $this->HasMany(Product::class);
    }
}