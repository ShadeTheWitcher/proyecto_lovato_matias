<?php 
namespace App\Models;
use CodeIgniter\Model;
class Consulta_model extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','apellido','email',
    'mensaje'];
}