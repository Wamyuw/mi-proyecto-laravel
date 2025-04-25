<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';
    
// app/Models/Producto.php
protected $fillable = [
    'nombre', 
    'descripcion', 
    'precio', 
    'stock', 
    'estatus', 
    'imagen'
];
    protected $appends = ['imagen_url', 'precio_formateado'];

    public function getImagenUrlAttribute()
    {
        return $this->imagen ? asset("storage/{$this->imagen}") : asset('img/default.png');
    }

    public function getPrecioFormateadoAttribute()
    {
        return '$' . number_format($this->precio, 2);
    }

    public function setEstatusAttribute($value)
    {
        $this->attributes['estatus'] = in_array($value, ['activo', 'inactivo', 'agotado']) 
            ? $value 
            : 'activo';
    }
}