<?php 
namespace App\Models;
use CodeIgniter\Model;
class Domicilio_model extends Model
{
    protected $table = 'domicilios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['direccion',"cod_postal"];
}