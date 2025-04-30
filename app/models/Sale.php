<?php
class Sale extends Model {
    public function getAll() {
        $stmt = $this->db->prepare("SELECT s.*, c.name as customer_name FROM sales s LEFT JOIN customers c ON s.customer_id = c.id ORDER BY s.sale_date DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM sales WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO sales (customer_id, total, sale_date) VALUES (:customer_id, :total, :sale_date)");
        $stmt->execute([
            'customer_id' => $data['customer_id'],
            'total' => $data['total'],
            'sale_date' => $data['sale_date'],
        ]);
        return $this->db->lastInsertId();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM sales WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
