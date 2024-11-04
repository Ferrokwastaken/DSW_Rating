<?php
  namespace Dsw\Rating;

use DateTime;

  class StoreFile implements StoreInterface {
    public function addRate(int $rate)
    {
      $date = new DateTime();
      $path = '../data/';
      $filename = $path . $date->format('Y_m_d_H_i') . '.csv';
      file_put_contents($filename, $rate . ',', FILE_APPEND);
    }

    public function showStats(): array
    {
      return [];
    }
  }
?>