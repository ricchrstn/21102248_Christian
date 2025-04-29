<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loops in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8">
                <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Looping in PHP</h1>
                
                <div class="grid md:grid-cols-2 gap-8 mb-10">
                    <!-- FOR Loop -->
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-4 text-blue-800">FOR Loop</h2>
                        <div class="space-y-2">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <div class="flex items-center bg-white p-3 rounded-lg shadow-sm">
                                    <span class="w-8 h-8 flex items-center justify-center bg-blue-100 text-blue-800 rounded-full mr-3">
                                        <?= $i ?>
                                    </span>
                                    <span>Angka ke-<?= $i ?></span>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    
                    <!-- WHILE Loop -->
                    <div class="bg-green-50 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-4 text-green-800">WHILE Loop</h2>
                        <div class="space-y-2">
                            <?php
                            $x = 1;
                            while ($x <= 5):
                            ?>
                                <div class="flex items-center bg-white p-3 rounded-lg shadow-sm">
                                    <span class="w-8 h-8 flex items-center justify-center bg-green-100 text-green-800 rounded-full mr-3">
                                        <?= $x ?>
                                    </span>
                                    <span>Iterasi ke-<?= $x ?></span>
                                </div>
                            <?php
                                $x++;
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>
                
                <!-- FOREACH Loop -->
                <div class="bg-purple-50 p-6 rounded-lg mb-10">
                    <h2 class="text-xl font-semibold mb-4 text-purple-800">FOREACH Loop</h2>
                    <?php
                    $buah = ["Apel", "Jeruk", "Mangga", "Pisang", "Strawberry"];
                    ?>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                        <?php foreach ($buah as $b): ?>
                            <div class="bg-white p-4 rounded-lg shadow-sm text-center hover:shadow-md transition">
                                <div class="w-12 h-12 mx-auto mb-2 bg-purple-100 text-purple-800 rounded-full flex items-center justify-center text-xl">
                                    <?= substr($b, 0, 1) ?>
                                </div>
                                <p class="font-medium"><?= $b ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Dynamic Table -->
                <div class="bg-yellow-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4 text-yellow-800">Multiplication Table</h2>
                    <form method="get" class="mb-6 flex gap-2">
                        <input type="number" name="rows" min="1" max="15" class="px-4 py-2 border rounded-lg w-20" placeholder="Rows" value="<?= $_GET['rows'] ?? 5 ?>">
                        <input type="number" name="cols" min="1" max="15" class="px-4 py-2 border rounded-lg w-20" placeholder="Cols" value="<?= $_GET['cols'] ?? 5 ?>">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                            Generate
                        </button>
                    </form>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-lg overflow-hidden">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-3 px-4 text-left">#</th>
                                    <?php
                                    $cols = isset($_GET['cols']) ? intval($_GET['cols']) : 5;
                                    for ($j = 1; $j <= $cols; $j++): ?>
                                        <th class="py-3 px-4 text-center"><?= $j ?></th>
                                    <?php endfor; ?>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <?php
                                $rows = isset($_GET['rows']) ? intval($_GET['rows']) : 5;
                                for ($i = 1; $i <= $rows; $i++): ?>
                                    <tr class="<?= $i % 2 === 0 ? 'bg-gray-50' : 'bg-white' ?>">
                                        <td class="py-3 px-4 font-semibold"><?= $i ?></td>
                                        <?php for ($j = 1; $j <= $cols; $j++): ?>
                                            <td class="py-3 px-4 text-center border-t border-gray-200">
                                                <?= $i * $j ?>
                                            </td>
                                        <?php endfor; ?>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>