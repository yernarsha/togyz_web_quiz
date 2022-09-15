<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toguz Kumalak results</title>
</head>
<body>

<h1>Результаты тестирования</h1>
<?php
  $answers = [];
  foreach ($_POST as $key=>$value) {
      if (strpos($key, 'question-') !== false) {
          $index = intval(substr($key, 9));
          $val = intval($value);
          $answers[$index] = $val;
      }
  }

  $i = $correct = 0;
  $wrong = [];
  $questions = [];

  require 'connection.php';
  $stm = $pdo->query('SELECT * from fragen');
  $rows = $stm->fetchAll(PDO::FETCH_NUM);

  foreach ($rows as $row) {
      $questions[$row[0]] = $row[1];
      if (array_key_exists($row[0], $answers)) {
          $i++;
          if ($answers[$row[0]] === $row[2]) {
              $correct++;
          } else {
              $wrong[] = $row[0];
          }
      }
  }

  echo '<h4>Правильно: ' . $correct . ' из ' . $i . '</h4>';

  if (count($wrong) > 0) {
      echo '<h5>Неверные ответы были даны на вопросы:</h5>';

      foreach ($wrong as $wr) {
          echo $questions[$wr] . '<br>';
      }
  }
?>

</body>
</html>
