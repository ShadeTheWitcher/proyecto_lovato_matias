<?php namespace App\Controllers;

use App\Models\Modelo_Usuario;
use CodeIgniter\Controller;

class usuario_controller extends BaseController{

    public function __construct(){
        helper(['form', 'url']);
     }

     


    public function index(){
        $data['title']='administrador de usuarios'; 
        echo view('componentes//header.php', $data);
        echo view("componentes//navbar.html");
        echo view("back//usuario//registrarse.php");
        echo view("componentes//footer.html");
    }

    public function registro_form(){
        $data['title']='registro'; 
        echo view('componentes//header.php', $data);
        echo view("componentes//navbar.html");
        echo view("back//usuario//registrarse.php");
        echo view("componentes//footer.html");
    }

    


//     public function add(){

    

//     $this->load->helper('form');
//     $this->load->library('form_validation');

//     $this->form_validation->set_rules('nombre', 'Nombre', 'required');
//     if ($this->form_validation->run() === FALSE)
//     {
//         $this->load->view('templates/header', $data);
//         $this->load->view('editoriales/add');
//         $this->load->view('templates/footer');

//     }
//     else
//     {
//         $this->editoriales_model->add();
//         $this->load->view('templates/header', $data);
//         $this->load->view('editoriales/success');
//         $this->load->view('templates/footer');
//     }
// }

public function insertar() {
    $usuario = new Modelo_Usuario();

    $data = [
        'usuario' => $this->request->getVar('usuario'),
        'nombre' => $this->request->getVar('nombre'),
        'apellido'  => $this->request->getVar('apellido'),
        'email'  => $this->request->getVar('email'),
        'pass'  => $this->request->getVar('pass'),
    ];

    


    //$usuario->insert($data);



    if(!$usuario->insert($data)){
        return redirect()->back()->with('fail','Hubo un error, Lo sentimos mucho :(');
       } else{
           return redirect()->to('usuario/crearUser')->with('success','Te has registrado exitosamente :)');
       }

        
    

    //return $this->response->redirect(site_url('/'));
}

public function editar($id) {
    $usuario = new Modelo_Usuario();
    $data['usuario'] = $usuario->where('id', $id)->first();
    return view('usuario/edit', $data);
}

public function update() {
    $usuario = new Modelo_Usuario();
    $id = $this->request->getVar('id');

    $data = [
        'usuario' => $this->request->getVar('usuario'),
        'nombre' => $this->request->getVar('nombre'),
        'apellido'  => $this->request->getVar('apellido'),
        'email'  => $this->request->getVar('email'),
        'pass'  => $this->request->getVar('pass'),
    ];

    $usuario->update($id, $data);
    return $this->response->redirect(site_url('/'));
}

// delete product
public function delete($id) {
    $usuario = new Modelo_Usuario();
    $data['usuario'] = $usuario->where('id', $id)->delete($id);
    return $this->response->redirect(site_url('/'));
}



public function formValidation() {

    //helper(['form', 'url']);
  // $input = $this->validate([
  //    'nombre'   => 'required|min_length[3]',
  //    'apellido' => 'required|min_length[3]|max_length[25]',
  //     'email'    => 'required|min_length[4]|max_length[50]|valid_email|is_unique[usuarios.email]',
  //     'usuario'  => 'required|min_length[3]',
  //     'password'     => 'required|min_length[3]|max_length[10]',
  //     'cpassword'    => 'required|min_length[3]|max_length[10]|matches[password]'
  // ]);

   $input = $this->validate([
       'nombre'   =>[
           'rules'=>'required|min_length[3]',
           'errors'=>[
               'required'=>'Su nombre es requerido',
               'min_length[3]'=>'Su nombre debe de tener mas de 3 caracteres'
               ]
           ],

       'apellido'   =>[
           'rules'=>'required|min_length[3]|max_length[30]',
           'errors'=>[
               'required'=>'Su apellido es requerido',
               'min_length[3]'=>'Su apellido debe de tener mas de 3 caracteres',
              'max_length[30]'=>'Su apellido supera el limite de caracteres'
               ]
           ],

       'email'   =>[
           'rules'=>'required|min_length[4]|max_length[50]|valid_email|is_unique[usuarios.email]',
           'errors'=>[
               'required'=>'Su email es requerido',
               'min_length[4]'=>'Su email debe de tener mas de 4 caracteres',
               'max_length[50]'=>'Su email supera el limite de caracteres',
               'valid_email'=>'Su email no es valido',
               'is_unique[usuarios.email]'=>'Su email ya ha sido registrado'
               ] 
           ],

       'usuario'=>[
           'rules'=>'required|min_length[3]',
               'errors'=>[
                   'required'=>'Su usuario es requerido',
                   'min_length[3]'=>'Su usuario debe de tener mas de 3 caracteres'
                   ]
               ],      
       
       'pass'=>[
           'rules'=>'required|min_length[3]|max_length[20]',
           'errors'=>[
               'required'=>'Su contraseña es requerida',
               'min_length[3]'=>'Su contraseña debe de tener mas de 3 caracteres',
               'max_length[20]'=>'Su contraseña supera el limite de caracteres'
               ]
           ],

       'pass-repetida'=>[
           'rules'=>'required|min_length[3]|max_length[20]|matches[pass]',
           'errors'=>[
               'required'=>'Debe de confirmar su contraseña',
               'min_length[3]'=>'Su contraseña debe de tener mas de 3 caracteres',
               'max_length[20]'=>'Su contraseña supera el limite de caracteres',
               'matches[password]'=>'Su contraseña no coincide con la anterior'
               ]
           ]
   ]);

  
   if (!$input){

       $data['titulo']='Registro'; 
       echo view('plantillas/head',$data);
       echo view('plantillas/header');
       echo view('back/usuario/registration', [
       'validation' =>$this->validator
        ]);

   } else {
      
       $nombre = $this->request->getVar('nombre');
       $apellido = $this->request->getVar('apellido');
       $usuario = $this->request->getVar('usuario');
       $email = $this->request->getVar('email');
       $password = $this->request->getVar('pass');
          
       $values =[
           'nombre'=>$nombre,
           'apellido'=>$apellido,
           'usuario'=>$usuario,
           'email'=>$email,
           'pass'=>Hash::make($password),
       ];

       $formModel = new Modelo_Usuario();
       
       if(!$formModel->insert($values)){
           return redirect()->back()->with('fail','Hubo un error, Lo sentimos mucho :(');
       } else{
           return redirect()->to('registracion')->with('success','Te has registrado exitosamente :)');
       }
           
   }

}














public function login(){

    $session =session();
        $model = new Modelo_Usuario();
        $usuario = $this->request->getVar('usuario');
        $password = $this->request->getVar('pass');
        $data = $model->where('usuario',$usuario)->first();

        if($data){
            $pass = $data['pass'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'     => $data['id'],
                    'nombre' => $data['nombre'],
                    'usuario'  => $data['usuario'],
                    'perfil_id'  => $data['perfil_id'],
                    'logged_in'       =>TRUE
                ];
                $session->set($ses_data);
                switch (session('perfil_id')){
                    case '1': //es admin
                        return redirect() ->to('/usuario');
                        break;
                    case '2':  //por defecto es visitante
                        return redirect()->to('/');
                        break;
                        }
            }else{
                $session->setFlashdata('msg','Contraseña Erronea');
                return redirect()->to('/');
            }
        }else{
            $session->setFlashdata('msg','usuario no encontrado');
                return redirect()->to('/registro');
        }
    }

    public function logout(){
        $session=session();
        $session->destroy();
        return redirect()->to('/');
    }


}