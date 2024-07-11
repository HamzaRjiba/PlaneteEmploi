<?php
session_start(); // Démarrer la session

// Arrêter la session
session_destroy();

// Rediriger vers la page de connexion
header("Location: login.php");
exit();
?>
