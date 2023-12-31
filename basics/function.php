<?php
declare(strict_types=1);//強い型指定
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


//関数のデフォルト値->nullも可能

// function defaultName($name = '本田'){
function defaultName($name = null){
  echo '私の名字は' . $name . 'です。';
}
echo "<br>";
defaultName();
echo "<br>";
defaultName('スズキ');


//引数の型を指定(タイプピンティング)
function typeText(string $str){
  echo $str . 'はstringです。';
}
echo '<br>';
typeText('この文字');
//stringではないので下記はエラー
// typeText(123);

//戻り値の型指定と可変引数
function combine(string ...$name): string
{
  $combinedName = '';
  for($i=0;$i<count($name);$i++){
    $combinedName .= $name[$i];
    if($i != count($name) - 1){
      $combinedName .= '.';
    }
  }
  return $combinedName;
}

echo combine('本田', '香川', '長友');
