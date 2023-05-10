<?php namespace App\Models;

use CodeIgniter\Model;

class Modelo_Usuario extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','apellido','email','usuario','pass','perfil_id','baja'];


    // public function agregarUsuario(){
    //     $data = array('nombre' => $this->input->post('nombre'),
    //     'apellido' => $this->input->post('apellido'),
    //     'email' => $this->input->post('email'),
    //     'usuario' => $this->input->post('usuario'),
    //     'pass' => $this->input->post('pass'),
    //     'perfil_id' => $this->input->post('perfil_id'),
    //     'baja' => $this->input->post('baja')

    //     );

    //     return $this->db->insert('usuario', $data);
    // }

    // public function eliminarUsuario($id){
    
    // $this->db->delete('usuario', array('id' => $id));
    // }
    
    // function update($id, $nombre){

    //     $this->db->where('id', $id);
    //     $this->db->set('nombre', $nombre);
    //     return $this->db->update('usuario');
    // }


     public function mostrar(){
         $usuarios = $this->db->query('SELECT * FROM usuarios');
        return $usuarios->getResult();
     }


}




?>