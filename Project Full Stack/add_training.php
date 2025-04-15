<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Form submit handling
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $duration = $_POST['duration'];

    if (!isset($_SESSION['trainings'])) {
        $_SESSION['trainings'] = [];
    }

    $_SESSION['trainings'][] = [
        'title' => $title,
        'description' => $desc,
        'duration' => $duration
    ];

    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Training | QuadSqaud</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen flex justify-center items-center p-6">

  <form method="POST" class="bg-gray-800 p-8 rounded-2xl shadow-xl w-full max-w-md" onsubmit="return validateForm()">
    <h2 class="text-2xl font-bold mb-6 text-center text-green-400">Add New Training</h2>

    <label class="block mb-2 text-sm font-medium">Training Title</label>
    <input type="text" name="title" id="title" class="w-full px-4 py-2 rounded bg-gray-700 text-white mb-4" placeholder="Enter title">

    <label class="block mb-2 text-sm font-medium">Description</label>
    <textarea name="description" id="description" rows="3" class="w-full px-4 py-2 rounded bg-gray-700 text-white mb-4" placeholder="Short description"></textarea>

    <label class="block mb-2 text-sm font-medium">Duration</label>
    <input type="text" name="duration" id="duration" class="w-full px-4 py-2 rounded bg-gray-700 text-white mb-6" placeholder="e.g., 2 Months">

    <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-blue-500 py-2 rounded text-white font-semibold hover:scale-105 transition-transform">
      Add Training
    </button>
  </form>

  <script>
    function validateForm() {
      const title = document.getElementById("title").value.trim();
      const desc = document.getElementById("description").value.trim();
      const duration = document.getElementById("duration").value.trim();

      if (title === "" || desc === "" || duration === "") {
        alert("Please fill out all fields.");
        return false;
      }
      return true;
    }
  </script>

</body>
</html>
