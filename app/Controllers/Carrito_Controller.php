<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product;
use App\Models\VentaDetalle_model;
use App\Models\VentaCabecera_model;


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
       
        $product = new Product();
        
        

		$data['title'] = 'Carrito de Compras';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
         echo view("componentes/navbar");
        echo view('back/usuario/carrito', [
            
        ]);
    }

    public function gestionVentas(){ //vista de historial de ventas
        $ventas_model = new VentaCabecera_model();
        $datos['ventas'] = $ventas_model->findAll();

        $data['title'] = 'Admin ventas';
        echo view('componentes/header', [
            "title"=>$data['title'],
            "usuario"=>$this->usuario,
         ]);
            echo view("componentes/navbar");
            echo view('back/admin/adminVentas',$datos);
        
    }

    public function add(){
    
    $cart = session("cart");
    $total = session("totalCarrito");
    
    $request = \Config\Services::request();
    $product = [
        'id' => $request->getPost('id'),
        'name' => $request->getPost('nombre_product'),
        'price' => $request->getPost('precio'),
        'cant' => 1,
        "sub_total"=>$request->getPost('precio'),
        
    ];

    // // Verifica si el carrito existe en la sesión
    // if (!$cart) {
    //     // Si el carrito no existe, crea un nuevo array vacío
        
    //     $cart = [];
    //     $total= 0;
    // }

    // foreach($cart as &$item ){
    //     if($item["id"]==$product["id"]){
    //         $item["cant"]+=1;
            
            
            
    //     }

    //     $item["sub_total"]= $item["cant"] * $item["price"];

    //     $total= $total + $item["sub_total"];
         
    // }

    // $existeProducto = array_filter($cart, function($producto) use($product){
    //     return $producto["id"]==$product["id"];
    // });

    // if(empty($existeProducto)){
    //     // Agrega el producto al carrito
        
    //     $cart[] = $product;
    // }
         

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
   


    // Guarda el carrito actualizado en la sesión
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

        return redirect()->back()->withInput();
}



    

    /*Guarda Compra del carrito */
    public function guardarCompra() {
        $total = session("totalCarrito");
        
        $venta = new VentaCabecera_model();
        $session = session();

        $datos = array(

            'usuario_id'=> session('id'),
            
            'fecha' => date('Y-m-d'), 
        );

        
        $ventaId = $venta->insert($datos);

        
        $detalle = new VentaDetalle_model();
        $product = new Product();
        //$total = 0;

        $cart = session("cart");
        foreach($cart as $item){

            $datosProduct = $product->where('id', $item['id'])->first();
            
            if($datosProduct['cantidad'] < $item['cant']){
                
                $venta->where('id', $ventaId)->delete($ventaId);
                $session->setFlashdata('mensaje', 
                'No hay stock en linea, por favor eliga otro producto');
                
                return redirect('carrito');

            }else{
                $subTotal = 0;
                $datos= array(
                    'cantidad'=> $datosProduct['cantidad'] - $item['cant'],  
                );

                $product->update($datosProduct['id'], $datos);

                // if( $item['cant'] > 1){

                //    $subTotal = $item['cant'] * $item['price'];
                //    $total = $total + ($item['cant'] * $item['price']);

                // }else{

                //     $subTotal = $item['price'];
                //     $total = $total + $item['price'];
                // }

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
        }
        $datos = array(

            'total_venta'=> $total,  
        );
        
        $venta->update($ventaId ,$datos);
        session()->remove("cart");
        session()->remove("totalCarrito");
        return redirect('carrito');
    }



}