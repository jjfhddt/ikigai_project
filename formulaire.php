<!-- formulaire.php -->
<?php
include 'connexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tag1 = $_POST['tag1'];
    $tag2 = $_POST['tag2'];
    $tag3 = $_POST['tag3'];
    $confiance = $_POST['confiance'];
    $valeurs = implode(", ", $_POST['valeurs']);
    $causes = implode(", ", $_POST['causes']);
    
    $sql = "INSERT INTO ikigai_data (tag1, tag2, tag3, confiance, valeurs) VALUES ('$tag1', '$tag2', '$tag3', '$confiance', '$valeurs')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Données enregistrées avec succès";
    } else {
        echo "Erreur: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remplir le Cahier</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Remplir le Cahier IKIGAI</h2>
    <form action="affichage.php" method="POST">
    <fieldset>
            <legend>écrit les 3 mots (tags) que vous voulez que les gens retiennent de vous </legend>
            <label for="tag1">1.</label>
            <input type="text" name="tag1" required><br><br>
            
            <label for="tag2">2.</label>
            <input type="text" name="tag2" required><br><br>
            
            <label for="tag3">3.</label>
            <input type="text" name="tag3" required><br>
        </fieldset><br>

        <fieldset>
            <legend><label for="confiance">Êtes-vous une personne de confiance ? Pourquoi ?</label></legend>
            <textarea name="confiance" required></textarea><br>
        </fieldset><br>
        
        <fieldset>
            <legend>Quels sont les mots qu’ont écrit vos collègues</legend>
            <label for="valeurs[1]">1.</label>
            <input type="text" name="valeurs[1]" required><br><br>
            <label for="valeurs[2]">2.</label>
            <input type="text" name="valeurs[2]" required><br><br>
            <label for="valeurs[3]">3.</label>
            <input type="text" name="valeurs[3]" required><br><br>
            <label for="valeurs[4]">4.</label>
            <input type="text" name="valeurs[4]" required><br><br>
            <label for="valeurs[5]">5.</label>
            <input type="text" name="valeurs[5]" required><br><br>
            <label for="valeurs[6]">6.</label>
            <input type="text" name="valeurs[6]" required><br><br>
            <label for="valeurs[7]">7.</label>
            <input type="text" name="valeurs[7]" required><br><br>
            <label for="valeurs[8]">8.</label>
            <input type="text" name="valeurs[8]" required><br><br>
            <label for="valeurs[9]">9.</label>
            <input type="text" name="valeurs[9]" required><br><br>
            <label for="valeurs[10]">10.</label>
            <input type="text" name="valeurs[10]" required><br><br>
            <label for="valeurs[11]">11.</label>
            <input type="text" name="valeurs[11]" required>
        </fieldset><br>

        <fieldset>
            <legend><label for="pcd">Quels sont les points communs ? Les différences ?</label></legend>
            <textarea name="pcd" id="pcd" required></textarea>
        </fieldset><br>

        <fieldset>
            <legend><label for="rép">Comment construire votre réputation autour des mots clés que vous voulez ? même si vous n’êtes pas encore aujourd’hui ce que vous voulez
            devenir</label></legend>
            <textarea name="rép" id="rép" required></textarea>
        </fieldset><br>
        
        <fieldset>
            <legend><label for="exe1">Que signifie “être exemplaire” ?</label></legend>
            <textarea name="exe1" id="exe1" required></textarea>
        </fieldset><br>

        <fieldset>
            <legend><label for="ex2">Comment pouvez-vous devenir exemplaire ?</label></legend>
            <textarea name="ex2" id="ex2" required></textarea>
        </fieldset><br>

        <fieldset>
            <legend><label for="ex3">Que devez vous apprendre pour devenir exemplaire ?</label></legend>
            <textarea name="ex3" id="ex3" required></textarea>
        </fieldset><br>

        <fieldset>
            <legend>Quelles sont vos 5 valeurs clés avec lesquelles vous vivez au quotidien ?</legend>
            <label for="v1">1.</label>
            <input type="text" id="v1" name="v1"><br><br>
            <label for="v2">2.</label>
            <input type="text" id="v2" name="v2"><br><br>
            <label for="v3">3.</label>
            <input type="text" id="v3" name="v3"><br><br><?php
include 'connexion.php';

$message = '';
$messageType = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $tag1 = htmlspecialchars($_POST['tag1']);
    $tag2 = htmlspecialchars($_POST['tag2']);
    $tag3 = htmlspecialchars($_POST['tag3']);
    $confiance = htmlspecialchars($_POST['confiance']);
    
    // Traitement des valeurs des collègues
    $valeurs = [];
    for ($i = 1; $i <= 11; $i++) {
        if (isset($_POST['valeurs'][$i]) && !empty($_POST['valeurs'][$i])) {
            $valeurs[] = htmlspecialchars($_POST['valeurs'][$i]);
        }
    }
    $valeursStr = implode(", ", $valeurs);
    
    // Autres champs
    $pcd = htmlspecialchars($_POST['pcd']);
    $rep = htmlspecialchars($_POST['rép']);
    $exe1 = htmlspecialchars($_POST['exe1']);
    $ex2 = htmlspecialchars($_POST['ex2']);
    $ex3 = htmlspecialchars($_POST['ex3']);
    
    // Valeurs personnelles
    $valeursPers = [];
    for ($i = 1; $i <= 5; $i++) {
        if (isset($_POST['v'.$i]) && !empty($_POST['v'.$i])) {
            $valeursPers[] = htmlspecialchars($_POST['v'.$i]);
        }
    }
    $valeursPersoStr = implode(", ", $valeursPers);
    
    // Valeurs des collègues
    $valeursCol = [];
    for ($i = 1; $i <= 5; $i++) {
        if (isset($_POST['lv'.$i]) && !empty($_POST['lv'.$i])) {
            $valeursCol[] = htmlspecialchars($_POST['lv'.$i]);
        }
    }
    $valeursColStr = implode(", ", $valeursCol);
    
    // Réflexions
    $ref = htmlspecialchars($_POST['réf']);
    
    // Insertion dans la base de données
    $sql = "INSERT INTO ikigai_data (
                tag1, tag2, tag3, 
                confiance, 
                valeurs_collegues, 
                points_communs_differences, 
                reputation, 
                exemplaire_signification, 
                exemplaire_devenir, 
                exemplaire_apprentissage, 
                valeurs_personnelles, 
                valeurs_collegues_liste, 
                reflexions
            ) VALUES (
                '$tag1', '$tag2', '$tag3', 
                '$confiance', 
                '$valeursStr', 
                '$pcd', 
                '$rep', 
                '$exe1', 
                '$ex2', 
                '$ex3', 
                '$valeursPersoStr', 
                '$valeursColStr', 
                '$ref'
            )";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Données enregistrées avec succès!";
        $messageType = "success";
    } else {
        $message = "Erreur: " . $conn->error;
        $messageType = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remplir le Cahier</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Remplir le Cahier IKIGAI</h2>
        
        <div class="nav-links">
            <a href="index.php">Accueil</a>
            <a href="affichage.php">Voir les réponses</a>
        </div>
        
        <?php if (!empty($message)): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <form action="formulaire.php" method="POST">
            <fieldset>
                <legend>Écrivez les 3 mots (tags) que vous voulez que les gens retiennent de vous</legend>
                <div class="input-group">
                    <label for="tag1">1.</label>
                    <input type="text" name="tag1" id="tag1" required>
                </div>
                
                <div class="input-group">
                    <label for="tag2">2.</label>
                    <input type="text" name="tag2" id="tag2" required>
                </div>
                
                <div class="input-group">
                    <label for="tag3">3.</label>
                    <input type="text" name="tag3" id="tag3" required>
                </div>
            </fieldset>

            <fieldset>
                <legend>Êtes-vous une personne de confiance ? Pourquoi ?</legend>
                <textarea name="confiance" required></textarea>
            </fieldset>
            
            <fieldset>
                <legend>Quels sont les mots qu'ont écrit vos collègues</legend>
                <?php for ($i = 1; $i <= 11; $i++): ?>
                <div class="input-group">
                    <label for="valeurs<?php echo $i; ?>"><?php echo $i; ?>.</label>
                    <input type="text" name="valeurs[<?php echo $i; ?>]" id="valeurs<?php echo $i; ?>" required>
                </div>
                <?php endfor; ?>
            </fieldset>

            <fieldset>
                <legend>Quels sont les points communs ? Les différences ?</legend>
                <textarea name="pcd" id="pcd" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Comment construire votre réputation autour des mots clés que vous voulez ?</legend>
                <textarea name="rép" id="rép" required></textarea>
            </fieldset>
            
            <fieldset>
                <legend>Que signifie "être exemplaire" ?</legend>
                <textarea name="exe1" id="exe1" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Comment pouvez-vous devenir exemplaire ?</legend>
                <textarea name="ex2" id="ex2" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Que devez vous apprendre pour devenir exemplaire ?</legend>
                <textarea name="ex3" id="ex3" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Quelles sont vos 5 valeurs clés avec lesquelles vous vivez au quotidien ?</legend>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="input-group">
                    <label for="v<?php echo $i; ?>"><?php echo $i; ?>.</label>
                    <input type="text" id="v<?php echo $i; ?>" name="v<?php echo $i; ?>" required>
                </div>
                <?php endfor; ?>
            </fieldset>

            <fieldset>
                <legend>Demandez à vos collègues de faire une liste des 5 valeurs qui vous caractérisent</legend>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="input-group">
                    <label for="lv<?php echo $i; ?>"><?php echo $i; ?>.</label>
                    <input type="text" id="lv<?php echo $i; ?>" name="lv<?php echo $i; ?>" required>
                </div>
                <?php endfor; ?>
            </fieldset>

            <fieldset>
                <legend>Écrivez vos réflexions personnelles sur les écarts constatés et les actions à faire</legend>
                <textarea name="réf" id="réf" required></textarea>
            </fieldset>

            <button type="submit">Enregistrer</button>
        </form>
    </div>
</body>
</html>


            <label for="v4">4.</label>
            <input type="text" id="v4" name="v4"><br><br>
            <label for="v5">5.</label>
            <input type="text" id="v5" name="v5">
        </fieldset><br>

        <fieldset>
            <legend>Demandez à vos collègues de faire une liste des 5 valeurs qui vous caractérisent</legend>
            <label for="lv1">1.</label>
            <input type="text" id="lv1" name="lv1"><br><br>
            <label for="lv2">2.</label>
            <input type="text" id="lv2" name="lv2"><br><br>
            <label for="lv3">3.</label>
            <input type="text" id="lv3" name="lv3"><br><br>
            <label for="lv4">4.</label>
            <input type="text" id="lv4" name="lv4"><br><br>
            <label for="lv5">5.</label>
            <input type="text" id="lv5" name="lv5">
        </fieldset><br>

        <fieldset>
            <legend><label for="réf">écrivez vos réflexions personnelles que les écarts constatés et les actions à faire dans les cas d’écart</label></legend>
            <textarea name="réf" id="réf" required></textarea>
        </fieldset><br>

        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>