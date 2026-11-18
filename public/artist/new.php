<?php

/**
 * && = ET
 * || = OU
 * == = comparaison relative
 * === = comparaison stricte
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['name'], $_POST['thumbnail'], $_POST['bio'])) {
        die('Il manque des données dans le formulaire.');
    }

    if (empty($_POST['name']) || empty($_POST['thumbnail']) || empty($_POST['bio'])) {
        die('Tous les champs doivent être renseignés.');
    }
    
    if (!filter_var($_POST['thumbnail'], FILTER_VALIDATE_URL)) {
        die('Le lien de l\'illustration est incorrect.');
    }

    $pdo = new PDO('mysql:host=database;dbname=app', 'app', 'app_password');
    $query = $pdo->prepare('INSERT INTO artist(name, thumbnail, bio) VALUES(:name, :thumbnail, :bio)');
    $query->execute([
        'name' => $_POST['name'],
        'thumbnail' => $_POST['thumbnail'],
        'bio' => $_POST['bio'],
    ]);

    header('Location: /artist/');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistes</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <?php include __DIR__ . '/../../templates/navbar.php'; ?>

    <main class="container">
        <form action="" method="post">
            <h1>Créer un artiste</h1>
            <div>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" placeholder="Nom" required>
            </div>

            <div>
                <label for="thumbnail">Illustration</label>
                <input type="url" name="thumbnail" id="thumbnail" placeholder="Lien de l'illustration" required>
            </div>

            <div>
                <label for="bio">Biographie</label>
                <textarea name="bio" id="bio" placeholder="Biographie" required></textarea>
            </div>

            <button class="btn btn-primary" type="submit">Créer</button>
        </form>
    </main>
</body>
</html>