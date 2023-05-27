<?php

namespace App\Controllers;
use CodeIgniter\Model\Modelo_Usuario;
class Home extends BaseController
{   
    private $session;
    private $usuario;
    
    public function __construct(){
        $this->session = \Config\Services::session();
        $this->usuario =$this->session->get();
    }

    public function index()
    {
        //$perfil_id = $_SESSION['perfil_id'];
        //$estado_session = $_SESSION['logged_in'];

        $data['title'] = 'Home';

  
        echo view('componentes//header.php' ,[
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
             ]);
        
        
        echo view("componentes//navbar");
        echo view("principal" ,[
            "usuario"=>$this->usuario
        ]);
        //echo view("componentes//footer.html");
        return view("componentes//footer.html", ["usuario"=>$this->usuario]   )  ;
        
        // $userModel = model(Modelo_Usuario::class);
        //  $datos = $userModel->mostrar();
        //  print_r($datos);
        
    }

    public function contacto(){
        if($this->usuario){
            $data['title'] = 'Consultas';
        }else{
            $data['title'] = 'Contacto';
        }
        

        echo view('componentes//header.php' ,[
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
        echo view("componentes//navbar");
        echo view("contacto.php");
        echo view("componentes//footer.html");
        
    }

    public function quienes_somos(){
        $data['title'] = 'Quienes somos';

        echo view('componentes//header.php' ,[
                "title"=>$data['title'],
                "usuario"=>$this->usuario,
             ]);
        echo view("componentes//navbar");
        echo view("quienes_somos.html");
        echo view("componentes//footer.html");
    }

    public function comercializacion(){
        $data['title'] = 'Comercializacion';

        echo view('componentes//header.php' ,[
                "title"=>$data['title'],
                "usuario"=>$this->usuario,
             ]);
        echo view("componentes//navbar");
        echo view("comercializacion.html");
        echo view("componentes//footer.html");
    }
    
    public function term_usos(){
        $data['title'] = 'terminos y usos';
        echo view('componentes//header.php' ,[
                "title"=>$data['title'],
                "usuario"=>$this->usuario,
             ]);
        echo view("componentes//navbar");
        echo view("term_usos.html");
        echo view("componentes//footer.html");
    }

    public function catalogo(){
        $data['title'] = 'catalogo';

        echo view('componentes//header.php' ,[
                "title"=>$data['title'],
                "usuario"=>$this->usuario,
             ]);
        echo view("componentes//navbar");
        echo view("catalogo.html");
        echo view("componentes//footer.html");
    }

    public function login(){
        $data['title'] = 'login';
        echo view('componentes//header.php' ,[
                "title"=>$data['title'],
                "usuario"=>$this->usuario,
             ]);
        echo view("componentes//navbar");
        echo view("back//usuario//login.php");
        echo view("componentes//footer.html");
    }

    public function registro(){
        $data['title'] = 'registro';
        echo view('componentes//header.php' ,[
                "title"=>$data['title'],
                "usuario"=>$this->usuario,
             ]);
        echo view("componentes//navbar");
        echo view("back//usuario//registrarse.php");
        echo view("componentes//footer.html");
    }
}
