<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add New Sale</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function addProductRow() {
            const container = document.getElementById('products-container');
            const index = container.children.length;
            const row = document.createElement('div');
            row.className = 'flex space-x-4 mb-4';

            row.innerHTML = `
                <select name="products[]" required class="border border-gray-300 rounded px-3 py-2 flex-1">
                    <option value="">Select Product</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?> (Stock: <?= $product['quantity'] ?>)</option>
                    <?php endforeach; ?>
                </select>
                <input type="number" name="quantities[]" min="1" value="1" required class="border border-gray-300 rounded px-3 py-2 w-24" />
                <button type="button" onclick="this.parentNode.remove()" class="bg-red-600 text-white px-3 rounded">Remove</button>
            `;
            container.appendChild(row);
        }
    </script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto max-w-2xl">
        <h1 class="text-3xl font-bold mb-6">Add New Sale</h1>
        <form action="/sale/create" method="POST" class="bg-white p-6 rounded shadow">
            <div class="mb-4">
                <label for="customer_id" class="block text-gray-700 font-semibold mb-2">Customer</label>
                <select name="customer_id" id="customer_id" class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="">Walk-in Customer</option>
                    <?php foreach ($customers as $customer): ?>
                        <option value="<?= $customer['id'] ?>"><?= htmlspecialchars($customer['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div id="products-container" class="mb-4">
                <div class="flex space-x-4 mb-4">
                    <select name="products[]" required class="border border-gray-300 rounded px-3 py-2 flex-1">
                        <option value="">Select Product</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?> (Stock: <?= $product['quantity'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                    <input type="number" name="quantities[]" min="1" value="1" required class="border border-gray-300 rounded px-3 py-2 w-24" />
                    <button type="button" onclick="this.parentNode.remove()" class="bg-red-600 text-white px-3 rounded">Remove</button>
                </div>
            </div>
            <button type="button" onclick="addProductRow()" class="mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Add Product</button>
            <div class="flex justify-between">
                <a href="/sale/index" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add Sale</button>
            </div>
        </form>
    </div>
</body>
</html>
