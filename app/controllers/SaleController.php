<?php
class SaleController extends Controller {
    private $saleModel;
    private $saleItemModel;
    private $productModel;
    private $customerModel;

    public function __construct() {
        $this->saleModel = new Sale();
        $this->saleItemModel = new SaleItem();
        $this->productModel = new Product();
        $this->customerModel = new Customer();
    }

    public function index() {
        $sales = $this->saleModel->getAll();
        $this->view('sales/index', ['sales' => $sales]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_id = $_POST['customer_id'] ?? null;
            $products = $_POST['products'] ?? [];
            $quantities = $_POST['quantities'] ?? [];

            $total = 0;
            $items = [];

            foreach ($products as $index => $product_id) {
                $quantity = (int)($quantities[$index] ?? 0);
                if ($quantity <= 0) continue;

                $product = $this->productModel->getById($product_id);
                if (!$product) continue;

                $price = $product['price'];
                $total += $price * $quantity;

                $items[] = [
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'price' => $price,
                ];
            }

            if (empty($items)) {
                echo "No valid products selected.";
                exit;
            }

            $sale_id = $this->saleModel->create([
                'customer_id' => $customer_id,
                'total' => $total,
                'sale_date' => date('Y-m-d H:i:s'),
            ]);

            foreach ($items as $item) {
                $item['sale_id'] = $sale_id;
                $this->saleItemModel->create($item);

                // Update product quantity
                $product = $this->productModel->getById($item['product_id']);
                $new_quantity = max(0, $product['quantity'] - $item['quantity']);
                $this->productModel->update($item['product_id'], [
                    'category_id' => $product['category_id'],
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'quantity' => $new_quantity,
                ]);
            }

            $this->redirect('/sale/index');
        } else {
            $products = $this->productModel->getAll();
            $customers = $this->customerModel->getAll();
            $this->view('sales/create', ['products' => $products, 'customers' => $customers]);
        }
    }

    public function view($id) {
        $sale = $this->saleModel->getById($id);
        if (!$sale) {
            http_response_code(404);
            echo "Sale not found";
            exit;
        }
        $items = $this->saleItemModel->getBySaleId($id);
        $this->view('sales/view', ['sale' => $sale, 'items' => $items]);
    }

    public function delete($id) {
        $this->saleItemModel->deleteBySaleId($id);
        $this->saleModel->delete($id);
        $this->redirect('/sale/index');
    }
}
