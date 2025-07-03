<?php
// Consumindo a API de foods
$url = "https://apifakedelivery.vercel.app/foods";
$response = file_get_contents($url);
$foods = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Taquara, RS</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h1>Taquara, RS</h1>
    <div class="profile"></div>
</header>

<div class="container">
    <h2>Comidas</h2>
    <div class="foods">
        <?php foreach ($foods as $food) : ?>
            <div class="card">
                <img src="<?= htmlspecialchars($food['image']) ?>" alt="<?= htmlspecialchars($food['name']) ?>">
                <div class="info">
                    <strong><?= htmlspecialchars($food['name']) ?></strong> 
                    <span class="price">R$ <?= number_format($food['price'], 2, ',', '.') ?></span> 
                    <span class="rating">⭐ <?= htmlspecialchars($food['rating']) ?></span><br>
                    <small><?= htmlspecialchars($food['description']) ?></small><br>
                    <strong>Frete:</strong> R$ <?= number_format($food['delivery'], 2, ',', '.') ?> 
                    <strong>Tempo:</strong> <?= htmlspecialchars($food['time']) ?>
                    <br>
                    <a href="detalhe.php?food=<?= $food['id'] ?>&restaurant=<?= $food['restaurantId'] ?>" class="btn btn-sm btn-outline-light mt-2">Ver mais</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Restaurantes</h2>
    <div class="restaurants">
        <?php
        $apiUrl = 'https://apifakedelivery.vercel.app/restaurants';
        $response = file_get_contents($apiUrl);
        $restaurants = json_decode($response, true);

        if ($restaurants) {
            foreach ($restaurants as $restaurant) {
                echo '
                <div class="card h-100 shadow">
                    <img src="'.$restaurant['image'].'" class="card-img-top" alt="'.$restaurant['name'].'">
                    <div class="card-body">
                        <h5 class="card-title">'.$restaurant['name'].'</h5>
                        <p class="card-text">'.$restaurant['description'].'</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <span class="badge bg-warning text-dark">⭐'.$restaurant['rating'].'</span>
                    </div>
                </div>';
            }
        }
        ?>
    </div>
</div>
</body>
</html>
