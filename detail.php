<?php
include 'connexion.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: affichage.php');
    exit;
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM ikigai_data WHERE id = $id");

if ($result->num_rows === 0) {
    header('Location: affichage.php');
    exit;
}

$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails IKIGAI</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Détails de l'entrée IKIGAI</h2>
        
        <div class="nav-links">
            <a href="index.php">Accueil</a>
            <a href="affichage.php">Retour à la liste</a>
        </div>
        
        <div class="detail-card">
            <h3>Tags personnels</h3>
            <p><strong>1:</strong> <?php echo $data['tag1']; ?></p>
            <p><strong>2:</strong> <?php echo $data['tag2']; ?></p>
            <p><strong>3:</strong> <?php echo $data['tag3']; ?></p>
            
            <h3>Confiance</h3>
            <p><?php echo nl2br($data['confiance']); ?></p>
            
            <h3>Valeurs des collègues</h3>
            <p><?php echo $data['valeurs_collegues']; ?></p>
            
            <h3>Points communs et différences</h3>
            <p><?php echo nl2br($data['points_communs_differences']); ?></p>
            
            <h3>Construction de la réputation</h3>
            <p><?php echo nl2br($data['reputation']); ?></p>
            
            <h3>Être exemplaire</h3>
            <p><strong>Signification:</strong> <?php echo nl2br($data['exemplaire_signification']); ?></p>
            <p><strong>Comment devenir exemplaire:</strong> <?php echo nl2br($data['exemplaire_devenir']); ?></p>
            <p><strong>Apprentissage nécessaire:</strong> <?php echo nl2br($data['exemplaire_apprentissage']); ?></p>
            
            <h3>Valeurs personnelles</h3>
            <p><?php echo $data['valeurs_personnelles']; ?></p>
            
            <h3>Valeurs selon les collègues</h3>
            <p><?php echo $data['valeurs_collegues_liste']; ?></p>
            
            <h3>Réflexions sur les écarts</h3>
            <p><?php echo nl2br($data['reflexions']); ?></p>
        </div>
    </div>
    
    <style>
        .detail-card {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 30px;
            margin-top: 30px;
        }
        
        .detail-card h3 {
            color: var(--primary-color);
            margin-top: 25px;
            margin-bottom: 10px;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 5px;
        }
        
        .detail-card h3:first-child {
            margin-top: 0;
        }
    </style>
</body>
</html>

