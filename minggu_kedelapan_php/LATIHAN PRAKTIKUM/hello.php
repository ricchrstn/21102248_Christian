<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-md w-full text-center transform transition-all hover:scale-105">
        <div class="text-6xl mb-6">👋</div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4"><?php echo "Hello, PHP!"; ?></h1>
        <p class="text-gray-600 mb-6">Welcome to your first PHP application</p>
        <a href="login.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300 inline-block">
            Go to Login
        </a>
    </div>
</body>
</html>