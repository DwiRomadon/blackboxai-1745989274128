<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto max-w-lg">
        <h1 class="text-3xl font-bold mb-6">Edit Customer</h1>
        <form action="/customer/edit/<?= htmlspecialchars($customer['id']) ?>" method="POST" class="bg-white p-6 rounded shadow">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" name="name" id="name" required value="<?= htmlspecialchars($customer['name']) ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($customer['email']) ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone</label>
                <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($customer['phone']) ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-semibold mb-2">Address</label>
                <textarea name="address" id="address" rows="3" class="w-full border border-gray-300 rounded px-3 py-2"><?= htmlspecialchars($customer['address']) ?></textarea>
            </div>
            <div class="flex justify-between">
                <a href="/customer/index" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Update Customer</button>
            </div>
        </form>
    </div>
</body>
</html>
