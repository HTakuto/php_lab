<?php
$globalVariable = 'グローバル変数';

function checkScope() {
  $localVariable = 'ローカル変数';
  echo $localVariable;
  // echo $globalVariable;//表示されない
  // global $globalVariable; //表示されるがあまり使わず引数で表示◯
  // echo $globalVariable;
}

echo $globalVariable;
// echo $localVariable; //表示されない

echo checkScope();
