<?php

require 'db_connection.php';

//ユーザー入力無し query
// $sql = 'select * from contact_form where id = 2'; //sql文
// $stmt = $pdo->query($sql); //sql実行

//ユーザー入力有り prepare, bind, execute
$sql = 'select * from contact_form where id = :id'; //名前付きプレースホルダー
// $stmt = $pdo->prepare($sql);//プリペアードステートメント
// $stmt->bindValue('id', 2, PDO::PARAM_INT);// 紐づけ
// $stmt->execute(); //実行

// $result = $stmt->fetchAll();
// echo '<pre>';var_dump($result);echo '</pre>';exit;

// トランザクション まとまった処理 beginTransaction, commit, rollback

$pdo->beginTransaction();
try{
  $stmt = $pdo->prepare($sql);//プリペアードステートメント
  $stmt->bindValue('id', 2, PDO::PARAM_INT);// 紐づけ
  $stmt->execute(); //実行

// ~処理(中略)~
  $result = $stmt->fetchAll();
  echo '<pre>';var_dump($result);echo '</pre>';
  $pdo->commit();//try内の全てを実行
} catch(PDOException $e) {
  $pdo->rollback();//更新のキャンセル
}
