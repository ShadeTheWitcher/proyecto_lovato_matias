<?php

namespace App\Controllers;
use CodeIgniter\Model\Modelo_Usuario;
class Home extends BaseController
{
    public function index()
    {
        echo view('componentes//header.html');
        echo view("componentes//navbar.html");
        echo view("principal.html");
        echo view("componentes//footer.html");
        
        // $userModel = model(Modelo_Usuario::class);
        //  $datos = $userModel->mostrar();
        //  print_r($datos);
    }

    public function contacto(){
        echo view('componentes//header.html');
        echo view("componentes//navbar.html");
        echo view("contacto.php");
        echo view("componentes//footer.html");
        
    }

    public function quienes_somos(){
        echo view('componentes//header.html');
        echo view("componentes//navbar.html");
        echo view("quienes_somos.html");
        echo view("componentes//footer.html");
    }

    public function comercializacion(){
        echo view('componentes//header.html');
        echo view("componentes//navbar.html");
        echo view("comercializacion.html");
        echo view("componentes//footer.html");
    }
    
    public function term_usos(){
        echo view('componentes//header.html');
        echo view("componentes//navbar.html");
        echo view("term_usos.html");
        echo view("componentes//footer.html");
    }

    public function catalogo(){
        echo view('componentes//header.html');
        echo view("componentes//navbar.html");
        echo view("catalogo.html");
        echo view("componentes//footer.html");
    }

    public function login(){
        echo view('componentes//header.html');
        echo view("componentes//navbar.html");
        echo view("back//usuario//login.php");
        echo view("componentes//footer.html");
    }

    public function registro(){
        echo view('componentes//header.html');
        echo view("componentes//navbar.html");
        echo view("back//usuario//registrarse.php");
        echo view("componentes//footer.html");
    }
}
