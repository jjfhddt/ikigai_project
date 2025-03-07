<!-- database.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "ziineb2006";
$dbname = "ikigai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}
?>