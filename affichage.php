<!-- affichage.php -->
<?php
include 'connexion.php';
$result = $conn->query("SELECT * FROM ikigai_data");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Réponses</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Réponses Enregistrées</h2>
    <table border="1"><?php
include 'connexion.php';
$result = $conn->query("SELECT * FROM ikigai_data ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Réponses</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Réponses Enregistrées</h2>
        
        <div class="nav-links">
            <a href="index.php">Accueil</a>
            <a href="formulaire.php">Remplir mon cahier</a>
        </div>
        
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Tags</th>
                    <th>Confiance</th>
                    <th>Valeurs des collègues</th>
                    <th>Points communs/différences</th>
                    <th>Valeurs personnelles</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['tag1'] . ', ' . $row['tag2'] . ', ' . $row['tag3']; ?></td>
                    <td><?php echo substr($row['confiance'], 0, 100) . '...'; ?></td>
                    <td><?php echo $row['valeurs_collegues']; ?></td>
                    <td><?php echo substr($row['points_communs_differences'], 0, 100) . '...'; ?></td>
                    <td><?php echo $row['valeurs_personnelles']; ?></td>
                    <td>
                        <a href="detail.php?id=<?php echo $row['id']; ?>">Voir détails</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p class="message">Aucune donnée n'a été enregistrée pour le moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>


        <tr>
            <th>ID</th>
            <th>Tags</th>
            <th>Confiance</th>
            <th>Valeurs</th>
            <th>Causes</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['tag1'] . ', ' . $row['tag2'] . ', ' . $row['tag3']; ?></td>
            <td><?php echo $row['confiance']; ?></td>
            <td><?php echo $row['valeurs']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
