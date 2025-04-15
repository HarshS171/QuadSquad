<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Management System | QuadSquad</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .fade-in { animation: fadeIn 1s ease-in; }
        .slide-up { animation: slideUp 0.8s ease-out; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .course-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .course-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen">
    <!-- Navbar -->
    <nav class="bg-gray-950 shadow-md sticky top-0 z-10 fade-in">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-purple-400">QuadSquad<span class="text-green-400">Pro</span></h1>
            <div class="space-x-6 text-sm font-medium">
                <a href="index.php" class="text-purple-300 hover:text-blue-300 transition">Home</a>
                <a href="courses.php" class="text-gray-300 hover:text-purple-300 transition">Courses</a>
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="dashboard.php" class="text-gray-300 hover:text-purple-300 transition">Dashboard</a>
                    <a href="logout.php" class="text-gray-300 hover:text-purple-300 transition">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="text-gray-300 hover:text-purple-300 transition">Login</a>
                    <a href="register.php" class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-4 py-2 rounded-full transition shadow-md">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-purple-700 to-blue-700 py-20 text-center shadow-lg fade-in">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 slide-up">Personalized Training, Smarter Learning</h2>
            <p class="text-lg text-gray-200 mb-6 slide-up">Boost your skills with tailored courses and interactive sessions.</p>
            <a href="register.php" class="bg-white text-purple-800 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-purple-100 transition slide-up">Start Learning Now</a>
        </div>
    </section>

    <!-- Popular Courses -->
    <section class="py-14 px-6">
        <h3 class="text-3xl font-bold text-center text-purple-300 mb-10 fade-in">Popular Courses</h3>
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Course 1 -->
            <div class="course-card bg-gray-700 p-6 rounded-2xl shadow-lg slide-up">
                <div class="bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-xl p-4 mb-4">
                    <h4 class="text-xl font-semibold">Web Development</h4>
                </div>
                <p class="text-gray-300">Master HTML, CSS & JavaScript to build modern websites from scratch.</p>
                <a href="courses.php" class="block mt-4 text-purple-300 font-semibold hover:underline">View Course →</a>
            </div>
            <!-- Course 2 -->
            <div class="course-card bg-gray-700 p-6 rounded-2xl shadow-lg slide-up">
                <div class="bg-gradient-to-r from-pink-500 to-yellow-500 text-white rounded-xl p-4 mb-4">
                    <h4 class="text-xl font-semibold">PHP Basics</h4>
                </div>
                <p class="text-gray-300">Learn PHP and backend fundamentals to build server-side apps.</p>
                <a href="courses.php" class="block mt-4 text-purple-300 font-semibold hover:underline">View Course →</a>
            </div>
            <!-- Course 3 -->
            <div class="course-card bg-gray-700 p-6 rounded-2xl shadow-lg slide-up">
                <div class="bg-gradient-to-r from-green-400 to-teal-500 text-white rounded-xl p-4 mb-4">
                    <h4 class="text-xl font-semibold">JavaScript Essentials</h4>
                </div>
                <p class="text-gray-300">Make your websites dynamic & interactive with JavaScript power.</p>
                <a href="courses.php" class="block mt-4 text-purple-300 font-semibold hover:underline">View Course →</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-6 mt-10 bg-gray-950 text-gray-400 text-sm fade-in">
        © <?= date('Y') ?> QuadSquad. All rights reserved.
    </footer>

</body>
</html>