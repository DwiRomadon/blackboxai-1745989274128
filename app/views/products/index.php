<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Product List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Product List</h1>
        <a href="/product/create" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add New Product</a>
        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Category</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Quantity</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4"><?= htmlspecialchars($product['id']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($product['name']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($product['category_name'] ?? 'Uncategorized') ?></td>
                            <td class="py-3 px-4">$<?= number_format($product['price'], 2) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($product['quantity']) ?></td>
                            <td class="py-3 px-4">
                                <a href="/product/edit/<?= $product['id'] ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                                <a href="/product/delete/<?= $product['id'] ?>" onclick="return confirm('Are you sure?');" class="text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">No products found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
