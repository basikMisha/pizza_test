<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Minfr\PApp\Database\Database;

$db = new Database();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказ пиццы</title>
    <link rel="stylesheet" href="./assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/script.js" ></script>
</head>
<body>
    <div class="container">
    <h1 class="title">Заказ пиццы</h1>
    <form class="form" id="order-form">
        <div class="form-item">
        <label>Тип пиццы:</label>
        <select id="pizza">
            <option value="Пепперони">Пепперони</option>
            <option value="Гавайская">Гавайская</option>
            <option value="Деревенская">Деревенская</option>
            <option value="Грибная">Грибная</option>
        </select>
        </div>

        <div class="form-item">
        <label>Размер:</label>
        <select id="size">
            <option value="21">21 см</option>
            <option value="26">26 см</option>
            <option value="31">31 см</option>
            <option value="45">45 см</option>
        </select>
        </div>

        <div class="form-item">
        <label>Соус:</label>
        <select id="sauce">
            <option value="сырный">Сырный</option>
            <option value="кисло-сладкий">Кисло-сладкий</option>
            <option value="чесночный">Чесночный</option>
            <option value="барбекю">Барбекю</option>
        </select>
        </div>

        <div class="form-item">
        <button type="submit">Заказать</button>
        </div>
    </form>

    <div id="receipt"></div>
    </div>
</body>
</html>

