<?php 

namespace App\Controllers;
use App\Models\Modelo_Usuario;
use CodeIgniter\Controller;


class usuario_controller extends BaseController{

    private $session;
    private $usuario;

    public function __construct(){
        helper(['form', 'url']);
        
        $this->session = \Config\Services::session();
        $this->usuario =$this->session->get();
        

     }

     

     //vistas
    public function index(){  //admin de usuarios
        $usuarios = new Modelo_Usuario();
        $data['usuarios'] = $usuarios->orderBy('id', 'DESC')->findAll();



        $data['title']='administrador de usuarios'; 
        echo view('componentes//header.php' ,[
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
        echo view("componentes//navbar");
        echo view("back//admin//adminUsuarios.php", [
            "usuarios"=>$data['usuarios']
        ]);
        
    }

    public function registro_form(){
        $data['title']='registro'; 
        echo view('componentes//header.php' ,[
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
        echo view("componentes//navbar");
        echo view("back//usuario//registrarse.php");
        echo view("componentes//footer.html");
    }


    public function login_form(){
        $data['title']='login'; 
        echo view('componentes//header.php' ,[
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
        echo view("componentes//navbar");
        echo view("back//usuario//login.php");
        echo view("componentes//footer.html");
    }

    public function editar($id) {
        $usuario = new Modelo_Usuario();
        $data['usuario'] = $usuario->where('id', $id)->first();
        return view('usuario/edit', $data);
    }

    
    public function perfil(){
        $data['title']='perfil'; 
        echo view('componentes//header.php' ,[
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
        echo view("componentes//navbar");
        echo view("back//usuario//perfil.php");
        echo view("componentes//footer.html");
    }

    public function usuariosBaja(){  //vista dados de baja
        $usuarios = new Modelo_Usuario();
        $data['usuarios'] = $usuarios->orderBy('id', 'DESC')->findAll();



        $data['title']='administrador de usuarios'; 
        echo view('componentes//header.php' ,[
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
        echo view("componentes//navbar");
        echo view("back//admin//adminUserBaja.php", [
            "usuarios"=>$data['usuarios']
        ]);
        
    }


//metodos
public function insertar() {
    $session =session();
   
    $user = new Modelo_Usuario();
   
    


    $nombre = $this->request->getPost('nombre');
    $apellido = $this->request->getPost('apellido');
    $usuario = $this->request->getPost('usuario');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('pass');
    $cpass = $this->request->getPost('pass-repetida');

    $password= (string)$password;
    $cpass= (string)$cpass;

    if( ($password === $cpass)==false) {
        return redirect()->back()->with('fail','Las contraseñas no coinciden :(');
    }

    $data = [
        'usuario' => $usuario,
        'nombre' => $nombre,
        'apellido'=> $apellido,
        'email'=> $email,
        'pass'  =>crypt($password, PASSWORD_DEFAULT),
        "perfil_id"=> 2,
        "baja" => "NO"
    ];


    $existeUsuario = $user->existeUsuario($usuario); //compara la variable
    $existeEmail = $user->existeEmail($email); //compara la variable

    if($existeUsuario > 0){
        return redirect()->back()->with('failUser','el usuario ya existe');
    }

    if($existeEmail > 0){
        return redirect()->back()->with('failEmail','el correo ya esta en uso');
    }

    

    $user_id=  $user->insert($data); //guarda la id

    if($user_id){ //si es null da error
        $ses_data = [
            'id'     => $user_id, //ya se logea al regsitrarse
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'usuario'  => $data['usuario'],
            'email'  => $data['email'],
            'perfil_id'  => $data['perfil_id'],
            'logged_in'       =>TRUE
        ];

        $session->set($ses_data);
        $session->setFlashdata('success', '!Gracias ' . $nombre . ' por unirte!');
        return redirect()->to(site_url('/'));
        

    }else{
        $session->setFlashdata('failRegistro', '!No se ha podido registrar!');
        return redirect()->back();
    }

    

    // $data = [
    //     'usuario' => $this->request->getVar('usuario'),
    //     'nombre' => $this->request->getVar('nombre'),
    //     'apellido'  => $this->request->getVar('apellido'),
    //     'email'  => $this->request->getVar('email'),
    //     'pass'  => $this->request->getVar('pass'),
    // ];


   



   
    

    //return $this->response->redirect(site_url('/'));
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
    //return $this->response->redirect(site_url('/'));
    return redirect()->back();
}

// delete product
public function delete($id) {
    $usuario = new Modelo_Usuario();
    $data['usuario'] = $usuario->where('id', $id)->delete($id);
    return $this->response->redirect(site_url('/'));
}



public function login(){
    $request = \Config\Services::request();
    $session =session();
        $model = new Modelo_Usuario();
        $usuario = $this->request->getPost('Usuario');
        $password = $this->request->getPost('Pass');
        
        
        $data = $model->where('usuario',$usuario)->first();
        
        if($data){
            $password = (string)$password;
            $pass = (string)$data['pass'];
            

            $verify_pass = password_verify($password, $pass);
            
            if($verify_pass){
                $ses_data = [
                    'id'     => $data['id'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'usuario'  => $data['usuario'],
                    'email'  => $data['email'],
                    'perfil_id'  => $data['perfil_id'],
                    "domicilio_id"=> $data["domicilio_id"],
                    'baja'  => $data['baja'],
                    'logged_in'       =>TRUE,
                    
                ];


                if ($ses_data["baja"] == "SI") {
                    $session->setFlashdata('msg', 'Tu usuario está dado de baja');
                    return redirect()->to(base_url('usuario/login'));
                }


                $session->set($ses_data);

                

                if(session('perfil_id') == 1){
                    return redirect()->to('/usuario/admin');
                }else{
                    return redirect()->to('/');
                }
                
                
            }else{
                $session->setFlashdata('msg','usuario o contraseña erronea'); //verifica pass
                return redirect()->to(base_url('usuario/login'));
            }
        }else{
            $session->setFlashdata('msg','usuario o contraseña erronea'); //verifica user
            return redirect()->to(base_url('usuario/login'));
        }
    }

    public function logout(){
        $session=session();
        $session->destroy();
        return redirect()->to('/');
    }

    


    public function baja($id){
    
        $Model=new Modelo_Usuario();
        $data=$Model->obtenerUserPorID($id);
        $datos=[
                
                'baja'  => 'SI',
                
            ];
        $Model->update($id,$datos);

        session()->setFlashdata('msg','Usuario Eliminado');

        return redirect()->to(base_url('usuario/admin'));
    }

    public function habilitar($id){
    
        $Model=new Modelo_Usuario();
        $data=$Model->obtenerUserPorID($id);
        $datos=[
                
                'baja'  => 'NO',
                
            ];
        $Model->update($id,$datos);

        session()->setFlashdata('success','Usuario Habilitado');

        return redirect()->back();
    }


}