<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "emploi";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Récupération des données du formulaire
    $nom_contact = $_POST["Nom_"];
    $nom_entreprise = $_POST["Nom_"]; // Nom de l'entreprise
    $adresse = $_POST["Adresse"];
    $province = $_POST["Province"];
    $telephone = $_POST["Telephone"];
    $courriel = $_POST["courriel"];
    $ville = $_POST["Ville"];
    $code_postal = $_POST["Code_postal_"];
    $nombre_candidats = $_POST["Nombre_de_candidats_requis"];
    $type_placement = $_POST["Disponibilites_de_travail"];
    $heure = $_POST["heure"];
    $date = $_POST["date"];
    $message = $_POST["message"];
    
    // Requête d'insertion des données
    $sql = "INSERT INTO offresante (nom_contact, nom_entreprise, adresse, province, telephone, courriel, ville, code_postal, nombre_candidats, type_placement, heure, date, message)
            VALUES ('$nom_contact', '$nom_entreprise', '$adresse', '$province', '$telephone', '$courriel', '$ville', '$code_postal', '$nombre_candidats', '$type_placement', '$heure', '$date', '$message' )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement réussi !";
        $receiver = "planete.emploiinc@gmail.com";
$subject = "offre santé";
$body = "Vous avez un nouveau offre";


if(mail($receiver, $subject, $body)){
    echo "Email sent successfully to $receiver";
}else{
    echo "<script>alert('Données envoyées avec succès.')</script>";
    header("refresh:0; url=trouverS.html");
}
    } else {
        echo "<script>alert('Données envoyées avec succès.')</script>";
        header("refresh:0; url=trouverS.html");
    }
    
    // Fermeture de la connexion
    $conn->close();
}
?>
