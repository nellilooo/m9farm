<?php

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Viewer</title>
    <link rel="stylesheet" href="client.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Отправка GET-запроса</h1>
    <form id="taskForm">
        <label for="taskId">Введите ID</label>
        <input type="text" id="taskId" required placeholder="Введите ID">
        <button type="submit" id="submitButton">Отправить</button>
    </form>
    <div id="taskCard" class="task-card" style="display: none;"></div>
    <div id="errorMessage" class="error"></div>
    <script src="client.js"></script>
</body>
</html>