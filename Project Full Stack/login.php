<?php
session_start();

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if ($username === "admin" && $password === "1234") {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - TrainSmart</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen flex items-center justify-center">

  <div class="bg-gray-800 p-8 rounded-xl shadow-xl w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-purple-400 mb-6">Login</h2>
    
    <?php if ($error): ?>
      <div class="bg-red-600 text-white p-2 mb-4 rounded text-sm">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form action="login.php" method="POST" class="space-y-4">
      <div>
        <label class="block mb-1 text-sm text-gray-300">Username</label>
        <input type="text" name="username" required class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" />
      </div>
      <div>
        <label class="block mb-1 text-sm text-gray-300">Password</label>
        <input type="password" name="password" required class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" />
      </div>
      <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-blue-600 py-2 rounded text-white font-semibold hover:from-purple-700 hover:to-blue-700 transition">
        Login
      </button>
    </form>

    <p class="text-center text-sm text-gray-400 mt-4">Don't have an account? <a href="register.php" class="text-purple-300 hover:underline">Register here</a></p>
  </div>

</body>
</html>
