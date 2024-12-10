<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $answers = $_POST['answers'];

    // Форматування даних
    $timestamp = date("Y-m-d H:i:s");
    $data = "Ім'я: $name\nEmail: $email\nЧас відправки: $timestamp\n";
    $data .= "Оцінка сайту: " . $answers[0] . "\n";
    $data .= "Пропозиції: " . $answers[1] . "\n";

    // Створення папки та збереження у файл
    $filename = "survey/response_" . date("Y-m-d_H-i-s") . ".txt";
    if (!file_exists("survey")) {
        mkdir("survey", 0777, true);
    }
    file_put_contents($filename, $data);

    // Підтвердження
    echo "<h1>Дякуємо за участь!</h1>";
    echo "<p>Ваша відповідь була успішно збережена.</p>";
    echo "<p>Час заповнення форми: $timestamp</p>";
} else {
    echo "<p>Будь ласка, заповніть форму коректно.</p>";
}
?>
