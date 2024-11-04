<?php
  namespace Dsw\Rating;

  use PDO;

  class StoreDB implements StoreInterface {
    private PDO $link;
    public function __construct($host, $user, $password, $db)
    {
      $dsn = "mysql:host=$host;dbname=$db";
      $this->link = new PDO($dsn, $user, $password);
    }

    public function addRate(int $rate)
    {
      $this->link->exec("INSERT INTO rates (date, rate) VALUES (NOW(), $rate)");
    }

    public function showStats(): array
    {
      $results = $this->link->query('SELECT DATE_FORMAT(date, "%Y-%c-%d") AS day, DATE_FORMAT(date, "%H:%i"), COUNT(rate) AS count, avg(rate) AS average FROM rates GROUP BY day, time');
      return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __destruct()
    {
      unset($this->link);
    }
  }
?>