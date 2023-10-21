<?php

function validation($request){
  $errors = [];

  if(empty($request['name'])){
    $errors[] = '「氏名」は必須です。';
  }
  
  if(empty($request['name']) || 20 < mb_strlen($request['name'])){
    $errors[] = '「氏名」は20字以内で入力しください。';
  }

  if(empty($request['email'])){
    $errors[] = '「メールアドレス」は必須です。';
  }

  if(empty($request['email']) || !filter_var($request['email'], FILTER_VALIDATE_EMAIL)){
    $errors[] = '「メールアドレス」を正しい形式で入力してください。';
  }

  if(empty($request['url'])){
    $errors[] = '「ホームページ」は必須です。';
  }

  if(empty($request['url']) || !filter_var($request['url'], FILTER_VALIDATE_URL)){
    $errors[] = '「ホームページ」を正しい形式で入力してください。';
  }

  if(!isset($request['gender'])){
    $errors[] = '「性別」は必須です。';
  }

  if(empty($request['age']) || 6 < $request['age']){
    $errors[] = '「年齢」は必須です。';
  }

  if(empty($request['contact'])){
    $errors[] = '「お問い合わせ」は必須です。';
  }

  if(empty($request['contact']) || 200 <mb_strlen($request['contact'])){
    $errors[] = '「お問い合わせ」は200字以内で入力しください。';
  }

  if(empty($request['caution'])){
    $errors[] = '「注意事項」をご確認してください。';
  }

  return $errors;
}

?>
