<?php
session_start();

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if ($name && $email && $password) {
        // Session mein save kar rahe hain abhi, DB baad mein
        $_SESSION['username'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password; // Temporary, DB mein hash hoga

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - TrainSmart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen flex items-center justify-center">
    <div class="bg-gray-800 p-8 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-blue-400 mb-6">Create Account</h2>

        <?php if ($error): ?>
            <div class="bg-red-600 text-white p-2 mb-4 rounded text-sm"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block mb-1 text-sm text-gray-300">Full Name</label>
                <input type="text" name="name" required class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <div>
                <label class="block mb-1 text-sm text-gray-300">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <div>
                <label class="block mb-1 text-sm text-gray-300">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 py-2 rounded text-white font-semibold hover:from-blue-700 hover:to-purple-700 transition">
                Register
            </button>
        </form>

        <p class="text-center text-sm text-gray-400 mt-4">Already have an account? 
            <a href="login.php" class="text-blue-300 hover:underline">Login here</a>
        </p>
    </div>
</body>
</html>