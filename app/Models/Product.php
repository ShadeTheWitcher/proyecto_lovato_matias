<?php
namespace App\Models;
use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncreament = true;

    protected $allowedFields = ['nombre_producto', 'precio_producto', 'descripcion' , "cantidad" , "categoria_id" , "imagen", "activo" , "es_tendencia"];
}