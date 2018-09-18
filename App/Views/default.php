<!--
Тестовые параметры:
?url=https://www.auchan.ru/pokupki/xiaomi-note-4-3-32gb-ser-5-5.html&tag=title
?url=https%3A%2F%2Fwww.escc.ru%2Fkatalog%2Fproducts%2Finostrannye-jazyki%2Fanglijskij-dlja-nachinajuschih-extra&tag=p&selector=catalog-course__price-top
?url=https%3A%2F%2Fwww.ural-auto.ru%2Fshop%2Facoustic%2Facoustic-coaxial%2Fas-c1347%2F&tag=div&selector=price
-->
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Parser</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<div class="content">
    <div class="panel">
        <div class="panel-header"></div>
        <div class="panel-body">
            <form method="GET">
                <label for="url">Введите URL:</label>
                <input type="text" name="url" id="url" value="<?= $_GET['url'] ?>" required>
                <label for="url">Введите тег:</label>
                <input type="text" name="tag" id="tag" value="<?= isset($_GET['tag']) ? $_GET['tag'] : null ?>"
                       required>
                <label for="url">Введите селектор (id вводите через #):</label>
                <input type="text" name="selector" id="selector"
                       value="<?= isset($_GET['selector']) ? $_GET['selector'] : null ?>" required>
                <button id="submit">Найти цену</button>
            </form>
        </div>
    </div>
    <?php if ($data): ?>
        <div class="panel">
            <div class="panel-header"></div>
            <div class="panel-body">
                <p>
                    <?php foreach ($data['data'] as $price): ?>
                    <?php
                        $price = priceExploder($price);
                        foreach ($price as $p): ?>
                        <p>Цена: <?= $p['price'] ?> <?= $p['currency'] ?></p>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </p>
            </div>
        </div>
    <?php endif; ?>

</div>
</body>
</html>


