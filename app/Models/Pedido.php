<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function producto() {
        return $this->belongsTo('App\Models\Producto', 'id_producto');
    }
}
