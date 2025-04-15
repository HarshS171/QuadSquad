<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Predefined courses to validate against (for security)
$courses = [
    'Web Development' => ['desc' => 'HTML, CSS, JS, PHP basics', 'duration' => '3 Months'],
    'Data Structures' => ['desc' => 'Arrays, Linked List, Trees', 'duration' => '2 Months'],
    'Database Management' => ['desc' => 'MySQL, ER Diagrams, Normalization', 'duration' => '1 Month'],
    'Operating Systems' => ['desc' => 'Process, Memory, File Systems', 'duration' => '2 Months'],
    'Networking Fundamentals' => ['desc' => 'OSI, TCP/IP, IP addressing', 'duration' => '1.5 Months'],
    'Object Oriented Programming' => ['desc' => 'Classes, Objects, Inheritance', 'duration' => '2 Months']
];

// Handle course enrollment
if (isset($_GET['course'])) {
    $course = urldecode($_GET['course']);
    
    // Validate if the course exists in our predefined list
    if (array_key_exists($course, $courses)) {
        // Initialize enrolled_courses if not set
        if (!isset($_SESSION['enrolled_courses'])) {
            $_SESSION['enrolled_courses'] = [];
        }

        // Enroll only if not already enrolled
        if (!in_array($course, $_SESSION['enrolled_courses'])) {
            $_SESSION['enrolled_courses'][] = $course;
            $_SESSION['success_message'] = "Successfully enrolled in " . htmlspecialchars($course) . "!";
        } else {
            $_SESSION['error_message'] = "You are already enrolled in " . htmlspecialchars($course) . ".";
        }
    } else {
        $_SESSION['error_message'] = "Invalid course selected.";
    }
} else {
    $_SESSION['error_message'] = "No course specified for enrollment.";
}

// Redirect back to dashboard
header("Location: dashboard.php");
exit();
?>
