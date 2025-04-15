<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Static course list
$courses = [
    'Web Development' => ['desc' => 'HTML, CSS, JS, PHP basics', 'duration' => '3 Months', 'color' => 'green-400'],
    'Data Structures' => ['desc' => 'Arrays, Linked List, Trees', 'duration' => '2 Months', 'color' => 'blue-400'],
    'Database Management' => ['desc' => 'MySQL, ER Diagrams, Normalization', 'duration' => '1 Month', 'color' => 'purple-400'],
    'Operating Systems' => ['desc' => 'Process, Memory, File Systems', 'duration' => '2 Months', 'color' => 'teal-400'],
    'Networking Fundamentals' => ['desc' => 'OSI, TCP/IP, IP addressing', 'duration' => '1.5 Months', 'color' => 'yellow-400'],
    'Object Oriented Programming' => ['desc' => 'Classes, Objects, Inheritance', 'duration' => '2 Months', 'color' => 'pink-400']
];

// Initialize enrolled_courses if not set
if (!isset($_SESSION['enrolled_courses'])) {
    $_SESSION['enrolled_courses'] = [];
}

// Handle enrollment
if (isset($_GET['enroll'])) {
    $courseToEnroll = $_GET['enroll'];
    if (array_key_exists($courseToEnroll, $courses) && !in_array($courseToEnroll, $_SESSION['enrolled_courses'])) {
        $_SESSION['enrolled_courses'][] = $courseToEnroll;
    }
    header("Location: dashboard.php");
    exit;
}

// Training delete
if (isset($_GET['delete'])) {
    $deleteIndex = $_GET['delete'];
    unset($_SESSION['trainings'][$deleteIndex]);
    $_SESSION['trainings'] = array_values($_SESSION['trainings']);
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | QuadSquad</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen">
    <header class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">QuadSquad</h1>
            <div class="flex items-center space-x-4">
                <span class="text-lg">👋 Hello, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                <a href="logout.php" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700 transition">Logout</a>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-semibold">Your Trainings</h2>
            <a href="add_training.php" class="bg-gradient-to-r from-green-400 to-blue-500 px-5 py-2 rounded text-white font-medium shadow hover:scale-105 transition-transform">+ Add Training</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // Display static courses with enroll button
            foreach ($courses as $title => $details) {
                $isEnrolled = in_array($title, $_SESSION['enrolled_courses']);
                echo "
                    <div class='bg-gray-800 p-6 rounded-xl shadow-md border border-gray-700 hover:shadow-xl transition relative group'>
                        <h3 class='text-xl font-semibold text-{$details['color']}'>" . htmlspecialchars($title) . "</h3>
                        <p class='text-gray-300 mt-2'>" . htmlspecialchars($details['desc']) . "</p>
                        <p class='text-sm text-gray-400 mt-1'>Duration: {$details['duration']}</p>
                        <a href='dashboard.php?enroll=" . urlencode($title) . "' 
                           class='mt-4 inline-block bg-" . ($isEnrolled ? 'gray-600' : 'blue-500') . " hover:bg-" . ($isEnrolled ? 'gray-700' : 'blue-600') . " text-white px-4 py-1 rounded text-sm transition " . ($isEnrolled ? 'cursor-not-allowed' : '') . "'
                           " . ($isEnrolled ? 'disabled' : '') . ">
                            " . ($isEnrolled ? 'Enrolled' : 'Enroll Now') . "
                        </a>
                    </div>";
            }

            // Display user-added trainings
            if (isset($_SESSION['trainings']) && count($_SESSION['trainings']) > 0) {
                foreach ($_SESSION['trainings'] as $index => $training) {
                    echo "
                        <div class='bg-gray-800 p-6 rounded-xl shadow-md border border-gray-700 hover:shadow-xl transition relative group'>
                            <h3 class='text-xl font-semibold text-green-300'>" . htmlspecialchars($training['title']) . "</h3>
                            <p class='text-gray-300 mt-2'>" . htmlspecialchars($training['description']) . "</p>
                            <p class='text-sm text-gray-400 mt-1'>Duration: " . htmlspecialchars($training['duration']) . "</p>
                            <div class='absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity'>
                                <a href='edit_training.php?index=$index' class='text-yellow-400 hover:underline mr-2'>Edit</a>
                                <a href='dashboard.php?delete=$index' class='text-red-500 hover:underline' onclick='return confirm(\"Are you sure to delete this training?\");'>Delete</a>
                            </div>
                        </div>";
                }
            }
            ?>
        </div>

        <?php if (empty($_SESSION['trainings']) && count($courses) == 0): ?>
            <p class="text-gray-400 text-lg text-center mt-6">No trainings added yet. Click on "Add Training" to start.</p>
        <?php endif; ?>
    </main>

    <div class="text-center mt-10 pb-10">
        <a href="courses.php" class="bg-blue-500 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-lg">View My Courses</a>
    </div>
</body>
</html>