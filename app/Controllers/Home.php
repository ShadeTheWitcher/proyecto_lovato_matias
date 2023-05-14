<?php

namespace App\Controllers;
use CodeIgniter\Model\Modelo_Usuario;
class Home extends BaseController
{
    
    

    public function index()
    {
        $data['title'] = 'Home';

        $esVisitante = false;
        if($esVisitante){
            echo view('back//usuario//userHeader.php', $data);
        }else{
            echo view('componentes//header.php' ,$data);
        }
        
        echo view("componentes//navbar.html");
        echo view("principal.html");
        echo view("componentes//footer.html");
        
        // $userModel = model(Modelo_Usuario::class);
        //  $datos = $userModel->mostrar();
        //  print_r($datos);
        
    }

    public function contacto(){
        $data['title'] = 'Contacto';

        echo view('componentes//header.php' ,$data);
        echo view("componentes//navbar.html");
        echo view("contacto.php");
        echo view("componentes//footer.html");
        
    }

    public function quienes_somos(){
        $data['title'] = 'Quienes somos';

        echo view('componentes//header.php' ,$data);
        echo view("componentes//navbar.html");
        echo view("quienes_somos.html");
        echo view("componentes//footer.html");
    }

    public function comercializacion(){
        $data['title'] = 'Comercializacion';

        echo view('componentes//header.php' ,$data);
        echo view("componentes//navbar.html");
        echo view("comercializacion.html");
        echo view("componentes//footer.html");
    }
    
    public function term_usos(){
        $data['title'] = 'terminos y usos';
        echo view('componentes//header.php' ,$data);
        echo view("componentes//navbar.html");
        echo view("term_usos.html");
        echo view("componentes//footer.html");
    }

    public function catalogo(){
        $data['title'] = 'catalogo';

        echo view('componentes//header.php' ,$data);
        echo view("componentes//navbar.html");
        echo view("catalogo.html");
        echo view("componentes//footer.html");
    }

    public function login(){
        $data['title'] = 'login';
        echo view('componentes//header.php' ,$data);
        echo view("componentes//navbar.html");
        echo view("back//usuario//login.php");
        echo view("componentes//footer.html");
    }

    public function registro(){
        $data['title'] = 'registro';
        echo view('componentes//header.php' ,$data);
        echo view("componentes//navbar.html");
        echo view("back//usuario//registrarse.php");
        echo view("componentes//footer.html");
    }
}
