<?php

$pdo = new PDO('mysql:host=database;dbname=app', 'app', 'app_password');

$query = $pdo->query('SELECT * FROM artist');
$artists = $query->fetchAll();

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
        <a class="btn btn-primary" href="new.php">Nouveau</a>
        
        <?php if (count($artists) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width: 100%;">Nom</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($artists as $artist) { ?>
                        <tr>
                            <td><?php echo $artist['id']; ?></td>
                            <td><?php echo $artist['name']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="show.php?id=<?php echo $artist['id']; ?>">Voir</a>
                                <a class="btn btn-secondary" href="edit.php?id=<?php echo $artist['id']; ?>">Modifier</a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $artist['id']; ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            
            <p>Il n'y a pas encore d'artiste.</p>
    
        <?php } ?>
    </main>
</body>
</html>