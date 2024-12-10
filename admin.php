<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Адмінська панель</title>
</head>
<body>
    <h1>Адмінська панель</h1>
    <p>Тут ви можете переглядати всі відповіді на опитування:</p>

    <?php
    session_start();
    require 'db_connect.php';

    // Перевірка доступу до панелі адміністратора
    if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
        die("Access denied");
    }

    // Запит для отримання всіх відповідей
    $sql = "SELECT id, name, email, answer1, answer2, answer3, timestamp FROM survey_responses ORDER BY timestamp DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Ім'я</th>
                <th>Email</th>
                <th>Відповідь 1</th>
                <th>Відповідь 2</th>
                <th>Відповідь 3</th>
                <th>Дата</th>
                <th>Дії</th>
              </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['answer1']) . "</td>";
            echo "<td>" . htmlspecialchars($row['answer2']) . "</td>";
            echo "<td>" . htmlspecialchars($row['answer3']) . "</td>";
            echo "<td>" . htmlspecialchars($row['timestamp']) . "</td>";
            echo "<td>
                    <a href='export.php?id=" . $row['id'] . "'>Експорт</a> |
                    <a href='delete.php?id=" . $row['id'] . "'>Видалити</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Немає відповідей для відображення.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
