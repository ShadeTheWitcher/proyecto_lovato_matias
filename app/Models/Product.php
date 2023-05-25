<?php
namespace App\Models;
use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncreament = true;

    protected $allowedFields = ['name', 'price', 'description' , "cantidad" , "categoria_id" , "imagen", "activo"];
}