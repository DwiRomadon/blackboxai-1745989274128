<?php
class Customer extends Model {
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM customers ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM customers WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO customers (name, email, phone, address) VALUES (:name, :email, :phone, :address)");
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE customers SET name = :name, email = :email, phone = :phone, address = :address WHERE id = :id");
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'id' => $id,
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM customers WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
