<?php
session_start();
//クリックジャッキング対策
header('X-FRAME-OPTIONS: DENY');
//バリデーション読み込み
require('validation.php');
//スーパーグローバル変数 9種類
//GETはURLに表示される
// if(!empty($_GET)){
//   echo '<pre>';var_dump($_GET);echo '</pre>';
// }
//POSTはURLに表示されない
// if(!empty($_POST)){
//   echo '<pre>';var_dump($_POST);echo '</pre>';
// }

//ページの切り替え
//初期は入力画面
$pageFlag = 0;
$errors = validation($_POST);
//確認画面
if(!empty($_POST["btn_confirm"]) && empty($errors)){
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
    <?php if(!empty($errors) && !empty($_POST['btn_confirm'])):?>
      <?php echo '<ul>' ;?>
        <?php
          foreach($errors as $error){
            echo '<li>' . $error . '</li>';
          }
        ?>
      <?php echo '</ul>' ;?>
    <?php endif; ?>
    <!-- <form action="input.php" method="GET"> -->
    <form action="input.php" method="POST">
      <label for="name">氏名</label><br>
      <input type="text" name="name" value="<?php if(!empty($_POST['name'])){echo h($_POST['name']);} ?>"><br>
      <label for="email">メール</label><br>
      <input type="text" name="email" value="<?php if(!empty($_POST['email'])){echo h($_POST['email']);} ?>"><br>
      <label for="url">ホームページ</label><br>
      <input type="url" name="url" value="<?php if(!empty($_POST['url'])){echo h($_POST['url']);} ?>"><br>
      <label for="gender">性別</label><br>
      <input type="radio" name="gender" value="0" <?php if(isset($_POST['gender']) && $_POST['gender'] === '0'){echo 'checked';}?>>男性
      <input type="radio" name="gender" value="1" <?php if(isset($_POST['gender']) && $_POST['gender'] === '1'){echo 'checked';}?>>女性<br>
      <label for="age">年齢</label><br>
      <select name="age">
        <option value="">選択してください</option>
        <option value="1" <?php if(!isset($_POST['age']) && $_POST['age']=== '1'){echo 'selected';}?>>~19歳</option>
        <option value="2"<?php if(!isset($_POST['age']) && $_POST['age']=== '2'){echo 'selected';}?>>20~29歳</option>
        <option value="3"<?php if(!isset($_POST['age']) && $_POST['age']=== '3'){echo 'selected';}?>>30~39歳</option>
        <option value="4"<?php if(!isset($_POST['age']) && $_POST['age']=== '4'){echo 'selected';}?>>40~49歳</option>
        <option value="5"<?php if(!isset($_POST['age']) && $_POST['age']=== '5'){echo 'selected';}?>>50~59歳</option>
        <option value="6"<?php if(!isset($_POST['age']) && $_POST['age']=== '6'){echo 'selected';}?>>60歳~</option>
      </select>
      <br>
      <label for="contact">お問い合わせ</label><br>
      <textarea name="contact" id="" cols="30" rows="10"><?php if(!empty($_POST['contact'])){echo h($_POST['contact']);} ?></textarea><br>
      <input type="checkbox" name="caution" value="1">注意事項にチェックする<br>
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
      <p>ホームページ</p>
      <?php echo h($_POST['url']); ?>
      <p>性別</p>
      <?php 
        if($_POST['gender'] === '0'){echo '男性';} 
        if($_POST['gender'] === '1'){echo '女性';} 
      ?>
      <p>年齢</p>
      <?php 
        if($_POST['age'] === '1'){echo '~19歳';} 
        if($_POST['age'] === '2'){echo '20~29歳';} 
        if($_POST['age'] === '3'){echo '30~39歳';} 
        if($_POST['age'] === '4'){echo '40~49歳';} 
        if($_POST['age'] === '5'){echo '50~59歳';} 
        if($_POST['age'] === '6'){echo '60歳~';} 
      ?>
      <p>お問い合わせ</p>
      <?php echo h($_POST['contact']); ?>
      <form action="input.php" method="POST">
        <input type="submit" name="back" value="戻る"><br>
        <input type="submit" name="btn_submit" value="送信">
        <input type="hidden" name="name" value="<?php echo h($_POST['name']); ?>">
        <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
        <input type="hidden" name="url" value="<?php echo h($_POST['url']); ?>">
        <input type="hidden" name="gender" value="<?php echo h($_POST['gender']); ?>">
        <input type="hidden" name="age" value="<?php echo h($_POST['age']); ?>">
        <input type="hidden" name="contact" value="<?php echo h($_POST['contact']); ?>">
        <input type="hidden" name="caution" value="<?php echo h($_POST['caution']); ?>">
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
