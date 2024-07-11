<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emploi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Requête SQL pour compter le nombre d'ID distincts dans la table 'sante'
$sql = "SELECT COUNT(DISTINCT id) as total_ids FROM sante";
$result = $conn->query($sql);

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
$names=$CV_filename;
$CV_temp_filename = $_FILES['files']['tmp_name'][0];
if (isset($_FILES['permis']) ) {
    $maxId=$maxId+1;
    $permis = $maxId.''.$_FILES['permis']['name']; // permis
    if($_FILES['permis']['name']!=''){
    $names=$names.';'.$permis;
    }

    $CV_temp_permis = $_FILES['permis']['tmp_name'];

}
if (isset($_FILES['diplome']) ) {
    
    $diplome = $maxId.''.$_FILES['diplome']['name']; // emploi
    if($_FILES['diplome']['name']!=''){

    $names=$names.';'.$diplome;
    }
    $CV_temp_diplome = $_FILES['diplome']['tmp_name'];

}
if (isset($_FILES['rcr']) ) {
    $maxId=$maxId+1;
    $rcr = $maxId.''.$_FILES['rcr']['name']; // emploi
   
    if($_FILES['rcr']['name']!=''){

    $names=$names.';'.$rcr;
    }

    $CV_temp_rcr = $_FILES['rcr']['tmp_name'];

}
if (isset($_FILES['pdsb']) ) {
    $maxId=$maxId+1;
    $pdsb = $maxId.''.$_FILES['pdsb']['name']; // emploi
   
    if($_FILES['pdsb']['name']!=''){

    $names=$names.';'.$pdsb;
    }

    $CV_temp_pdsb = $_FILES['pdsb']['tmp_name'];

}

    
   
    
  
    $sql = "INSERT INTO sante (Nom, Adresse, Province, Telephone, courriel, Prenom, Ville, Code_postal, Comptences, Disponibilites_de_travail, amelioration, CV_filename) VALUES ('$Nom', '$Adresse', '$Province', '$Telephone', '$courriel', '$Prenom', '$Ville', '$Code_postal', '$competences', '$Disponibilites_de_travail', '$amelioration', '$names')";
    if ($conn->query($sql) === TRUE) {
 
        
    $upload_path = "fichiers/" . $CV_filename;
    $upload_paths=$upload_path;
    if (move_uploaded_file($CV_temp_filename, $upload_path)) {
        echo "Données enregistrées avec succès.";
    } 
    
    //permis
    if (isset($_FILES['permis']) ) {
    $upload_path1 = "fichiers/" .  $permis;
    $upload_paths= $upload_paths.";".$upload_path1;
    if (move_uploaded_file($CV_temp_permis, $upload_path1)) {
        echo "Données enregistrées avec succès.";
    } }
   
    //diplome
    if (isset($_FILES['diplome']) ) {
    $upload_path2 = "fichiers/" . $diplome;
    $upload_paths= $upload_paths.";".$upload_path2;
    if (move_uploaded_file($CV_temp_diplome, $upload_path2)) {
        echo "Données enregistrées avec succès.";
    } }

    //rcr
    if (isset($_FILES['rcr']) ) {
    $upload_path3= "fichiers/" . $rcr;
    $upload_paths= $upload_paths.";".$upload_path3;

    if (move_uploaded_file($CV_temp_rcr, $upload_path3)) {
        echo "Données enregistrées avec succès.";
    }}
    

    //pdsb
    if (isset($_FILES['pdsb']) ) {
    $upload_path4 = "fichiers/" . $pdsb;
    $upload_paths= $upload_paths.";".$upload_path4;

    if (move_uploaded_file($CV_temp_pdsb, $upload_path4)) {
        echo "Données enregistrées avec succès.";
    } 
}
}
    $receiver = "planete.emploiinc@gmail.com";
$subject = "Candidat santé";
$body = "Vous avez un nouveau candidat";


if(mail($receiver, $subject, $body)){
    echo "<script>alert('Données envoyées avec succès.')</script>";
   header("refresh:0; url=candidatureS.html");
}else{
    echo "<script>alert('Données envoyées avec succès.')</script>";
       header("refresh:0; url=candidatureS.html");
}
}

    $conn->close();

?>
