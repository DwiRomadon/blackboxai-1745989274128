<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Customer List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Customer List</h1>
        <a href="/customer/create" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add New Customer</a>
        <table class="min-w-full bg-white rounded shadow overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Address</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($customers)): ?>
                    <?php foreach ($customers as $customer): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4"><?= htmlspecialchars($customer['id']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($customer['name']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($customer['email']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($customer['phone']) ?></td>
                            <td class="py-3 px-4"><?= htmlspecialchars($customer['address']) ?></td>
                            <td class="py-3 px-4">
                                <a href="/customer/edit/<?= $customer['id'] ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                                <a href="/customer/delete/<?= $customer['id'] ?>" onclick="return confirm('Are you sure?');" class="text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">No customers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
