<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Опитування</title>
</head>
<body>
    <h2>Опитування</h2>
    <form id="survey-form" method="POST" action="save_response.php">
        <label for="name">Ваше ім'я:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Ваш email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <p>Оцініть корисність сайту:</p>
        <input type="radio" id="useful" name="answers[0]" value="Дуже корисний" required>
        <label for="useful">Дуже корисний</label><br>
        <input type="radio" id="average" name="answers[0]" value="Середній">
        <label for="average">Середній</label><br>
        <input type="radio" id="poor" name="answers[0]" value="Малокорисний">
        <label for="poor">Малокорисний</label><br><br>

        <label for="suggestions">Ваші пропозиції:</label><br>
        <textarea id="suggestions" name="answers[1]" rows="4"></textarea><br><br>

        <button type="submit">Надіслати</button>
    </form>
</body>
</html>
