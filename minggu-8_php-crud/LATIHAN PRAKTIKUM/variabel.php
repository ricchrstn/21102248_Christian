<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">PHP Variables</h1>
            
            <div class="space-y-6">
                <?php
                $nama = "Mbak F";
                $umur = 22;
                $skills = ["PHP", "HTML", "CSS", "JavaScript"];
                ?>
                
                <div class="p-6 bg-blue-50 rounded-lg">
                    <h2 class="text-xl font-semibold mb-2">String Variable</h2>
                    <p class="text-gray-700">Nama: <span class="font-mono bg-blue-100 px-2 py-1 rounded"><?= $nama ?></span></p>
                </div>
                
                <div class="p-6 bg-green-50 rounded-lg">
                    <h2 class="text-xl font-semibold mb-2">Number Variable</h2>
                    <p class="text-gray-700">Umur: <span class="font-mono bg-green-100 px-2 py-1 rounded"><?= $umur ?></span> tahun</p>
                </div>
                
                <div class="p-6 bg-purple-50 rounded-lg">
                    <h2 class="text-xl font-semibold mb-2">Array Variable</h2>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <?php foreach($skills as $skill): ?>
                            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">
                                <?= $skill ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="p-6 bg-yellow-50 rounded-lg">
                    <h2 class="text-xl font-semibold mb-2">Combined Output</h2>
                    <p class="text-gray-700">
                        Halo, nama saya <span class="font-bold"><?= $nama ?></span> dan saya berumur 
                        <span class="font-bold"><?= $umur ?></span> tahun dengan skill:
                        <?= implode(", ", $skills) ?>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>