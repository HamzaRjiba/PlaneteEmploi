<!DOCTYPE html>
<html>
<head>
<?php
session_start(); 
if (!isset($_SESSION["email"]) || !isset($_SESSION["password"])) {
    header("Location: login.php"); 
    exit();
}
?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Affichage des données</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="deatailsante.php">CandidatsSanté</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="detailindustrie.php">CandidatsIndustrie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deatailoffresante.php">OffresSanté</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="detailoffreind.php">OffresIndustrie</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a href="logout.php">
          <button class="btn btn-primary">Déonnexion</button>
            </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container mt-5">
    <h2 class="mb-4">Affichage des données de la table offrSantés</h2>
    <?php
        $offresParPage = 10; // Nombre d'offres à afficher par page
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1; // Page actuelle

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "emploi";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }

        $totalOffres = $conn->query("SELECT COUNT(*) FROM offresante")->fetch_row()[0];
        $totalPages = ceil($totalOffres / $offresParPage);

        $offset = ($currentPage - 1) * $offresParPage;
        $sql = "SELECT * FROM offresante ORDER BY created_at DESC LIMIT $offresParPage OFFSET $offset";
        $result = $conn->query($sql);
        
        echo '<div class="accordion" id="accordionExample">';
        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $showClass = ($i === 0) ? 'show' : '';
                echo '<div class="card">';
                echo '<div class="card-header" id="heading' . $row["id"] . '">';
                echo '<h2 class="mb-0">';
                echo '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse' . $row["id"] . '" aria-expanded="true" aria-controls="collapse' . $row["id"] . '">';
                echo 'nom de contact :'.$row["nom_contact"] . ' - ' . 'Entreprise:'.$row["nom_entreprise"];
                echo '</button>';
                echo '</h2>';
                echo '</div>';
                echo '<div id="collapse' . $row["id"] . '" class="collapse ' . $showClass . '" aria-labelledby="heading' . $row["id"] . '" data-parent="#accordionExample">';
                echo '<div class="card-body">';
                echo '<strong>Adresse:</strong> ' . $row["adresse"] . '<br>';
                echo '<strong>Province:</strong> ' . $row["province"] . '<br>';
                echo '<strong>Téléphone:</strong> ' . $row["telephone"] . '<br>';
                echo '<strong>Courriel:</strong> ' . $row["courriel"] . '<br>';
                echo '<strong>Ville:</strong> ' . $row["ville"] . '<br>';
                echo '<strong>Code postal:</strong> ' . $row["code_postal"] . '<br>';
                echo '<strong>Nombre de candidats:</strong> ' . $row["nombre_candidats"] . '<br>';
                echo '<strong>Type de placement:</strong> ' . $row["type_placement"] . '<br>';
                echo '<strong>Heure:</strong> ' . $row["heure"] . '<br>';
                echo '<strong>Date:</strong> ' . $row["date"] . '<br>';
                echo '<strong>Message:</strong> ' . $row["message"] . '<br>';
                echo '<strong>Créé à:</strong> ' . $row["created_at"] . '<br>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $i++;
            }
        } else {
            echo '<p class="text-muted">Aucun enregistrement trouvé.</p>';
        }
        $conn->close();
        ?>
    </div>
    <nav aria-label="Pagination">
        <ul class="pagination justify-content-center">
            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i === $currentPage) ? 'active' : '';
                echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
            }
            ?>
        </ul>
    </nav>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
