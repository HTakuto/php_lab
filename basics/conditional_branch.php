<?php

$average_height = 172;
$your_height = 172;

if($your_height === $average_height){
  echo "あなたの身長は平均身長です。";
} elseif($your_height <= $average_height){
  echo "あなたの身長は平均身長以下です。";
} else {
  echo "あなたの身長は平均身長以上です。";
}
echo '<br>';

// == 一致
// === 型も一致
// < より大きい
// > より小さい
// <= 以上
// >= 以下

//スピード違反検査'
$signal = 'blue';
$speed = 60;

if($signal === 'blue') {
  if($speed <= 60){ //ネスト
    echo "スピード違反ではありません。";
  }
} 

//ネストとelseは可読性を低めるため、使うのは避けるべきである。

$height = 191;
if($height !== 190){ //!は否定の意味〜でなければ
  echo "身長が190cmではありません。";
}

$test = "";

if(empty($test)){
  echo '$testは空です。';
}

if(!empty($test)){
  echo '$testは空ではありません。';
}

// ANDとOR
$color = 'red';
$color_2 = 'blue';

if($color === 'red' && $color_2 === 'blue') {
  echo '赤と青が揃ってます。';
}

$color = 'red';
$color_2 = 'yellow';

if($color === 'red' || $color_2 === 'blue') {
  echo '赤か青のどちらかがあります。';
}
