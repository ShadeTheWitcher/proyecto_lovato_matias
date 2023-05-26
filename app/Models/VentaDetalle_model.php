<?php 
namespace App\Models;
use CodeIgniter\Model;
class VentaDetalle_model extends Model
{
    protected $table = 'ventas_detalle';
    protected $primaryKey = 'id';
    protected $allowedFields = ['venta_id','producto_id','cantidad',
    'precio','sub_total'];

    public function getProductAll(){
        $db = \Config\Database::connect();//Conecta la base de datos
        $builder = $db->table('ventas_detalle');//Tabla productos
        $builder->select('*');
        //Obtiene la relacion entre las tablas
        $builder->join('productos',' productos.id = ventas_detalle.producto_id ');
        $builder->join('ventas_cabecera',' ventas_Cabecera.id = ventas_detalle.venta_id ');
        $query = $builder->get();//guarda
        return $query->getResultArray();//return array
    
    }
}