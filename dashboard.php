
<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: area-riservata.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - WDPA</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header><div class="logo">WDPA</div><nav>
<a href="index.html">Home</a>
<a href="galleria.html">Galleria</a>
<a href="iscrizione.php">Iscrizione</a>
<a href="dashboard.php">Dashboard</a></nav></header>
<section>
  <h2>Benvenuto, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
  <p>Qui potrai visualizzare tutte le iscrizioni agli eventi (in arrivo).</p>
</section>

  <footer>
    <p>&copy; 2025 WDPA - World Dance Pro-Am. Tutti i diritti riservati.</p>
    <p>Contattaci: <a href="mailto:info@wdpa.org">info@wdpa.org</a> | Tel: +39 123 456 7890</p>
    <p>Seguici su <a href="#">Instagram</a> | <a href="#">Facebook</a></p>
  </footer>
</body>
</html>
