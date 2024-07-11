<?php
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "emploi";
  session_start();

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    
    $sql = "SELECT * FROM admin WHERE email='$email' AND mdp='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      header("Location: deatailsante.php");
      exit();
    } else {
      $loginError = "Les informations de connexion sont incorrectes.";
    }
  }
  $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

  <!-- Incluez d'abord la feuille de style Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
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
    .divider {
      border-top: 7px solid #000;
      margin: 0;
    }
   
    @import url("https://fonts.googleapis.com/css?family=Ubuntu:700&display=swap");
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Ubuntu", sans-serif;
      text-decoration: none;
    }

    .form {
      width: 720px;
      height: 500px;
      margin: 50px auto;
      padding: 45px 65px;
      background: linear-gradient(to right, #8300cd, #b800c4);
    }
    @media (max-width: 767px) {
      .form {
        width: 100%;
        padding: 30px;
      }
      /* Autres règles CSS pour les appareils mobiles */
      /* ... */
    }
    .form__box {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: space-around;
  align-items: center;
  background: #fff;
  border-radius: 40px;
}
.form__left {
  width: 50%;
}
.form__padding {
  width: 210px;
  height: 210px;
  background: #f2f2f2;
  border-radius: 50%;
  margin: 0 auto;
  line-height: 210px;
  position: relative;
}
.form__image {
  max-width: 100%;
  width: 100%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.form__right {
  line-height: 26px;
  width: 50%;
}
.form__padding-right {
  padding: 0 25px;
 
}
.form__title {
  font-size: 18px;
  font-weight: bold;
  text-align: center;
  margin-bottom: 30px;
}
.form__submit-btn {
  background: #1fcc44;
  cursor: pointer;
}
.form__submit-btn:hover {
  background: #ff3f70;
}
.form__email {
  position: relative;
}

input {
  display: block;
  width: 100%;
  margin-bottom: 25px;
  height: 35px;
  border-radius: 20px;
  border: none;
  background: #f2f2f2;
  padding: 10px;
  font-size: 14px;
  position: relative;
}
input:after {
  position: absolute;
  content: "a***";
}

a {
  color: #71df88;
  position: relative;
}
a:hover {
  color: #ff3f70;
}
@media (max-width: 768px) {
input{
    width:120%;
}

}
@media (min-width: 768px) {
input{
    width: 70%;
}}
@media (min-width: 768px) {
h1{
    width: 70%;  
}
}

  </style>
</head>
<body>

<header>
  <img src="logo.jpg" alt="Logo" class="logo">
  <img src="i22.png" alt="Profile" class="profile-image">
</header>

<hr class="divider">

<div class="form">
  <div class="form__box">
    <div class="form__left d-none d-md-block">
      <div class="form__padding"><img class="form__image" src="login.png"/></div>
    </div>
    <div class="form__right">
      
        <form method="post">
          <h1 class="form__title">Member Login</h1>
          <input class="form__email" type="text" name="email" placeholder="Email"/>
          <input class="form__password" type="password" name="password" placeholder="******"/>
          <input class="form__submit-btn" type="submit" value="Login"/>
        </form>
        <span>Forgot <a class="form__link" href="#">Username</a> / <a class="form__link" href="#">Password</a></span>
        <?php
        if (isset($loginError)) {
          echo '<p class="text-danger">' . $loginError . '</p>';
        }
      ?>
      
    </div>
  </div>
</div>

<!-- Incluez jQuery avant le script JavaScript de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>



