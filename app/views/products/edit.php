<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto max-w-lg">
        <h1 class="text-3xl font-bold mb-6">Edit Product</h1>
        <form action="/product/edit/<?= htmlspecialchars($product['id']) ?>" method="POST" class="bg-white p-6 rounded shadow">
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-semibold mb-2">Category ID</label>
                <input type="number" name="category_id" id="category_id" value="<?= htmlspecialchars($product['category_id']) ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" name="name" id="name" required value="<?= htmlspecialchars($product['name']) ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded px-3 py-2"><?= htmlspecialchars($product['description']) ?></textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-semibold mb-2">Price</label>
                <input type="number" step="0.01" name="price" id="price" required value="<?= htmlspecialchars($product['price']) ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 font-semibold mb-2">Quantity</label>
                <input type="number" name="quantity" id="quantity" required value="<?= htmlspecialchars($product['quantity']) ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="flex justify-between">
                <a href="/product/index" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Update Product</button>
            </div>
        </form>
    </div>
</body>
</html>
