<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sale Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto max-w-3xl">
        <h1 class="text-3xl font-bold mb-6">Sale Details</h1>
        <div class="bg-white p-6 rounded shadow mb-6">
            <p><strong>Sale ID:</strong> <?= htmlspecialchars($sale['id']) ?></p>
            <p><strong>Customer:</strong> <?= htmlspecialchars($sale['customer_id'] ? $sale['customer_id'] : 'Walk-in') ?></p>
            <p><strong>Total:</strong> $<?= number_format($sale['total'], 2) ?></p>
            <p><strong>Sale Date:</strong> <?= htmlspecialchars($sale['sale_date']) ?></p>
        </div>
        <h2 class="text-2xl font-semibold mb-4">Items</h2>
        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Product</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Quantity</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4"><?= htmlspecialchars($item['product_name']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($item['quantity']) ?></td>
                        <td class="py-3 px-4">$<?= number_format($item['price'], 2) ?></td>
                        <td class="py-3 px-4">$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mt-6">
            <a href="/sale/index" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back to Sales</a>
        </div>
    </div>
</body>
</html>
