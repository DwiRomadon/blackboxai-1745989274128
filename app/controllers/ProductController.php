<?php
class ProductController extends Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $products = $this->productModel->getAll();
        $this->view('products/index', ['products' => $products]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_id' => $_POST['category_id'] ?? null,
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
                'price' => $_POST['price'] ?? 0,
                'quantity' => $_POST['quantity'] ?? 0,
            ];
            $this->productModel->create($data);
            $this->redirect('/product/index');
        } else {
            $this->view('products/create');
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_id' => $_POST['category_id'] ?? null,
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
                'price' => $_POST['price'] ?? 0,
                'quantity' => $_POST['quantity'] ?? 0,
            ];
            $this->productModel->update($id, $data);
            $this->redirect('/product/index');
        } else {
            $product = $this->productModel->getById($id);
            if (!$product) {
                http_response_code(404);
                echo "Product not found";
                exit;
            }
            $this->view('products/edit', ['product' => $product]);
        }
    }

    public function delete($id) {
        $this->productModel->delete($id);
        $this->redirect('/product/index');
    }
}
