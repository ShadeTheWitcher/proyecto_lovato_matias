<?php

namespace App\Controllers;

use App\Models\Product;
class Carrito_Controller extends BaseController
{  

    private $session;
    private $usuario;

    public function __construct() {
        helper(['form', 'url']);
        $this->session = \Config\Services::session();
        $this->usuario =$this->session->get();
    }

    public function catalogo(){
        $product = new Product();
        $datos['productos'] = $product->findAll();

        $data['title'] = 'Catalogo';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
            echo view("componentes/navbar");
            echo view('catalogo.php',$datos);
        
    }






}