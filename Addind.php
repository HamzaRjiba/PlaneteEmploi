<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emploi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}
$sql = "SELECT MAX(id) as max_id FROM sante";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $maxId = $row["max_id"];
   
} else {
    $maxId=0;
}
$maxId=  $maxId+1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire...
    $Nom = $_POST['Nom_'];
$Adresse = $_POST['Adresse'];
$Province = $_POST['Province'];
$Telephone = $_POST['Telephone'];
$courriel = $_POST['courriel'];
$Prenom = $_POST['Prenom'];
$Ville = $_POST['Ville'];
$Code_postal = $_POST['Code_postal_'];
$competences = $_POST['Comptences_'];
$Disponibilites_de_travail = $_POST['Disponibilites_de_travail'];
$amelioration = $_POST['Que_recherchez_vous_amliorer_dans_votre_nouvel_emploi_'];
$CV_filename = $maxId.''.$_FILES['files']['name'][0]; // Nom du fichier du CV
$CV_temp_filename = $_FILES['files']['tmp_name'][0];
    
   
    
  
    
    $sql = "INSERT INTO industrie (Nom, Adresse, Province, Telephone, courriel, Prenom, Ville, Code_postal, Comptences, Disponibilites_de_travail, amelioration, CV_filename) VALUES ('$Nom', '$Adresse', '$Province', '$Telephone', '$courriel', '$Prenom', '$Ville', '$Code_postal', '$competences', '$Disponibilites_de_travail', '$amelioration', '$CV_filename')";
    if ($conn->query($sql) === TRUE) {
    $upload_path = "fichiers/" . $CV_filename;
    if (move_uploaded_file($CV_temp_filename, $upload_path)) {
        echo "Données enregistrées avec succès.";
    } else {
        echo "Erreur lors du téléchargement du fichier.";
    }
    } else {
        echo "Erreur lors de l'insertion des données : " . $conn->error;
    }
    $receiver = "planete.emploiinc@gmail.com";
$subject = "Candidat Industrie";
$body = "Vous avez un nouveau candidat";


if(mail($receiver, $subject, $body)){
    echo "<script>alert('Données envoyées avec succès.')</script>";
    header("refresh:3; url=candidatureI.php");
        
}
else{
    echo "<script>alert('Données envoyées avec succès.')</script>";
header("refresh:1; url=candidatureI.php");
    
}
}


    $conn->close();

?>
