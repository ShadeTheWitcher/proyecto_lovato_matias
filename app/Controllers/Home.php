<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('componentes//header.html');
        echo view("componentes//navbar.html");
        echo view("principal.html");
        echo view("componentes//footer.html");
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
}
