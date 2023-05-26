<?php

namespace App\Controllers;

use App\Models\Consulta_model;
use CodeIgniter\Controller;



class Consultas_controller extends BaseController{

    private $session;
    private $usuario;

    public function __construct() {
        helper(['form', 'url']);
        $this->session = \Config\Services::session();
        $this->usuario =$this->session->get();
    }



    public function index(){
        $consulta_model = new Consulta_model();
        $consultas['consultas'] = $consulta_model->findAll();

        $data['title'] = 'Admin Consultas';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
            echo view("componentes/navbar");
            echo view('/back/admin/adminConsultas',$consultas);
    }

}