<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    protected $table = 'carritos';
    public $timestamps = false;
    protected $fillable = ['user_id', 'producto_id', 'cantidad'];
    
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
