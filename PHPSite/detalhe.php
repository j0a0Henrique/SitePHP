<?php
$foodId = $_GET['food'];
$restaurantId = $_GET['restaurant'];

$food = json_decode(file_get_contents("https://apifakedelivery.vercel.app/foods/$foodId"));
$restaurant = json_decode(file_get_contents("https://apifakedelivery.vercel.app/restaurants/$restaurantId"));
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title><?= $food->name ?> - <?= $restaurant->name ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #2c343d;
      color: white;
    }
    .card {
      background-color: white;
      color: black;
      border-radius: 15px;
    }
    .food-img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="card mx-auto" style="max-width: 600px;">
      <img src="<?= $food->image ?>" class="food-img" alt="Foto do prato">
      <div class="p-3">
        <h4><?= $food->name ?> <span class="text-success">R$ <?= number_format($food->price, 2, ',', '.') ?></span></h4>
        <p class="mb-2"><?= $food->description ?></p>
        <p class="mb-1"><strong>Tempo:</strong> <?= $food->time ?></p>
        <p class="mb-1"><strong>Frete:</strong> R$ <?= number_format($food->delivery, 2, ',', '.') ?></p>
        <p class="mb-3"><strong>Nota:</strong> <?= $food->rating ?></p>
        <hr>
        <h5>Restaurante: <?= $restaurant->name ?></h5>
        <img src="<?= $restaurant->image ?>" alt="Foto do restaurante" class="img-fluid rounded mb-2" style="max-height: 200px;">
        <p><strong>Nota:</strong> <?= $restaurant->rating ?></p>
        <p><?= $restaurant->description ?></p>
      </div>
    </div>
  </div>
</body>
</html>
