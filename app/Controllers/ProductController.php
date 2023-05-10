<?php
namespace App\Controllers;
use App\Models\Product;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    // show products list
    public function index() {
        $product = new Product();
        $data['products'] = $product->orderBy('id', 'DESC')->findAll();
        return view('products/index', $data);
    }

    // show create product form
    public function create() {
        return view('products/create');
    }

    // save product data
    public function store() {
        $product = new Product();

        $data = [
            'name' => $this->request->getVar('name'),
            'price'  => $this->request->getVar('price'),
            'description'  => $this->request->getVar('description'),
        ];

        $product->insert($data);

        return $this->response->redirect(site_url('/products'));
    }

    // show product
    public function edit($id) {
        $product = new Product();
        $data['product'] = $product->where('id', $id)->first();
        return view('products/edit', $data);
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