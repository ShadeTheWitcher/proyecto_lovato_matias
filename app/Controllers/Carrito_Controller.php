<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product;
use App\Models\VentaDetalle_model;
use App\Models\VentaCabecera_model;
use App\Models\Modelo_Usuario;
use App\Models\Domicilio_model;

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
        $categoria = $this->request->getPost('categoria');

        session();

        $data['title'] = 'Catalogo';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
            "categoria_seleccionada"=> $categoria,
         ]);
            echo view("componentes/navbar");
            echo view('catalogo.php',$datos);
        
    }

    public function filtrar(){   
        $request = \Config\Services::request();
        $product = new Product();
        $categoria = $this->request->getPost('categoria');

        if(!empty($categoria)){
            // Realiza la lógica de filtrado según la categoría seleccionada
            $productos['productos'] = $product->where('categoria_id', $categoria)->findAll();
        }else{
            $productos['productos'] = $product->findAll();
        }

        
        
        // Pasa los datos filtrados a la vista
        $data['title'] = 'Catalogo';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
            "categoria_seleccionada"=> $categoria,
         ]);
            echo view("componentes/navbar");
            echo view('catalogo.php',$productos);
        
    }

   

    public function index(){
       
        $product = new Product();
        $datos['productos'] = $product->findAll();
        

		$data['title'] = 'Carrito de Compras';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
         echo view("componentes/navbar");
        echo view('back/usuario/carrito',$datos 
            
        );
    }

    public function gestionVentas(){ //vista de historial de ventas
        $ventas_model = new VentaCabecera_model();
        $datos['ventas'] = $ventas_model->getUserAll();

        $data['title'] = 'Admin ventas';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
            echo view("componentes/navbar");
            echo view('back/admin/adminVentas',$datos);
        
    }

    public function detalleVenta($id){
        $ventas_detalle_model = new VentaDetalle_model();
        
        
        $datos['ventas_detalle'] = $ventas_detalle_model->getProductosPorVenta($id);

        $data['title'] = 'detalle venta';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
            echo view("componentes/navbar");
            echo view('back/admin/adminDetalle',$datos);
    }

    public function form_compra(){

        $domicilio_model = new Domicilio_model();
        $id= session("domicilio_id") ;
        $datos['domicilio'] = $domicilio_model->where('id', $id)->first();

        $data['title'] = 'Confirmacion de tu compra';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
            echo view("componentes/navbar");
            echo view('back/usuario/vista_form_compra',$datos);
        
    }

    //metodos

    public function add(){
    
        $cart = session("cart");
        $total = session("totalCarrito");
    
        $request = \Config\Services::request();
        $product = [
            'id' => $request->getPost('id'),
            'name' => $request->getPost('nombre_product'),
            'price' => $request->getPost('precio'),
            'cant' => 1,
            "sub_total" => $request->getPost('precio'),
        ];
    
        if (!$cart) {
            $cart = [];
            $total = 0;
        }
    
        $productExists = false;
    
        foreach ($cart as &$item) {
            if ($item['id'] == $product['id']) {
                $item['cant'] += 1;
                $item['sub_total'] = $item['cant'] * $item['price'];
                $productExists = true;
                break;
            }
        }
    
        if (!$productExists) {
            $cart[] = $product;
        }
    
        $total = array_sum(array_column($cart, 'sub_total'));
    
        session()->set("cart", $cart);
        session()->set("totalCarrito", $total);
    
        return redirect()->back()->withInput();
}




    public function borrar($id){
        $cart = $this->session->get("cart");
        //$this->session->destroy("cart");
        
        

    //    $newCart= array_filter($cart,function($producto) use($id){
    //         return $producto["id"] !== $id;
    //    });


    //    $newTotalCarrito= array_filter($cart,function($producto) use($id){

    //         $totalActual= $this->session->get("totalCarrito");
    //         $nuevoTotal= ($producto["cant"] * $producto["price"] );

    //         return $nuevoTotal;
    //     });


    //     if ($newCart) {
    //         $subtotalEliminado = $productoEliminado["cant"] * $productoEliminado["price"];
    //         $totalCarrito -= $subtotalEliminado;
    //         $this->session->set("totalCarrito", $totalCarrito);
    //     }

    //     $totalActual= $this->session->get("totalCarrito");
    //    $newTotalCarrito =  $totalActual - (float)$newTotalCarrito ;

    //    $this->session->set("cart" , $newCart);
    //    $this->session->set("totalCarrito", $newTotalCarrito);




       $totalCarrito = $this->session->get("totalCarrito");

       // Verificar si el carrito existe y no está vacío
       if ($cart && !empty($cart)) {
           // Buscar el producto a eliminar en el carrito
           $productoEliminado = null;
           foreach ($cart as $key => $producto) {
               if ($producto["id"] === $id) {
                   $productoEliminado = $producto;
                   // Eliminar el producto del carrito
                   unset($cart[$key]);
                   break;
               }
           }
   
           // Actualizar el carrito en la sesión
           $this->session->set("cart", $cart);
   
           // Recalcular el total del carrito
           if ($productoEliminado) {
               $subtotalEliminado = $productoEliminado["cant"] * $productoEliminado["price"];
               $totalCarrito -= $subtotalEliminado;

                // Verificar si el total es negativo y establecerlo en cero si es así
                $totalCarrito = max(0, $totalCarrito);

               $this->session->set("totalCarrito", $totalCarrito);
           }
       }


       return redirect()->back()->withInput();
    }


    public function vaciarCarrito(){

        $sessionCart = session()->get("cart");

        if ($sessionCart && !empty($sessionCart)) {
            session()->remove("cart"); //para remover la variable cart
            session()->remove("totalCarrito"); // y el total 
        }

        return redirect()->to("catalogo")->withInput();
}



public function incrementarCant()
{
    $cart = session("cart");
    $total = session("totalCarrito");

    $request = \Config\Services::request();
    $product = [
        'id' => $request->getPost('id'),
        'name' => $request->getPost('nombre_product'),
        'price' => $request->getPost('precio'),
        'cant' => 1,
        "sub_total" => $request->getPost('precio'),
    ];

    if (!$cart) {
        $cart = [];
        $total = 0;
    }

    $productExists = false;

    foreach ($cart as &$item) {
        if ($item['id'] == $product['id']) {
            $item['cant'] += 1;
            $item['sub_total'] = $item['cant'] * $item['price'];
            $productExists = true;
            break;
        }
    }

    if (!$productExists) {
        $cart[] = $product;
    }

    $total = array_sum(array_column($cart, 'sub_total'));

    session()->set("cart", $cart);
    session()->set("totalCarrito", $total);

    return redirect()->back()->withInput();
}

public function disminuirCant($id)
{
    $cart = $this->session->get("cart");
    $totalCarrito = $this->session->get("totalCarrito");

    if ($cart && !empty($cart)) {
        $productoEliminado = null;
        foreach ($cart as $key => $producto) {
            if ($producto["id"] === $id) {
                $productoEliminado = $producto;
                // Verificar si la cantidad es mayor a 1 para decrementarla
                if ($producto["cant"] > 1) {
                    $cart[$key]["cant"] -= 1;
                    $cart[$key]["sub_total"] = $cart[$key]["cant"] * $cart[$key]["price"];
                } else {
                    // Eliminar el producto del carrito si la cantidad es 1
                    unset($cart[$key]);
                }
                break;
            }
        }

        $this->session->set("cart", $cart);

        if ($productoEliminado) {
            $subtotalEliminado = $productoEliminado["price"];
            $totalCarrito -= $subtotalEliminado;
            $totalCarrito = max(0, $totalCarrito);
            $this->session->set("totalCarrito", $totalCarrito);
        }
    }

    return redirect()->back()->withInput();
}








    public function validarStock() {
        $session = session();
        $product = new Product();
        $cart = session("cart");

        if(empty($cart)){

            $session->setFlashdata('mensaje', 
                'no hay nada en el carrito');
            return redirect('carrito');
        }




        foreach($cart as $item){

            $datosProduct = $product->where('id', $item['id'])->first();
            
            if($datosProduct['cantidad'] < $item['cant']){
                
               
                $session->setFlashdata('mensaje', 
                'No hay stock en linea, por favor eliga otro producto');
                
                return redirect('carrito');

            }else{

                    return redirect("form-compra");

                }

                
        }

    }


    public function registrarCompra() {
        $usuarioModel = new Modelo_Usuario();
        $domicilio_model= new Domicilio_model;
        $total = session("totalCarrito");
        
        $venta = new VentaCabecera_model();

        $session = session();

        $idUser = session('id');
        
        

        $datos = array(

            'usuario_id'=> session('id'),
            
            'fecha' => date('Y-m-d'), 
            'total_venta'=> $total,
        );


        // Verificar si el usuario ya tiene un domicilio registrado
        $domicilioId = session('domicilio_id');

        // Verificar si el usuario está realizando cambios en su domicilio
        $nuevoDomicilio = false;
        if ($domicilioId && $this->request->getPost('modificar_domicilio')) {
            $datosDomicilio = array(
                'direccion' => $this->request->getPost('direccion'),
                'cod_postal' => $this->request->getPost('cod_postal'),
            );

            // Actualizar el domicilio existente
            $domicilio_model->update($domicilioId, $datosDomicilio);
        
        
        
        }else if($domicilioId){
            //no carga datos al sesion y de esta forma no ocurre el problema al rescatar datos
        
        
        
        } else {
            $datosDomicilio = array(
                'direccion' => $this->request->getPost('direccion'),
                'cod_postal' => $this->request->getPost('cod_postal'),
            );

            // Registramos el domicilio solo si no existe uno previo
            $domicilioId = $domicilio_model->insert($datosDomicilio);
            $usuarioModel->update($idUser, array('domicilio_id' => $domicilioId));
            $nuevoDomicilio = true;
            session()->set('domicilio_id', $domicilioId);
        }
        if ($nuevoDomicilio) {
            $session->setFlashdata('success_domicilio', 'Domicilio registrado exitosamente');
        }
       


        
        $detalle = new VentaDetalle_model();
        $product = new Product();
        //$total = 0;

        $cart = session("cart");


        $ventaId = null;

        foreach($cart as $item){

            if ($ventaId === null) {
                $ventaId = $venta->insert($datos);
            }



            $datosProduct = $product->where('id', $item['id'])->first();
            
            

                
                
                $datos= array(
                    'cantidad'=> $datosProduct['cantidad'] - $item['cant'],  
                );

                $product->update($datosProduct['id'], $datos);

                

                $detalle_venta = array(
                    'venta_id'=> $ventaId,
                    'producto_id' => $item['id'],
                    'cantidad' => $item['cant'],
                    'precio' => $item['price'],
                    'sub_total' => $item['sub_total'],
                );
               
                $detalle->insert($detalle_venta);
                $session->setFlashdata('success', 
                'Productos Comprados Exitosamente');
            
        }
        $datos = array(

            'total_venta'=> $total,  
        );
        
        


        session()->remove("cart");
        session()->remove("totalCarrito");
        return redirect('carrito');
        

    }

    public function cancelar_compra() {
        session()->remove("cart");
        session()->remove("totalCarrito");
        return redirect('carrito');
    }



}