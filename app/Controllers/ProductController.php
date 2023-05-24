<?php
namespace App\Controllers;
use App\Models\Product;
use CodeIgniter\Controller;

class ProductController extends BaseController
{

    private $session;
    private $usuario;

    public function __construct(){
        helper(['form', 'url']);
        
        $this->session = \Config\Services::session();
        $this->usuario =$this->session->get();
        

     }



    // show products list
    public function index() {
        $product = new Product();
        $data['products'] = $product->orderBy('id', 'DESC')->findAll();


        $data['title'] = 'Añadir producto';

  
        echo view('componentes//header.php' ,[
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
             ]);
        
        
        echo view("componentes//navbar");

        echo view('back/products/index', $data);
    }

    // show create product form
    public function create() {
        $data['title'] = 'Añadir producto';

  
        echo view('componentes//header.php' ,[
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
             ]);
        
        
        echo view("componentes//navbar");
        echo view('back/products/create');
        


    }

    // save product data
    public function store() {
        $product = new Product();

        $img = $this->request->getFile('imagen');
        $nombre_aleatorio = "juego";
        $img->move(ROOTPATH. 'assets/uploads');


        $data = [
            'name' => $this->request->getVar('name'),
            'price'  => $this->request->getVar('price'),
            'description'  => $this->request->getVar('description'),
            'imagen'  => $,
        ];

        $product->insert($data);

        return $this->response->redirect(site_url('/products'));
    }

    // show product
    public function edit($id) {
        $product = new Product();
        $data['product'] = $product->where('id', $id)->first();
        return view('back/products/edit', $data);
    }

    // update product data
    public function update() {
        $product = new Product();
        $id = $this->request->getVar('id');

        $data = [
            'name' => $this->request->getVar('name'),
            'price'  => $this->request->getVar('price'),
            'description'  => $this->request->getVar('description'),
        ];

        $product->update($id, $data);
        return $this->response->redirect(site_url('/products'));
    }

    // delete product
    public function delete($id) {
        $product = new Product();
        $data['product'] = $product->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/products'));
    }
}