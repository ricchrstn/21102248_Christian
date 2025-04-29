<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Arrays</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8">
                <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Working with Arrays</h1>
                
                <!-- Indexed Array -->
                <div class="mb-12">
                    <h2 class="text-2xl font-semibold mb-6 text-blue-700 border-b pb-2">Indexed Array</h2>
                    <?php
                    $hewan = ["Kucing", "Anjing", "Burung", "Kelinci", "Ikan"];
                    ?>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                        <?php foreach ($hewan as $index => $h): ?>
                            <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition text-center">
                                <div class="w-12 h-12 mx-auto mb-3 bg-blue-100 text-blue-800 rounded-full flex items-center justify-center text-xl">
                                    <i class="fas fa-paw"></i>
                                </div>
                                <h3 class="font-semibold"><?= $h ?></h3>
                                <p class="text-sm text-gray-500 mt-1">Index: <?= $index ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Associative Array -->
                <div class="mb-12">
                    <h2 class="text-2xl font-semibold mb-6 text-green-700 border-b pb-2">Associative Array</h2>
                    <?php
                    $mahasiswa = [
                        "nama" => "Mbak F",
                        "umur" => 22,
                        "prodi" => "Teknik Informatika",
                        "semester" => 6,
                        "ipk" => 3.75
                    ];
                    ?>
                    <div class="bg-green-50 rounded-lg p-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-lg font-medium mb-3 text-green-800">Data Mahasiswa:</h3>
                                <ul class="space-y-2">
                                    <?php foreach ($mahasiswa as $key => $value): ?>
                                        <li class="flex">
                                            <span class="font-semibold text-green-700 w-24 capitalize"><?= $key ?>:</span>
                                            <span class="flex-1">
                                                <?php if (is_numeric($value)): ?>
                                                    <span class="font-mono bg-green-100 text-green-800 px-2 py-1 rounded">
                                                        <?= $value ?>
                                                    </span>
                                                <?php else: ?>
                                                    <?= $value ?>
                                                <?php endif; ?>
                                            </span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="bg-white p-4 rounded-lg border border-green-200">
                                <h3 class="text-lg font-medium mb-3 text-green-800">Combined Output:</h3>
                                <p class="text-gray-700">
                                    <?= $mahasiswa['nama'] ?>, <?= $mahasiswa['umur'] ?> tahun, 
                                    mahasiswa <?= $mahasiswa['prodi'] ?> semester <?= $mahasiswa['semester'] ?> 
                                    dengan IPK <?= $mahasiswa['ipk'] ?>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Multidimensional Array -->
                <div>
                    <h2 class="text-2xl font-semibold mb-6 text-purple-700 border-b pb-2">Multidimensional Array</h2>
                    <?php
                    $students = [
                        [
                            "name" => "Febrilia",
                            "age" => 22,
                            "grades" => [85, 90, 88]
                        ],
                        [
                            "name" => "Budi",
                            "age" => 21,
                            "grades" => [78, 82, 80]
                        ],
                        [
                            "name" => "Ani",
                            "age" => 23,
                            "grades" => [90, 92, 95]
                        ]
                    ];
                    ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded-lg overflow-hidden">
                            <thead class="bg-purple-800 text-white">
                                <tr>
                                    <th class="py-3 px-4 text-left">No</th>
                                    <th class="py-3 px-4 text-left">Name</th>
                                    <th class="py-3 px-4 text-left">Age</th>
                                    <th class="py-3 px-4 text-left">Grades</th>
                                    <th class="py-3 px-4 text-left">Average</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <?php foreach ($students as $i => $student): ?>
                                    <tr class="<?= $i % 2 === 0 ? 'bg-white' : 'bg-purple-50' ?>">
                                        <td class="py-3 px-4"><?= $i + 1 ?></td>
                                        <td class="py-3 px-4 font-semibold"><?= $student['name'] ?></td>
                                        <td class="py-3 px-4"><?= $student['age'] ?></td>
                                        <td class="py-3 px-4">
                                            <div class="flex gap-2">
                                                <?php foreach ($student['grades'] as $grade): ?>
                                                    <span class="px-2 py-1 rounded text-sm <?= $grade >= 85 ? 'bg-green-100 text-green-800' : ($grade >= 75 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') ?>">
                                                        <?= $grade ?>
                                                    </span>
                                                <?php endforeach; ?>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 font-semibold">
                                            <?php
                                            $average = array_sum($student['grades']) / count($student['grades']);
                                            echo number_format($average, 2);
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>