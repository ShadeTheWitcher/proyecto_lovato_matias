<?php namespace App\Controllers;

use App\Models\Modelo_Usuario;
use CodeIgniter\Controller;

class usuario_controller extends BaseController{



    public function index(){
        echo view('componentes//header.html');
        echo view("componentes//navbar.html");
        echo view("back//usuario//registrarse.php");
        echo view("componentes//footer.html");
    }

    public function insertarUser() {
        $usuarios = new Modelo_Usuario();


        $usuarios->agregarUsuario();
    }


//     public function add(){

    

//     $this->load->helper('form');
//     $this->load->library('form_validation');

//     $this->form_validation->set_rules('nombre', 'Nombre', 'required');
//     if ($this->form_validation->run() === FALSE)
//     {
//         $this->load->view('templates/header', $data);
//         $this->load->view('editoriales/add');
//         $this->load->view('templates/footer');

//     }
//     else
//     {
//         $this->editoriales_model->add();
//         $this->load->view('templates/header', $data);
//         $this->load->view('editoriales/success');
//         $this->load->view('templates/footer');
//     }
// }

public function insertar() {
    $usuario = new Modelo_Usuario();

    $data = [
        'usuario' => $this->request->getVar('usuario'),
        'nombre' => $this->request->getVar('nombre'),
        'apellido'  => $this->request->getVar('apellido'),
        'email'  => $this->request->getVar('email'),
        'pass'  => $this->request->getVar('pass'),
    ];

    $usuario->insert($data);

    return $this->response->redirect(site_url('/'));
}



}