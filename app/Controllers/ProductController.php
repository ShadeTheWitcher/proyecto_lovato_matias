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


        $data['title'] = 'Gestion Productos';

  
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

        $categoria= $this->request->getPost('categorias');
       


        $nombre_aleatorio = $img->getRandomName();
        $img->move(ROOTPATH. 'assets/uploads' ,$nombre_aleatorio);

        

        $data = [
            'name' => $this->request->getVar('name'),
            'price'  => $this->request->getVar('price'),
            'description'  => $this->request->getVar('description'),
            'cantidad'  => $this->request->getVar('cantidad'),
            'activo'  => "SI" ,
            'imagen'  => $nombre_aleatorio,
            "categoria_id" => $categoria,
            "es_tendencia"=> $this->request->getPost('es_tendencia')
        ];

        $product->insert($data);

        return $this->response->redirect(site_url('/products'));
    }

    // show product
    public function edit($id) {
        $product = new Product();
        $data['product'] = $product->where('id', $id)->first();

        $data['title'] = 'Editar Producto';

  
        echo view('componentes//header.php' ,[
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
             ]);
        
        
        echo view("componentes//navbar");
        echo view('back/products/edit', $data);
    }

    // update product data
    public function update(){

    $product = new Product();
    $id = $this->request->getVar('id');
    $productData = $product->find($id);

    $img = $this->request->getFile('imagen');

    if ($img->isValid()) {
        $nombre_aleatorio = $img->getRandomName();
        $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);

        // Eliminar la imagen anterior
        if (!empty($productData['imagen'])) {
            unlink(ROOTPATH . 'assets/uploads/' . $productData['imagen']);
        }
    }

    $data = [
        'name' => $this->request->getVar('name'),
        'price' => $this->request->getVar('price'),
        'description' => $this->request->getVar('description'),
        'cantidad'  => $this->request->getVar('cantidad'),
        'activo' => "SI",
        'categoria_id' => $this->request->getPost('categorias'),
        'es_tendencia' => $this->request->getPost('opcion_tendencia')
    ];

    if ($img->isValid()) {
        $data['imagen'] = $nombre_aleatorio;
    }

    $product->update($id, $data);
    return redirect()->to(site_url('/products'));
}


    // delete product
    public function delete($id) {
        $product = new Product();
        $data['product'] = $product->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/products'));
    }
}