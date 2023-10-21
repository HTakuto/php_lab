<?php
session_start();
//クリックジャッキング対策
header('X-FRAME-OPTIONS: DENY');
//スーパーグローバル変数 9種類
//GETはURLに表示される
// if(!empty($_GET['name'])){
//   echo '<pre>';var_dump($_GET);echo '</pre>';
// }
//POSTはURLに表示されない
// if(!empty($_POST['name'])){
//   echo '<pre>';var_dump($_POST);echo '</pre>';
// }

//ページの切り替え
//初期は入力画面
$pageFlag = 0;
//確認画面
if(!empty($_POST["btn_confirm"])){
  $pageFlag = 1;
}
//完了画面
if(!empty($_POST["btn_submit"])){
  $pageFlag = 2;
}

//<script>alert('xssが必要です');</script>
//XSS対策
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
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
  <!-- 入力画面 -->
  <?php if($pageFlag === 0) : ?>
  <!-- CSRF対策 -->
  <?php 
    if(!isset($_SESSION['csrfToken'])){
      $csrfToken = bin2hex(random_bytes(32)); 
      $_SESSION['csrfToken'] = $csrfToken;
    }
    $token = $_SESSION['csrfToken'];
  ?>
    <h1>入力画面</h1>
    <!-- <form action="input.php" method="GET"> -->
    <form action="input.php" method="POST">
      <label for="name">氏名</label><br>
      <input type="text" name="name" value="<?php if(!empty($_POST['name'])){echo h($_POST['name']);} ?>"><br>
      <label for="email">メール</label><br>
      <input type="text" name="email" value="<?php if(!empty($_POST['email'])){echo h($_POST['email']);} ?>"><br>
      <label for="contact">お問い合わせ</label><br>
      <textarea name="contact" id="" cols="30" rows="10"><?php if(!empty($_POST['contact'])){echo h($_POST['contact']);} ?></textarea><br>
      <input type="hidden" name="csrf" value="<?php echo h($token); ?>">
      <input type="submit" name="btn_confirm" value="確認">
    </form>
  <?php endif; ?>
  <!-- 確認画面 -->
  <?php if($pageFlag === 1) :?>
    <?php if($_SESSION['csrfToken'] === $_POST['csrf']) :?>
      <h1>確認画面</h1>
      <p>氏名</p>
      <?php echo h($_POST['name']); ?>
      <p>メール</p>
      <?php echo h($_POST['email']); ?>
      <p>お問い合わせ</p>
      <?php echo h($_POST['contact']); ?>
      <form action="input.php" method="POST">
        <input type="submit" name="back" value="戻る"><br>
        <input type="submit" name="btn_submit" value="送信">
        <input type="hidden" name="name" value="<?php echo h($_POST['name']); ?>">
        <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
        <input type="hidden" name="contact" value="<?php echo h($_POST['contact']); ?>">
        <input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
      </form>
    <?php endif ;?>
  <?php endif ;?>
  <!-- 完了画面 -->
  <?php if($pageFlag === 2) :?>
    <?php if($_SESSION['csrfToken'] === $_POST['csrf']) :?>
      <h1>完了画面</h1>
      送信完了
      <?php unset($_SESSION['csrfToken']); ?>
    <?php endif; ?>
  <?php endif ;?>
</body>
</html>
