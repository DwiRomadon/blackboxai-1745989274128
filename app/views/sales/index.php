<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sales List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Sales List</h1>
        <a href="/sale/create" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add New Sale</a>
        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Customer</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Total</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Sale Date</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sales)): ?>
                    <?php foreach ($sales as $sale): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4"><?= htmlspecialchars($sale['id']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($sale['customer_name'] ?? 'Walk-in') ?></td>
                            <td class="py-3 px-4">$<?= number_format($sale['total'], 2) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($sale['sale_date']) ?></td>
                            <td class="py-3 px-4">
                                <a href="/sale/view/<?= $sale['id'] ?>" class="text-green-600 hover:underline mr-2">View</a>
                                <a href="/sale/delete/<?= $sale['id'] ?>" onclick="return confirm('Are you sure?');" class="text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center py-4">No sales found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
