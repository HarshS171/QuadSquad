<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['course']) || urldecode($_GET['course']) !== 'Database Management') {
    header("Location: courses.php");
    exit();
}

$courseDetails = [
    'title' => 'Database Management',
    'description' => 'MySQL, ER Diagrams, Normalization',
    'color' => 'from-purple-500 to-pink-500'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Management | QuadSquad</title>
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
    <header class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 shadow-md sticky top-0 z-10">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold"><?= htmlspecialchars($courseDetails['title']) ?></h1>
            <div class="flex items-center space-x-4">
                <span class="text-lg">👋 <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                <a href="courses.php" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded transition">Back to Courses</a>
            </div>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-10">
        <section class="bg-gray-800 p-8 rounded-xl shadow-lg fade-in">
            <div class="flex flex-col md:flex-row items-center justify-between mb-12">
                <div class="md:w-1/2">
                    <h2 class="text-4xl font-bold text-purple-400 mb-4 slide-up">Master Database Management</h2>
                    <p class="text-gray-300 text-lg slide-up"><?= htmlspecialchars($courseDetails['description']) ?></p>
                    <p class="text-gray-400 mt-2 slide-up">Organize data like a pro!</p>
                </div>
<<<<<<< HEAD
                <div class="md:w-1/2 mt-6 md:mt-0">
                    <img src="https://via.placeholder.com/400x300?text=Database+Journey" alt="DB Hero" class="rounded-lg shadow-md w-full transition-transform hover:scale-105">
                </div>
=======
>>>>>>> 9a634a8 (Initial clean commit)
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="module-card bg-gradient-to-tr from-purple-600 to-pink-600 p-6 rounded-xl shadow-md slide-up">
                    <h3 class="text-2xl font-semibold mb-3">MySQL Basics</h3>
                    <p class="text-gray-200">Learn SQL queries and database setup.</p>
                    <button onclick="toggleContent('mysql-content')" class="mt-4 bg-white text-gray-900 px-4 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition">Learn More</button>
                    <div id="mysql-content" class="mt-4 text-sm text-gray-100 hidden">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>CREATE, INSERT, SELECT</li>
                            <li>PHP MySQL integration</li>
                            <li>XAMPP setup</li>
                        </ul>
                    </div>
                </div>

                <div class="module-card bg-gradient-to-tr from-pink-600 to-purple-600 p-6 rounded-xl shadow-md slide-up">
                    <h3 class="text-2xl font-semibold mb-3">ER Diagrams</h3>
                    <p class="text-gray-200">Design database relationships.</p>
                    <button onclick="toggleContent('er-content')" class="mt-4 bg-white text-gray-900 px-4 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition">Learn More</button>
                    <div id="er-content" class="mt-4 text-sm text-gray-100 hidden">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Entities & Attributes</li>
                            <li>Relationships</li>
                            <li>Diagram tools</li>
                        </ul>
                    </div>
                </div>

                <div class="module-card bg-gradient-to-tr from-purple-500 to-indigo-500 p-6 rounded-xl shadow-md slide-up">
                    <h3 class="text-2xl font-semibold mb-3">Normalization</h3>
                    <p class="text-gray-200">Optimize database structure.</p>
                    <button onclick="toggleContent('norm-content')" class="mt-4 bg-white text-gray-900 px-4 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition">Learn More</button>
                    <div id="norm-content" class="mt-4 text-sm text-gray-100 hidden">
                        <ul class=" reactedlist-disc pl-5 space-y-1">
                            <li>1NF, 2NF, 3NF</li>
                            <li>Reduce redundancy</li>
                            <li>PHP examples</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-10 bg-gradient-to-tr from-purple-500 to-pink-500 p-6 rounded-xl shadow-md fade-in">
                <h3 class="text-2xl font-semibold text-white mb-4">Visualize Databases</h3>
                <p class="text-gray-200 mb-4">See how data is structured and queried!</p>
<<<<<<< HEAD
                <img src="https://via.placeholder.com/600x200?text=DB+Visualization" alt="DB Demo" class="rounded-lg w-full shadow-md transition-transform hover:scale-105">
=======
                <iframe 
                    width="560" 
                    height="400" 
                    src="https://www.youtube.com/embed/5OdVJbNCSso" 
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