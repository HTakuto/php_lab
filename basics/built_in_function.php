<?php
//文字列の長さ
$text = "abc";
echo strlen($text);
echo '<br>';

//日本語文字列の長さ
$text = "この文字列の長さわかりますか？";
echo mb_strlen($text);

//文字列の置換
$str = '文字列をおきかえます';
echo str_replace('おきかえ', '置き換え', $str);

//指定文字列で分割
$greetings = 'おはよう、こんにちは、こんばんわ';

$greeting = explode('、', $greetings);

echo $greeting[0];
echo $greeting[1];
echo $greeting[2];

//配列内の文字列を繋げる
$array = ["a", "b", "c"];
echo implode("と", $array);

//正規表現
//1が一致
//0は不一致
$str = '特定の文字列が含まれるか確認する。';
echo preg_match('/文字列/', $str);
echo "<br>";

// 指定文字列から文字列を取得する
echo substr('abcde', -1); //e
echo "<br>";
echo substr('abcde', 1); //bcde
echo "<br>";
echo substr('abcde', 2); //cde
echo "<br>";

// 指定文字列から日本語文字列を取得する
echo mb_substr('あいうえお', 1); //いうえお
echo "<br>";
echo mb_substr('あいうえお', -2); //いうえお
echo "<br>";

// 配列に配列を追加する
$array = ['りんご', 'みかん'];
array_push($array, 'ぶどう', 'なし');
var_dump($array);
echo "<br>";

// 自作関数
$postalCode = '123-4567';
// キャメルケース
function checkPostalCode($num){
  $replaced = str_replace('-', '',$num);
  $length = strlen($replaced);
  // var_dump($length);
  if($length === 7){
    return true;
  }
  return false;
}
var_dump(checkPostalCode($postalCode));

// スネークケース
// check_postal_code();
