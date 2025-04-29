<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditional Statements</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8">
                <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Conditional Statements</h1>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- IF-ELSE Example -->
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-4 text-blue-800">IF-ELSE Example</h2>
                        <?php
                        $nilai = 80;
                        $color = $nilai >= 75 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                        ?>
                        <div class="mb-4">
                            <p class="font-medium">Nilai: <span class="font-mono <?= $color ?> px-3 py-1 rounded"><?= $nilai ?></span></p>
                        </div>
                        <div class="p-4 <?= $color ?> rounded-lg">
                            <?php if ($nilai >= 75): ?>
                                ✅ <span class="font-bold">Lulus</span> dengan baik
                            <?php else: ?>
                                ❌ <span class="font-bold">Tidak Lulus</span>, perlu remedial
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- SWITCH Example -->
                    <div class="bg-purple-50 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-4 text-purple-800">SWITCH Example</h2>
                        <?php
                        $hari = "Senin";
                        $dayColor = "bg-blue-100 text-blue-800";
                        ?>
                        <div class="mb-4">
                            <p class="font-medium">Hari ini: <span class="font-mono bg-gray-100 px-3 py-1 rounded"><?= $hari ?></span></p>
                        </div>
                        <div class="p-4 <?= $dayColor ?> rounded-lg">
                            <?php switch ($hari):
                                case "Senin": ?>
                                    📅 Hari ini <span class="font-bold">Senin</span>, semangat kerja!
                                    <?php break; ?>
                                <?php case "Selasa": ?>
                                    🌮 Hari ini <span class="font-bold">Selasa</span>, taco Tuesday!
                                    <?php break; ?>
                                <?php default: ?>
                                    🎉 Hari tidak diketahui, tetap semangat!
                            <?php endswitch; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Dynamic Form -->
                <div class="mt-8 bg-yellow-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4 text-yellow-800">Try It Yourself</h2>
                    <form method="get" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Enter a Score</label>
                            <input type="number" name="score" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="0-100">
                        </div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">
                            Check Result
                        </button>
                    </form>
                    
                    <?php if(isset($_GET['score'])): ?>
                        <?php
                        $userScore = intval($_GET['score']);
                        $userColor = $userScore >= 75 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                        ?>
                        <div class="mt-4 p-4 <?= $userColor ?> rounded-lg">
                            <?php if ($userScore >= 75): ?>
                                🎉 Your score <?= $userScore ?> means <span class="font-bold">PASSED</span>!
                            <?php else: ?>
                                😢 Your score <?= $userScore ?> means <span class="font-bold">FAILED</span>.
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>