<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estadísticas</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Estadísticas</h1>
  <table>
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Cantidad</th>
        <th>Media</th>
      </tr>
    </thead>
    <tbody>
  
  <?php
    require_once 'connection.php';

    $stats = $store->showStats();

    foreach ($stats as $stat) {
      list($date, $time) = explode(' ', $stat['dateformat']);
      printf("<tr> <td>%s</td> <td>%s</td> <td>%d</td> <td>%.2f</td> </tr>",
      $stat['day'], $stat['time'], $stat['count'], $stat['average']);
    }
    // while ($rate = $results->fetch(PDO::FETCH_OBJ)) {
    //   list($date, $time) = explode(' ', $rate->dateformat);
    //   printf("<tr> <td>%s</td> <td>%s</td> <td>%d</td> <td>%.2f</td> </tr>",
    //   $date, $time, $rate->count, $rate->average);
    // }

    // $link = null;
  ?>

    </tbody>
  </table>
</body>
</html>