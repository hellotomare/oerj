
<?php
session_start();
include('db.php');
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $stmt = $conn->prepare("SELECT password_hash FROM utenti WHERE username = ?");
  $stmt->bind_param("s", $user);
  $stmt->execute();
  $stmt->bind_result($hash);
  if ($stmt->fetch() && hash('sha256', $pass) === $hash) {
    $_SESSION['user'] = $user;
    header("Location: dashboard.php");
    exit();
  } else {
    $error = "Credenziali non valide";
  }
  $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Area Riservata - WDPA</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header><div class="logo">WDPA</div><nav>
<a href="index.html">Home</a>
<a href="galleria.html">Galleria</a>
<a href="iscrizione.php">Iscrizione</a>
<a href="area-riservata.php">Area Riservata</a></nav></header>
<section>
  <h2>Login</h2>
  <form method="POST">
    <p style="color:red;"><?= $error ?></p>
    <label>Username: <input type="text" name="username" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit">Accedi</button>
  </form>
</section>

  <footer>
    <p>&copy; 2025 WDPA - World Dance Pro-Am. Tutti i diritti riservati.</p>
    <p>Contattaci: <a href="mailto:info@wdpa.org">info@wdpa.org</a> | Tel: +39 123 456 7890</p>
    <p>Seguici su <a href="#">Instagram</a> | <a href="#">Facebook</a></p>
  </footer>
</body>
</html>
