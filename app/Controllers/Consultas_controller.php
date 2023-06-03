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

    public function vista_leidos(){
        $consulta_model = new Consulta_model();
        $consultas['consultas'] = $consulta_model->findAll();

        $data['title'] = 'consultas leidas';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
            echo view("componentes/navbar");
            echo view('/back/admin/adminConsultasLeidas',$consultas);
    }

    


    



    public function enviar_consulta() {
        
       
        $consulta_model = new Consulta_model();
       
    
        $nombre_apellido = $this->request->getPost('nombre_apellido');
        $email = $this->request->getPost('email');
        $area = $this->request->getPost('area');
        $razon = $this->request->getPost('razon');
        $mensaje = $this->request->getPost('mensaje');


        $data = [
            'nombre_apellido' => $nombre_apellido,
            'email'=> $email,
            "razon"=> $razon,
            "area"=> $area,
            "mensaje"=> $mensaje,
            
        ];

        $consulta_model->insert($data);
        return redirect()->back();
    }

    public function marcar_leido($id){
    
        $Model=new Consulta_model();
        
        $datos=[
                
                'leido'  => 'SI',
                
            ];
        $Model->update($id,$datos);

        session()->setFlashdata('msg','Mensaje Leido');

        return redirect()->back();
    }

    
}