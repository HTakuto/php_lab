<?php
// DB接続
function insertContact($request){
  require('db_connection.php');
  $params = [
    'id' => null,
    'name' => $request['name'],
    'email' => $request['email'],
    'url' => $request['url'],
    'gender' => $request['gender'],
    'age' => $request['age'],
    'contact' => $request['contact'],
    'created_at' => null,
  ];

  $count = 0;
  $columns = '';
  $values = '';

  foreach(array_keys($params) as $key){
    if($count>0){
      $columns .=',';
      $values .=',';
    }
    $columns .= $key;
    $values .= ':' .$key;
    $count++;
  }
  $sql = 'insert into contact_form ('. $columns .')values('. $values .')'; 
  $stmt = $pdo->prepare($sql);//プリペアードステートメント
  $stmt->execute($params); //実行
}
