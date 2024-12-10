<?php
$servername = "sql204.infinityfree.com";
$username = "if0_37813250";
$password = "8LXqGUyEEEN";
$dbname = "if0_37813250_survey_db";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Встановлюємо кодування UTF-8 для з'єднання
$conn->set_charset("utf8");
?>
