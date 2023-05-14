<?php 

namespace App\Controllers;
use App\Models\Modelo_Usuario;
use CodeIgniter\Controller;
use App\Libraries\Hash;

class usuario_controller extends Controller{

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


    public function login_form(){
        $data['title']='login'; 
        echo view('componentes//header.php', $data);
        echo view("componentes//navbar.html");
        echo view("back//usuario//login.php");
        echo view("componentes//footer.html");
    }

    




public function insertar() {
   
    $user = new Modelo_Usuario();

    


    $nombre = $this->request->getVar('nombre');
    $apellido = $this->request->getVar('apellido');
    $usuario = $this->request->getVar('usuario');
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('pass');



    $dataUser = [
        'usuario' => $usuario,
        'nombre' => $nombre,
        'apellido'=> $apellido,
        'email'=> $email,
        'pass'  =>Hash::make($password)
    ];

    // $data = [
    //     'usuario' => $this->request->getVar('usuario'),
    //     'nombre' => $this->request->getVar('nombre'),
    //     'apellido'  => $this->request->getVar('apellido'),
    //     'email'  => $this->request->getVar('email'),
    //     'pass'  => $this->request->getVar('pass'),
    // ];


   



    if(!$user->insert($dataUser)){
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
       echo view('componentes/header',$data);
       echo view('back/usuario/registrarse', [
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
    $request = \Config\Services::request();
    $session =session();
        $model = new Modelo_Usuario();
        $usuario = $this->request->getVar('Usuario');
        $password = $this->request->getVar('Pass');
        
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
                        $session->setFlashdata('msg','Inicio de session exitoso');
                        return redirect()->to('/');
                        break;
                        }
            }else{
                $session->setFlashdata('msg','Contraseña Erronea');
                return redirect()->to('/usuario/login');
            }
        }else{
            $session->setFlashdata('msg','usuario no encontrado');
                return redirect()->to('/usuario/login');
        }
    }

    public function logout(){
        $session=session();
        $session->destroy();
        return redirect()->to('/');
    }


}