
<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Iscrizione Eventi - WDPA</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header><div class="logo">WDPA</div><nav>
<a href="index.html">Home</a>
<a href="galleria.html">Galleria</a>
<a href="iscrizione.php">Iscrizione</a>
<a href="area-riservata.php">Area Riservata</a></nav></header>
<section>
  <h2>Modulo di Iscrizione</h2>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $evento = $_POST['evento'];
    $stmt = $conn->prepare("INSERT INTO iscrizioni (nome, email, evento) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $evento);
    $stmt->execute();
    echo "<p>✅ Iscrizione completata!</p>";
    $stmt->close();
  }
  ?>
  <form method="POST">
    <label>Nome e Cognome: <input type="text" name="nome" required></label><br><br>
    <label>Email: <input type="email" name="email" required></label><br><br>
    <label>Evento:
      <select name="evento">
        <option value="roma">WDPA International Cup</option>
        <option value="parigi">World Showcase</option>
        <option value="ny">Global Finals</option>
      </select>
    </label><br><br>
    <button type="submit">Invia Iscrizione</button>
  </form>
</section>

  <footer>
    <p>&copy; 2025 WDPA - World Dance Pro-Am. Tutti i diritti riservati.</p>
    <p>Contattaci: <a href="mailto:info@wdpa.org">info@wdpa.org</a> | Tel: +39 123 456 7890</p>
    <p>Seguici su <a href="#">Instagram</a> | <a href="#">Facebook</a></p>
  </footer>
</body>
</html>
