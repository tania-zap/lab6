<?php
// Підключення до бази даних
include 'db_connect.php'; // Файл з підключенням до бази



// Перевірка, чи були передані дані методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Отримуємо дані з форми
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $answers = $_POST['answers'];

    // Перетворюємо відповіді на строки
    foreach ($answers as $key => $answer) {
        if (is_array($answer)) {
            $answers[$key] = implode(", ", $answer); // Об'єднуємо масив у строку
        } else {
            $answers[$key] = htmlspecialchars($answer); // Очищуємо текстову відповідь
        }
    }

    // Гарантуємо, що відповіді не перевищують кількість колонок у таблиці
    $answer1 = $answers[0] ?? null;
    $answer2 = $answers[1] ?? null;
    $answer3 = $answers[2] ?? null;

    // Підготовка SQL-запиту для вставки даних у таблицю
    $stmt = $conn->prepare("INSERT INTO survey_responses (name, email, answer1, answer2, answer3) 
                            VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Помилка підготовки запиту: " . $conn->error);
    }

    // Прив'язка параметрів
    $stmt->bind_param("sssss", $name, $email, $answer1, $answer2, $answer3);

    // Виконання запиту
    if ($stmt->execute()) {
        echo "<h2>Дякуємо за ваші відповіді!</h2>";
        echo "<p>Дата та час заповнення: " . date("Y-m-d H:i:s") . "</p>";
    } else {
        echo "<h2>Помилка при збереженні даних у базу.</h2>";
        echo "Помилка: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<h2>Помилка: форма не була відправлена.</h2>";
}
?>
