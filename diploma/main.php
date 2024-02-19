<?php
session_start();

$db = new PDO("mysql:host=localhost; dbname=vel", "root", "");
$info = [];

if ($query = $db->query("SELECT * FROM `products`")) {
  $info['products'] = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
  print_r($db->errorInfo());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Diploma</title>
</head>
<body>

    <div class="top_cap">

        <div class="links_reg">
            <a class="reg" href="login.php">Вход</a>
            <hr>
            <a class="log" href="registration.php">Регистрация</a>
        </div>
    </div>

    <div>
        <div class="flex-header">

        <a href="/ИС-4 Ханахян А.А/diploma/main.php" ><img class="logotip" src="uploads/Logotip.png" alt="Логотип"></a>
            <div class="call_times">
                <p class="phon">+7(918)954-41-21</p>
                <p class="priem">Прием звонков: 10:00-20:00</p>
            </div>

            <div class="containere">
                <form action="search.php" method="GET">
                    <input class="search" type="text" name="query" placeholder="Поиск товаров">
                    <button class="button_search" type="submit">Найти</button>
                </form>
            </div>
            <a href="#" class="icon-link"><img class="icon" src="uploads/cart.png" alt="Иконка"></a>
            <a href="#" class="icon-link"><img class="icon" src="uploads/сердце.png" alt="Иконка"></a>
        </div>
    
    </div>

    <div class="nav_bar">
            <a href="#" class="hover-effect">Каталог</a>
            <a href="#" class="hover-effect">Аренда</a>
            <a href="/ИС-4 Ханахян А.А/diploma/about Us.php" class="hover-effect">О нас</a>
            <a href="#" class="hover-effect">Кантакты</a>
    </div>



    <div class="slider-containere">
  <div class="slides">
    <div class="slide"><img class="slad" src="uploads/Вел1.jpg" alt=""></div>
    <div class="slide"><img class="slad" src="uploads/Вел2.jpg" alt=""></div>
    <div class="slide"><img class="slad" src="uploads/Вел6.jpg" alt=""></div>
    <!-- Добавьте дополнительные слайды по необходимости -->
  </div>
  <button class="prev">&#10094;</button>
  <button class="next">&#10095;</button>
</div>


<h3 class="xit">Хиты</h3>
<?php
if ($query = $db->query("SELECT * FROM `products`")) {
    $setsInfo = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    print_r($db->errorInfo());
}
?>
<div class="container_xit">
<?php foreach ($setsInfo as $data): ?>
<div class="cards">
            <form method="post" action="">
                <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                <input type="hidden" name="product_name" value="<?= $data['name'] ?>">
                <input type="hidden" name="product_price" value="<?= $data['price'] ?>">
                <ul class="product-list">
                    <li class="product-item">
                        <img class="imgs" src="./uploads/<?= $data['img']; ?>">
                </li>
                <li class="product-item">
                <h3 class="sushi_name"><?= $data['name']; ?></h3>
                <h3 class="price"><?= $data['price']; ?></h3>
                </li>
                </li>
                <li class="product-item">
                <input class="input" type="number" name="quantity" value="1" min="1">
                <button class="butt" type="submit" name="add_to_cart">Добавить в корзину</button>
                </li>
                </ul>
            </form>
        </div>
        <?php endforeach; ?>
</div>




















<script>
const slides = document.querySelectorAll('.slide');
let currentSlide = 0;

function showSlide(index) {
  if (index < 0) {
    currentSlide = slides.length - 1;
  } else if (index >= slides.length) {
    currentSlide = 0;
  } else {
    currentSlide = index;
  }

  slides.forEach((slide, index) => {
    if (index === currentSlide) {
      slide.style.display = 'block';
    } else {
      slide.style.display = 'none';
    }
  });
}

function nextSlide() {
  showSlide(currentSlide + 1);
}

function prevSlide() {
  showSlide(currentSlide - 1);
}

document.querySelector('.next').addEventListener('click', nextSlide);
document.querySelector('.prev').addEventListener('click', prevSlide);

setInterval(nextSlide, 3000); // Автоматическое перелистывание каждые 5 секунд

showSlide(currentSlide);

    </script>
</body>
</html>