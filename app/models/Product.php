<?php
class Product extends Model {
    public function getAll() {
        $stmt = $this->db->prepare("SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO products (category_id, name, description, price, quantity) VALUES (:category_id, :name, :description, :price, :quantity)");
        return $stmt->execute([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE products SET category_id = :category_id, name = :name, description = :description, price = :price, quantity = :quantity WHERE id = :id");
        return $stmt->execute([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'id' => $id,
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
