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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title  le>お問い合わせフォーム</title>
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
  <div class="container">
    <div class="row">
      <div class="col-md-6">
      <form action="input.php" method="POST">
        <div class="form-group">
          <label for="name">氏名</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php if(!empty($_POST['name'])){echo h($_POST['name']);} ?>" required>
        </div>
        <div class="form-group">
          <label for="email">メール</label>
          <input type="text" class="form-control" id="email" name="email" value="<?php if(!empty($_POST['email'])){echo h($_POST['email']);} ?>" required>
        </div>
        <div class="form-group">
          <label for="url">ホームページ</label>
          <input type="url" class="form-control" id="url" name="url" value="<?php if(!empty($_POST['url'])){echo h($_POST['url']);} ?>" required>
        </div>
        <div class="form-check form-check-inline">
          <label for="gender">性別
          <input type="radio" class="form-check-input" id="gender1" name="gender" value="0" <?php if(isset($_POST['gender']) && $_POST['gender'] === '0'){echo 'checked';}?>>
          <label for="gender1" class="form-check-label">男性</label>
          <input type="radio" class="form-check-input" id="gender2" name="gender" value="1" <?php if(isset($_POST['gender']) && $_POST['gender'] === '1'){echo 'checked';}?>>
          <label for="gender2" class="form-check-label">女性</label>
        </div>
        <div class="form-group">
          <label for="age">年齢</label>
          <select class="form-control" id="age" name="age">
            <option value="">選択してください</option>
            <option value="1" <?php if(!isset($_POST['age']) && $_POST['age']=== '1'){echo 'selected';}?>>~19歳</option>
            <option value="2"<?php if(!isset($_POST['age']) && $_POST['age']=== '2'){echo 'selected';}?>>20~29歳</option>
            <option value="3"<?php if(!isset($_POST['age']) && $_POST['age']=== '3'){echo 'selected';}?>>30~39歳</option>
            <option value="4"<?php if(!isset($_POST['age']) && $_POST['age']=== '4'){echo 'selected';}?>>40~49歳</option>
            <option value="5"<?php if(!isset($_POST['age']) && $_POST['age']=== '5'){echo 'selected';}?>>50~59歳</option>
            <option value="6"<?php if(!isset($_POST['age']) && $_POST['age']=== '6'){echo 'selected';}?>>60歳~</option>
          </select>
        </div>
        <div class="form-group">
          <label for="contact">お問い合わせ</label>
          <textarea name="contact" class="form-control" id="contact" row="3"><?php if(!empty($_POST['contact'])){echo h($_POST['contact']);} ?></textarea>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="caution" name="caution" value="1">
          <label for="form-check-label" for=""caution>注意事項にチェックする</label>
        </div>
        <input type="hidden" name="csrf" value="<?php echo h($token); ?>">
        <input type="submit" class="btn btn-primary" name="btn_confirm" value="確認">
      </form>
      </div>
    </div>
  </div>
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
        <input type="submit" class="btn btn-primary" name="back" value="戻る">
        <input type="submit" class="btn btn-primary" name="btn_submit" value="送信">
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
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
