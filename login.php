<?php
session_start();

// Вивести значення сесії
echo 'Session ID: ' . session_id() . '<br>';
echo 'Session Status: ' . (isset($_SESSION['is_admin']) ? 'Logged in' : 'Not logged in') . '<br>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === '12345') {
        $_SESSION['is_admin'] = true;
        echo 'Logged in successfully';
        header("Location: admin.php");
        exit();
    } else {
        echo 'Invalid username or password';
    }
}
?>


<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Авторизація</title>
</head>
<body>
    <h1>Вхід для адміністратора</h1>
    <form method="POST" action="login.php">
        <label for="username">Логін:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Увійти</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
