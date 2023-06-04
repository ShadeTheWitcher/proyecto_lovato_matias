<?php

namespace App\Controllers;

use App\Models\Consulta_model;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RedirectResponse;



class Consultas_controller extends BaseController{

    private $session;
    private $usuario;

    public function __construct() {
        helper(['form', 'url', "session"]);
        $this->session = \Config\Services::session();
        $this->usuario =$this->session->get();
        
    }



    public function consultasUsuarios(){
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

    public function consultasVisitante(){
        $consulta_model = new Consulta_model();
        $consultas['consultas'] = $consulta_model->findAll();

        $data['title'] = 'Admin Consultas';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
            echo view("componentes/navbar");
            echo view('/back/admin/adminConsultasVisitante',$consultas);
    }




    public function vista_leidos(){
        
        $consulta_model = new Consulta_model();
        $consultas['consultas'] = $consulta_model->where('tipo_usuario', 2)->findAll();

        $data['title'] = 'consultas leidas';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
            "previous_url"=>previous_url()

         ]);
            echo view("componentes/navbar");
            echo view('/back/admin/adminConsultasLeidas',$consultas);
    }

    
    public function vista_leidos_Visitante(){
        
        $consulta_model = new Consulta_model();
        $consultas['consultas'] = $consulta_model->where('tipo_usuario', 1)->findAll();

        $data['title'] = 'consultas leidas';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
            "previous_url"=>previous_url()
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
    
        if (($this->usuario && isset($this->usuario['logged_in']) &&  $this->usuario['perfil_id'] == 2)) {
            $data = [
                'nombre_apellido' => $nombre_apellido,
                'email'=> $email,
                'razon'=> $razon,
                'area'=> $area,
                'mensaje'=> $mensaje,
                'tipo_usuario'=> 2
            ];
        } else {
            $data = [
                'nombre_apellido' => $nombre_apellido,
                'email'=> $email,
                'razon'=> $razon,
                'area'=> $area,
                'mensaje'=> $mensaje
            ];
        }
    
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