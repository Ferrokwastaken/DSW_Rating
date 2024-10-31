<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guardando Valoración</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
  require_once 'connection.php';

    if (empty($_POST['rate'])) {
      echo '<h1 class="error">No se encuentra valoración</h1>';
    } else {
      $rate = $_POST['rate'];
      // $date = new DateTime();
      $rows = $link->exec("INSERT INTO rates (date, rate) VALUES (NOW(), $rate)");
      $link = null;
  ?>
  <h1>Gracias por tu valoración</h1>
  <?php
    }
  ?>
  <p><a href="index.php">Volver a valorar</a></p>
  <script>
    function changePage () {
      window.location.href = 'index.php'
    }

    setTimeout(changePage, 2000)
  </script>
</body>
</html>