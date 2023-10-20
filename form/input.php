<?php
//スーパーグローバル変数 9種類
//GETはURLに表示される
// if(!empty($_GET['name'])){
//   echo '<pre>';var_dump($_GET);echo '</pre>';
// }
//POSTはURLに表示されない
if(!empty($_POST['name'])){
  echo '<pre>';var_dump($_POST);echo '</pre>';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム</title>
</head>
<body>
  <!-- <form action="input.php" method="GET"> -->
  <form action="input.php" method="POST">
    <label for="name">氏名</label><br>
    <input type="text" name="name"><br>
    <label for="mail">メール</label><br>
    <input type="text" name="mail"><br>
    <label for="sports">スポーツ</label><br>
    <input type="checkbox" name="sports[]" value="野球">野球
    <input type="checkbox" name="sports[]" value="サッカー">サッカー
    <input type="checkbox" name="sports[]" value="バスケ">バスケ
    <br>
    <label for="contact">お問い合わせ</label><br>
    <textarea name="contact" id="" cols="30" rows="10"></textarea><br>
    <input type="submit" value="送信">
  </form>
</body>
</html>
