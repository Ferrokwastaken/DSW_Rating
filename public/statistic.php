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

    $results = $link->query('SELECT DATE_FORMAT(date, "%Y-%c-%d %H:%i") AS dateformat, COUNT(rate) AS count, avg(rate) AS average FROM rates GROUP BY dateformat');

    while ($rate = $results->fetch(PDO::FETCH_OBJ)) {
      list($date, $time) = explode(' ', $rate->dateformat);
      printf("<tr> <td>%s</td> <td>%s</td> <td>%d</td> <td>%.2f</td> </tr>",
    $date, $time, $rate->count, $rate->average);
    }

    $link = null;

  //   while ($fileName = readdir($dir)) {
  //   if (is_file($path . $fileName)) {
  //     $fileNameWithoutExtension = explode('.', $fileName)[0];
  //     list($year, $month, $day, $hour, $min) = explode('_', $fileNameWithoutExtension);
  //     $date = $year . "/" . $month . "/" . $day;
  //     $time = $hour . ":" . $min;
  //     $content = file_get_contents($path . $fileName);
  //     $rates = explode(',', $content);
  //     array_pop($rates);
  //     $count = count($rates);
  //     $total = 0;
  //     foreach ($rates as $rate) {
  //       $total += $rate;
  //     }
  //     $avg = $total / $count;
  //     printf("<tr> <td>%s</td> <td>%s</td> <td>%d</td> <td>%.2f</td> </tr>",
  //   $date, $time, $count, $avg);
  //   }
  // }
  //   closedir($dir);
  ?>

    </tbody>
  </table>
</body>
</html>