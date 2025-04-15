<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if this page is accessed correctly
if (!isset($_GET['course']) || urldecode($_GET['course']) !== 'Data Structures') {
    header("Location: courses.php");
    exit();
}

$courseDetails = [
    'title' => 'Data Structures',
    'description' => 'Arrays, Linked List, Trees',
    'color' => 'from-blue-500 to-indigo-500'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Structures | QuadSquad</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .fade-in { animation: fadeIn 1s ease-in; }
        .slide-up { animation: slideUp 0.8s ease-out; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .module-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .module-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 min-h-screen text-white">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 shadow-md sticky top-0 z-10">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold"><?= htmlspecialchars($courseDetails['title']) ?></h1>
            <div class="flex items-center space-x-4">
                <span class="text-lg">👋 <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                <a href="courses.php" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded transition">Back to Courses</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto px-4 py-10">
        <section class="bg-gray-800 p-8 rounded-xl shadow-lg fade-in">
            <!-- Hero Section -->
            <div class="flex flex-col md:flex-row items-center justify-between mb-12">
                <div class="md:w-1/2">
                    <h2 class="text-4xl font-bold text-blue-400 mb-4 slide-up">Master Data Structures</h2>
                    <p class="text-gray-300 text-lg slide-up"><?= htmlspecialchars($courseDetails['description']) ?></p>
                    <p class="text-gray-400 mt-2 slide-up">Build efficient algorithms from scratch!</p>
                </div>
<<<<<<< HEAD
                <div class="md:w-1/2 mt-6 md:mt-0">
                    <img src="https://via.placeholder.com/400x300?text=Data+Structures+Journey" alt="DS Hero" class="rounded-lg shadow-md w-full transition-transform hover:scale-105">
                </div>
=======
>>>>>>> 9a634a8 (Initial clean commit)
            </div>

            <!-- Course Modules -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Arrays Module -->
                <div class="module-card bg-gradient-to-tr from-blue-600 to-indigo-600 p-6 rounded-xl shadow-md slide-up">
                    <h3 class="text-2xl font-semibold mb-3">Arrays</h3>
                    <p class="text-gray-200">Store and manage data with arrays in JS and PHP.</p>
                    <button onclick="toggleContent('array-content')" class="mt-4 bg-white text-gray-900 px-4 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition">Learn More</button>
                    <div id="array-content" class="mt-4 text-sm text-gray-100 hidden">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Enumerated Arrays in PHP</li>
                            <li>Associative Arrays</li>
                            <li>JS Array methods</li>
                        </ul>
                    </div>
                </div>

                <!-- Linked List Module -->
                <div class="module-card bg-gradient-to-tr from-indigo-600 to-purple-600 p-6 rounded-xl shadow-md slide-up">
                    <h3 class="text-2xl font-semibold mb-3">Linked Lists</h3>
                    <p class="text-gray-200">Understand dynamic data with linked lists.</p>
                    <button onclick="toggleContent('list-content')" class="mt-4 bg-white text-gray-900 px-4 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition">Learn More</button>
                    <div id="list-content" class="mt-4 text-sm text-gray-100 hidden">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Nodes & Pointers</li>
                            <li>Single Linked List in JS</li>
                            <li>PHP array simulation</li>
                        </ul>
                    </div>
                </div>

                <!-- Trees Module -->
                <div class="module-card bg-gradient-to-tr from-purple-600 to-blue-600 p-6 rounded-xl shadow-md slide-up">
                    <h3 class="text-2xl font-semibold mb-3">Trees</h3>
                    <p class="text-gray-200">Master hierarchical structures with trees.</p>
                    <button onclick="toggleContent('tree-content')" class="mt-4 bg-white text-gray-900 px-4 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition">Learn More</button>
                    <div id="tree-content" class="mt-4 text-sm text-gray-100 hidden">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Binary Trees</li>
                            <li>Tree Traversal</li>
                            <li>PHP multi-dimensional arrays</li>
                        </ul>
                    </div>
                </div>

                <!-- Practice Section -->
                <div class="module-card bg-gradient-to-tr from-cyan-500 to-blue-500 p-6 rounded-xl shadow-md slide-up">
                    <h3 class="text-2xl font-semibold mb-3">Practice</h3>
                    <p class="text-gray-200">Apply DS with coding examples.</p>
                    <button onclick="toggleContent('practice-content')" class="mt-4 bg-white text-gray-900 px-4 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition">Try It</button>
                    <div id="practice-content" class="mt-4 text-sm text-gray-100 hidden">
                        <p>PHP Example:</p>
                        <pre class="bg-gray-900 p-2 rounded">$arr = [1, 2, 3];</pre>
                        <p>JS Example:</p>
                        <pre class="bg-gray-900 p-2 rounded">let list = {val: 1, next: null};</pre>
                    </div>
                </div>
            </div>

            <!-- Visual Demo -->
            <div class="mt-10 bg-gradient-to-tr from-blue-500 to-indigo-500 p-6 rounded-xl shadow-md fade-in">
                <h3 class="text-2xl font-semibold text-white mb-4">Visualize Data Structures</h3>
                <p class="text-gray-200 mb-4">See how arrays, lists, and trees work!</p>
<<<<<<< HEAD
                <img src="https://via.placeholder.com/600x200?text=DS+Visualization" alt="DS Demo" class="rounded-lg w-full shadow-md transition-transform hover:scale-105">
=======
                <iframe 
                    width="560" 
                    height="400" 
                    src="https://www.youtube.com/embed/ouipSd_5ivQ" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen 
                    class="rounded-lg w-full shadow-md transition-transform hover:scale-105">
                </iframe>
>>>>>>> 9a634a8 (Initial clean commit)
            </div>
        </section>
    </main>

    <!-- JavaScript for Toggle -->
    <script>
        function toggleContent(id) {
            const content = document.getElementById(id);
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                content.classList.add('fade-in');
            } else {
                content.classList.add('hidden');
                content.classList.remove('fade-in');
            }
        }
    </script>
</body>
</html>