<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto max-w-lg">
        <h1 class="text-3xl font-bold mb-6">Edit Category</h1>
        <form action="/category/edit/<?= htmlspecialchars($category['id']) ?>" method="POST" class="bg-white p-6 rounded shadow">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" name="name" id="name" required value="<?= htmlspecialchars($category['name']) ?>" class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="flex justify-between">
                <a href="/category/index" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Update Category</button>
            </div>
        </form>
    </div>
</body>
</html>
