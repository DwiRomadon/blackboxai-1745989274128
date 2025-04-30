<?php
class SaleItem extends Model {
    public function getBySaleId($sale_id) {
        $stmt = $this->db->prepare("SELECT si.*, p.name as product_name FROM sale_items si JOIN products p ON si.product_id = p.id WHERE si.sale_id = :sale_id");
        $stmt->execute(['sale_id' => $sale_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO sale_items (sale_id, product_id, quantity, price) VALUES (:sale_id, :product_id, :quantity, :price)");
        return $stmt->execute([
            'sale_id' => $data['sale_id'],
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
        ]);
    }

    public function deleteBySaleId($sale_id) {
        $stmt = $this->db->prepare("DELETE FROM sale_items WHERE sale_id = :sale_id");
        return $stmt->execute(['sale_id' => $sale_id]);
    }
}
