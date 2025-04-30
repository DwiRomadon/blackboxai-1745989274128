<?php
class CategoryController extends Controller {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }

    public function index() {
        $categories = $this->categoryModel->getAll();
        $this->view('categories/index', ['categories' => $categories]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
            ];
            $this->categoryModel->create($data);
            $this->redirect('category/index');
        } else {
            $this->view('categories/create');
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
            ];
            $this->categoryModel->update($id, $data);
            $this->redirect('category/index');
        } else {
            $category = $this->categoryModel->getById($id);
            if (!$category) {
                http_response_code(404);
                echo "Category not found";
                exit;
            }
            $this->view('categories/edit', ['category' => $category]);
        }
    }

    public function delete($id) {
        $this->categoryModel->delete($id);
        $this->redirect('category/index');
    }
}
