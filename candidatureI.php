<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

  <style>

    button{
      margin-top: 20px;;
    }
    input[type=file] {
  width: 350px;
  max-width: 100%;
  color: #444;
  padding: 5px;
  background: #fff;
  border-radius: 10px;
  border: 1px solid #555;
}
    .form-container {
     
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      width: 80%;
      margin-left: auto;
      margin-right: auto;
      margin-top: 10%;
    }

    .form-container h2 {
      text-align: center;
    }

    .flex-container {
  display: flex;
  flex-wrap: wrap;
  
}

.flex-container > div {
  background-color: #f1f1f1;
  width: 60%px;
  margin: 2%;
  text-align: center;
  
  font-size: 30px;
}
@media (min-width: 768px) {
    .flex-container > div {
      width: 40%; 
    }
  }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="tel"],
    .form-group input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    .form-group button[type="submit"] {
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 4px;
      padding: 10px 20px;
      cursor: pointer;
    }

    .form-group button[type="submit"]:hover {
      background-color: #2980b9;
    }

    body{
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url("bg.jpeg");
      background-size: cover;
    }

    header {
      background-color: #5f5f5f;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      width: 170px;
      height: 75px;
      

    }
    .profile-image {
      width: 60px;
      height: 60px;
      border-radius: 50%;
    }

    .images-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .centered-image {
      margin-top: 30%;
      width: 60%;
      height: 80%;
      position: relative;
      margin-left: auto;
      margin-right: auto;
    }

    .image-button {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 50%;
      text-align: center;
    }

    .divider {
      border-top: 7px solid #000;
      margin: 0;
    }
  </style>
</head>
<body>
  <header>
    

  <a href="home.html">
      <img src="logo.jpg" alt="Logo" class="logo">
      </a>

    <img src="i22.png" alt="Profile" class="profile-image">
  </header>
  <hr class="divider">
  <div class="form-container">
    <h2>Veuillez remplir ces champs</h2>
    <form action="Addind.php" method="post" enctype="multipart/form-data">
      <div class="flex-container">
      
        <div >
          <label for="Nom_">Nom:</label>
          <input type="text" id="Nom_" name="Nom_" class="form-control" placeholder="Nom" required>
        </div>
        <div >
          <label for="Adresse">Adresse:</label>
          <input type="text" id="Adresse" name="Adresse" class="form-control" placeholder="Adresse" required>
        </div>
     
    
        <div >
          <label for="Province">Province:</label>
          <input type="text" id="Province" name="Province" class="form-control" placeholder="Province" required>
        </div>
        <div >
          <label for="Telephone">Téléphone:</label>
          <input type="tel" id="Telephone" name="Telephone" class="form-control" placeholder="Téléphone">
        </div>
     
     
        <div class=>
          <label for="courriel">Courriel:</label>
          <input type="email" id="courriel" name="courriel" class="form-control" placeholder="Courriel">
        </div>
        <div >
          <label for="Prenom">Prénom:</label>
          <input type="text" id="Prenom" name="Prenom" class="form-control" placeholder="Prénom">
        </div>
   
     
        <div >
          <label for="Ville">Ville:</label>
          <input type="text" id="Ville" name="Ville" class="form-control" placeholder="Ville">
        </div>
        <div >
          <label for="Code_postal_">Code postal:</label>
          <input type="text" id="Code_postal_" name="Code_postal_" class="form-control" placeholder="Code postal">
        </div>
     
      
        <div >
          <label for="Comptences_">Compétences:</label>
          <input type="text" id="Comptences_" name="Comptences_" class="form-control" placeholder="Compétences">
        </div>
        <div >
          <label for="Disponibilites_de_travail">Disponibilités de travail:</label>
          <select id="Disponibilites_de_travail" name="Disponibilites_de_travail" class="form-control">
            <option value="">Sélectionnez votre disponibilité</option>
            <option value="temps-plein">Temps plein</option>
            <option value="temps-partiel">Temps partiel</option>
            <option value="teletravail">Télétravail</option>
            <option value="Heures_supp">Heures supplémentaires</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="Que_recherchez_vous_amliorer_dans_votre_nouvel_emploi_">Que recherchez-vous à améliorer dans votre nouvel emploi?</label>
        <textarea id="Que_recherchez_vous_amliorer_dans_votre_nouvel_emploi_" name="Que_recherchez_vous_amliorer_dans_votre_nouvel_emploi_" rows="4" class="form-control" placeholder="Que recherchez-vous à améliorer dans votre nouvel emploi?"></textarea>
      </div>
      
      <div>
        <label for="files[]">Joindre votre CV:</label>
        <input type="file" id="files[]" name="files[]" class="form-control-file" accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
      </div>
      <div>
      <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>

    </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
