<?php

if (!isset($_GET['id'])) {
    die('Il faut choisir un artiste.');
}

$pdo = new PDO('mysql:host=database;dbname=app', 'app', 'app_password');

$query = $pdo->prepare('SELECT * FROM artist WHERE id = :id');
$query->execute(['id' => $_GET['id']]);

$artist = $query->fetch();
$artistNotFound = !isset($artist['id']);

if ($artistNotFound) {
    http_response_code(404);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <?php include __DIR__ . '/../../templates/navbar.php'; ?>

    <main class="container">
        <?php if ($artistNotFound) { ?>
            <p>L'artiste n'a pas été trouvé.</p>
        <?php } else { ?>
        <h1><?php echo $artist['name']; ?></h1>
        <img src="<?php echo $artist['thumbnail']; ?>" alt="Illustration de l'artiste">
        <?php } ?>
    </main>
</body>
</html>