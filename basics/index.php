<?php
// でコメントアウト

/*
複数行のコメントアウト
は*と/を使う
*/

echo "数字と文字";
echo "<br>";
echo 123 . "半角のため数字として認識されます";
echo "<br>";
echo "１２３" . "半角でないと文字として認識されます";
echo "<br>";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

こちらはHTMLです。
<br>
  <!-- phpの書き方 -->
  <?php

  echo('こちらはPHPです。HTMLbody内にも書けます。');

  // phpのバージョンや設定を表示する関数
  phpinfo();

  ?>

</body>
</html>

