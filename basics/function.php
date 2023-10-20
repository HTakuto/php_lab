<?php
/*
function test(仮引数){
  処理
  return 戻り値
}

test(実引数)
*/

//引数戻り値無し
function test() {
  echo 'テスト';
}

test();
echo '<br>';

//引数有り戻り値無し
function getComment($string) {
  echo $string;
}

getComment('コメント');
echo '<br>';

$number = 2;

function getNumber($num){
  echo $num;
}

getNumber($number);
echo '<br>';

//引数戻り値あり
function getNumberOfComment(){
  return 5;
}
echo getNumberOfComment();
echo '<br>';

//関数を変数にすることもできる
$get_number = getNumberOfComment();
echo $get_number;
echo '<br>';

//引数2つ戻り値あり
function sumPrice($int, $int2){
  $int3 = $int + $int2;
  return $int3;
}

$total = sumPrice(1,2);

echo $total;
