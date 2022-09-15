<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Тест по тогызкумалаку, тогыз кумалак, тогуз коргооль">
    <link rel="stylesheet" href="css/styles.css">
    <title>Togyz Kumalak Quiz</title>
</head>
<body>
<p class="center-img">
    <img src="img/header.jpg" width="367" height="220">
</p>

<h1>Togyz Kumalak Quiz / Тест по тогызкумалаку</h1>

<form action="result.php" method="post">
    <ol>
<?php
  require 'connection.php';
  $stm = $pdo->query('SELECT * from fragen');
  $rows = $stm->fetchAll(PDO::FETCH_NUM);

  foreach ($rows as $row) {
      echo '<li>';
      echo '<h4>' . $row[1] . '</h4>';

      for ($j=1; $j<=4; $j++) {
          echo '<div>';
          echo '<input type="radio" name="question-' . $row[0] . '" value="' . $j. '" />'
              . $row[2+$j];
          echo '</div>';
      }

      echo '</li>';
  }

?>
    </ol>
    <button type="submit" name="sendResult">Готово!</button>
</form><br>

</body>
</html>
