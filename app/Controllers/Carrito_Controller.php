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

    public function index(){
        $cart = \Config\Services::Cart();
        $product = new Product();
        
		$data['title'] = 'Carrito de Compras';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
         echo view("componentes/navbar");
        echo view('back/usuario/carrito');
    }

    public function add(){
       
        $cart = \Config\Services::Cart();

        $request = \Config\Services::request();
        $data = array(
            'id' =>$request->getPost('id'),
            'name' => $request->getPost('nombre_product'),
            'qty' => 1,
            'price' =>$request->getPost('precio'),
        );
        $cart->insert($data);
        return redirect()->back()->withInput();
    }






}