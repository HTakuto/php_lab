<?php
  session_start();

// クッキーの有効期限を設定（15分）
// $expiration_time = time() + 900; // 900秒 = 15分

// クッキーを設定
// setcookie("cookie", "aaa", $expiration_time, "/");

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  //訪問したことがない場合
  if(!isset($_SESSION['visited'])){
    echo '初回訪問です。';

    $_SESSION['visited'] = 1;
    $_SESSION['date'] = date('c');
  } else {
    $visited = $_SESSION['visited'];
    $visited++;
    $_SESSION['visited'] = $visited;

    echo $_SESSION['visited'] . '回目の訪問です。';

    if(isset($_SESSION['date'])){
      echo '前回訪問は' . $_SESSION['date'].'です。';
      $_SESSION['date'] = date('c');
    }

    echo '<pre>';var_dump($_SESSION);echo '</pre>';
    echo '<pre>';var_dump($_COOKIE);echo '</pre>';exit;
  }
?>
</body>
</html>
