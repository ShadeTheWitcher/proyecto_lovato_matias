<?php namespace App\Models;

use CodeIgniter\Model;

class Modelo_Usuario extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','apellido','email','usuario','pass', "tel", "domicilio_id" ,'perfil_id','baja'];


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


     

     public function insertarUser($datos){
        return $this->insert($datos);
     }

     public function obtenerUsuarios(){
        return $this->findAll();
     }


     public function existeUsuario($usuario){
        $existeUser= $this-> where("usuario", $usuario);
        return $existeUser->countAllResults();
     }


     public function obtenerUser($usuario){
        $existeU= $this-> where("usuario", $usuario);
        return $existeU->get()->getRouteArray();
     }

     public function existeEmail($email){
      $existeUser= $this-> where("email", $email);
      return $existeUser->countAllResults();
   }

     
   public function obtenerUserPorID($id){
      $existeU = $this->where("id", $id);
      return $existeU->get()->getResultArray();
   }


   public function getUserDomicilio(){
      $db = \Config\Database::connect();//Conecta la base de datos
      $builder = $db->table('domicilios');//Tabla domicilios
      $builder->select('*');
      //Obtiene la relacion entre las tablas
      $builder->join('usuarios',' usuarios.domicilio_id = domicilios.id ');
      $query = $builder->get();//guarda
      return $query->getResultArray();//return array
  
  }

  public function getUserDomicilioPorID($domicilio_id){
   $db = \Config\Database::connect();
   $builder = $db->table('domicilios');
   $builder->select('*');
   $builder->where('id', $domicilio_id); // Filtra por la ID del domicilio
   $query = $builder->get();
   return $query->getRow(); // Retorna una única fila en lugar de un array
}


}
?>