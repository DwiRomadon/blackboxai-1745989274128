<?php
class CustomerController extends Controller {
    private $customerModel;

    public function __construct() {
        $this->customerModel = new Customer();
    }

    public function index() {
        $customers = $this->customerModel->getAll();
        $this->view('customers/index', ['customers' => $customers]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'address' => $_POST['address'] ?? '',
            ];
            $this->customerModel->create($data);
            $this->redirect('customer/index');
        } else {
            $this->view('customers/create');
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'address' => $_POST['address'] ?? '',
            ];
            $this->customerModel->update($id, $data);
            $this->redirect('customer/index');
        } else {
            $customer = $this->customerModel->getById($id);
            if (!$customer) {
                http_response_code(404);
                echo "Customer not found";
                exit;
            }
            $this->view('customers/edit', ['customer' => $customer]);
        }
    }

    public function delete($id) {
        $this->customerModel->delete($id);
        $this->redirect('customer/index');
    }
}
