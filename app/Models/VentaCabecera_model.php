<?php 
namespace App\Models;
use CodeIgniter\Model;
class VentaCabecera_model extends Model
{
    protected $table = 'ventas_cabecera';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fecha','usuario_id','total_venta'];

    public function getUserAll(){
        $db = \Config\Database::connect();//Conecta la base de datos
        $builder = $db->table('usuarios');//Tabla usuarios
        $builder->select('*');
        //Obtiene la relacion entre las tablas
        $builder->join('ventas_cabecera',' ventas_cabecera.usuario_id = usuarios.id ');
        $query = $builder->get();//guarda
        return $query->getResultArray();//return array
    
    }
}
