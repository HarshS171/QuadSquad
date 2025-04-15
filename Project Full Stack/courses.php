<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Predefined courses with syllabus-based content
$allCourses = [
    'Web Development' => [
        'description' => 'HTML, CSS, JS, PHP basics',
        'color' => 'from-green-500 to-blue-500',
        'content' => 'Learn fundamentals of HTML, CSS styling (Box Model, Selectors), JavaScript basics, and PHP essentials.'
    ],
    'Data Structures' => [
        'description' => 'Arrays, Linked List, Trees',
        'color' => 'from-blue-500 to-indigo-500',
        'content' => 'Understand Arrays, Linked Lists, and Tree structures using JavaScript and PHP arrays.'
    ],
    'Database Management' => [
        'description' => 'MySQL, ER Diagrams, Normalization',
        'color' => 'from-purple-500 to-pink-500',
        'content' => 'Introduction to MySQL, ER Diagrams, and Normalization with PHP integration.'
    ],
    'Operating Systems' => [
        'description' => 'Process, Memory, File Systems',
        'color' => 'from-teal-500 to-cyan-500',
        'content' => 'Basics of processes, memory management, and file systems with PHP examples.'
    ],
    'Networking Fundamentals' => [
        'description' => 'OSI, TCP/IP, IP addressing',
        'color' => 'from-yellow-500 to-orange-500',
        'content' => 'Learn OSI model, TCP/IP, and IP addressing fundamentals.'
    ],
    'Object Oriented Programming' => [
        'description' => 'Classes, Objects, Inheritance',
        'color' => 'from-pink-500 to-red-500',
        'content' => 'Master PHP OOP concepts like Classes, Objects, and Inheritance.'
    ]
];

// Get only enrolled courses
$enrolledCourses = $_SESSION['enrolled_courses'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses | QuadSquad</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .course-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .course-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 min-h-screen text-white">
    <!-- Navbar -->
    <header class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 shadow-md sticky top-0 z-10">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">My Enrolled Courses</h1>
            <div class="flex items-center space-x-4">
                <span class="text-lg">👋 <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                <a href="dashboard.php" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded transition">Back to Dashboard</a>
            </div>
        </div>
    </header>

    <!-- Enrolled Courses Section -->
    <main class="max-w-6xl mx-auto px-4 py-10">
        <?php if (count($enrolledCourses) > 0): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($enrolledCourses as $course): ?>
                    <!-- Course-specific links -->
                    <?php
                    $coursePage = 'course.php'; // Default fallback
                    switch ($course) {
                        case 'Web Development':
                            $coursePage = 'Web.php';
                            break;
                        case 'Data Structures':
                            $coursePage = 'ds.php';
                            break;
                        case 'Database Management':
                            $coursePage = 'dm.php';
                            break;
                        case 'Operating Systems':
                            $coursePage = 'os.php';
                            break;
                        case 'Networking Fundamentals':
                            $coursePage = 'net.php';
                            break;
                        case 'Object Oriented Programming':
                            $coursePage = 'oop.php';
                            break;
                    }
                    ?>
                    <a href="<?= $coursePage ?>?course=<?= urlencode($course) ?>" 
                       class="course-card block bg-gradient-to-tr <?= $allCourses[$course]['color'] ?? 'from-gray-500 to-gray-700' ?> p-6 rounded-2xl shadow-lg">
                        <h2 class="text-xl font-semibold mb-2"><?= htmlspecialchars($course) ?></h2>
                        <p class="text-sm text-gray-100"><?= htmlspecialchars($allCourses[$course]['description'] ?? 'No description available') ?></p>
                        <span class="inline-block mt-4 bg-white text-gray-900 px-3 py-1 rounded-full text-sm font-medium">Explore Now</span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-20">
                <p class="text-2xl text-gray-400 mb-4">You haven’t enrolled in any courses yet.</p>
                <a href="dashboard.php" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition">Enroll in a Course</a>
            </div>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 text-center py-4">
        <p>© <?= date('Y') ?> QuadSquad. All rights reserved.</p>
    </footer>
</body>
</html>