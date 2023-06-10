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

    public function productos_eliminados() {
        $product = new Product();
        $datos['products'] = $product->orderBy('id', 'DESC')->findAll();
        $data['title'] = 'Productos eliminados';

  
        echo view('componentes//header.php' ,[
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
             ]);
        
        
        echo view("componentes//navbar");
        echo view('back//products//productosEliminados',$datos);
        


    }


    // guarda el producto
    public function store() {
        $product = new Product();
        
        
        $img = $this->request->getFile('imagen');

        $categoria= $this->request->getPost('categorias');
       


        $nombre_aleatorio = $img->getRandomName();
        $img->move(ROOTPATH. 'assets/uploads' ,$nombre_aleatorio);

        

        $data = [
            'nombre_producto' => $this->request->getVar('nombre'),
            'precio_producto'  => $this->request->getVar('precio'),
            'descripcion'  => $this->request->getVar('descripcion'),
            'cantidad'  => $this->request->getVar('cantidad'),
            'activo'  => "SI" ,
            'imagen'  => $nombre_aleatorio,
            "categoria_id" => $categoria,
            "es_tendencia"=> $this->request->getPost('opcion_tendencia')
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
    public function update() {
        $product = new Product();
        $id = $this->request->getVar('id');
        $productData = $product->find($id);
        $img = $this->request->getFile('imagen');
    
        $data = [
            'nombre_producto' => $this->request->getVar('nombre'),
            'precio_producto' => $this->request->getVar('precio'),
            'descripcion' => $this->request->getVar('descripcion'),
            'cantidad' => $this->request->getVar('cantidad'),
            'activo' => "SI",
            'categoria_id' => $this->request->getPost('categorias'),
            'es_tendencia' => $this->request->getPost('opcion_tendencia')
        ];
    
        if ($img->isValid()) {
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);
    
            // Eliminar la imagen anterior
            if (!empty($productData['imagen'])) {
                $imagen_anterior = ROOTPATH . 'assets/uploads/' . $productData['imagen'];
                if (file_exists($imagen_anterior)) {
                    unlink($imagen_anterior);
                }
            }
    
            // Asignar el nombre de la nueva imagen al campo 'imagen' en $data
            $data['imagen'] = $nombre_aleatorio;
        }
    
        $product->update($id, $data);
        return redirect()->to(site_url('/products'));
    }
    
    
    



    // elimina product
    public function delete($id) {
        $product = new Product();
        $data['product'] = $product->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/products'));
    }


    public function baja($id){
    
        $Model=new Product();
        
        $datos=[
                
                'activo'  => 'NO',
                
            ];
        $Model->update($id,$datos);

        session()->setFlashdata('msg','Usuario Eliminado');

        return redirect()->back();
    }

    public function habilitar($id){
    
        $Model=new Product();
        
        $datos=[
                
                'activo'  => 'SI',
                
            ];
        $Model->update($id,$datos);

        session()->setFlashdata('success','Usuario Habilitado');

        return redirect()->back();
    }



}