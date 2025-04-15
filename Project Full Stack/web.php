<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if this page is accessed correctly
if (!isset($_GET['course']) || urldecode($_GET['course']) !== 'Web Development') {
    header("Location: courses.php");
    exit();
}

$courseDetails = [
    'title' => 'Web Development',
    'description' => 'HTML, CSS, JS, PHP basics',
    'color' => 'from-green-500 to-blue-500'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Development | QuadSquad</title>
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
                    <h2 class="text-4xl font-bold text-green-400 mb-4 slide-up">Master Web Development</h2>
                    <p class="text-gray-300 text-lg slide-up"><?= htmlspecialchars($courseDetails['description']) ?></p>
                    <p class="text-gray-400 mt-2 slide-up">Build stunning websites from scratch!</p>
                </div>
<<<<<<< HEAD
                <div class="md:w-1/2 mt-6 md:mt-0">
                    <img src="https://via.placeholder.com/400x300?text=Web+Development+Journey" alt="Web Dev Hero" class="rounded-lg shadow-md w-full transition-transform hover:scale-105">
                </div>
=======
>>>>>>> 9a634a8 (Initial clean commit)
            </div>

            <!-- Course Modules -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- HTML Module -->
                <div class="module-card bg-gradient-to-tr from-green-600 to-teal-600 p-6 rounded-xl shadow-md slide-up">
                    <h3 class="text-2xl font-semibold mb-3">HTML Foundations</h3>
                    <p class="text-gray-200">Structure your web pages with HTML tags and forms.</p>
                    <button onclick="toggleContent('html-content')" class="mt-4 bg-white text-gray-900 px-4 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition">Learn More</button>
                    <div id="html-content" class="mt-4 text-sm text-gray-100 hidden">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Tags: <h1>, <p>, <div></li>
                            <li>Forms with GET/POST methods</li>
                            <li>HTML5 semantic elements</li>
                        </ul>
                    </div>
                </div>

                <!-- CSS Module -->
                <div class="module-card bg-gradient-to-tr from-blue-600 to-cyan-600 p-6 rounded-xl shadow-md slide-up">
                    <h3 class="text-2xl font-semibold mb-3">CSS Mastery</h3>
                    <p class="text-gray-200">Style with CSS Box Model, Selectors, and Grid.</p>
                    <button onclick="toggleContent('css-content')" class="mt-4 bg-white text-gray-900 px-4 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition">Learn More</button>
                    <div id="css-content" class="mt-4 text-sm text-gray-100 hidden">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Box Model: Border, Margin, Padding</li>
                            <li>Selectors: #id, .class</li>
                            <li>Tailwind CSS Grid & Flex layouts</li>
                        </ul>
                    </div>
                </div>

                <!-- JS Module -->
                <div class="module-card bg-gradient-to-tr from-yellow-500 to-orange-500 p-6 rounded-xl shadow-md slide-up">
                    <h3 class="text-2xl font-semibold mb-3">JavaScript Magic</h3>
                    <p class="text-gray-200">Add interactivity with JS variables and events.</p>
                    <button onclick="toggleContent('js-content')" class="mt-4 bg-white text-gray-900 px-4 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition">Learn More</button>
                    <div id="js-content" class="mt-4 text-sm text-gray-100 hidden">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Variables: let, const</li>
                            <li>Control: if, for loops</li>
                            <li>Events: onclick basics</li>
                        </ul>
                    </div>
                </div>

                <!-- PHP Module -->
                <div class="module-card bg-gradient-to-tr from-purple-500 to-pink-500 p-6 rounded-xl shadow-md slide-up">
                    <h3 class="text-2xl font-semibold mb-3">PHP Power</h3>
                    <p class="text-gray-200">Create dynamic sites with PHP basics.</p>
                    <button onclick="toggleContent('php-content')" class="mt-4 bg-white text-gray-900 px-4 py-1 rounded-full text-sm font-medium hover:bg-gray-200 transition">Learn More</button>
                    <div id="php-content" class="mt-4 text-sm text-gray-100 hidden">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Variables & Syntax</li>
                            <li>Forms: GET/POST handling</li>
                            <li>Sessions basics</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- GitHub Section -->
            <div class="mt-10 bg-gradient-to-tr from-teal-500 to-blue-500 p-6 rounded-xl shadow-md fade-in">
                <h3 class="text-2xl font-semibold text-white mb-4">Deploy with GitHub</h3>
                <p class="text-gray-200 mb-4">Host your projects on GitHub repositories!</p>
<<<<<<< HEAD
                <img src="https://via.placeholder.com/600x200?text=GitHub+Repository" alt="GitHub Demo" class="rounded-lg w-full shadow-md transition-transform hover:scale-105">
=======
                <iframe 
                width="560" height="400" src="https://www.youtube.com/embed/Bzwlt3qf1dM" title="YouTube video player" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen 
                class="rounded-lg w-full shadow-md transition-transform hover:scale-105"></iframe>
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