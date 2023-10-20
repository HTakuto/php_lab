<?php
//繰り返し
$members = [
  'name' => '本田',
  'height' => 170,
  'hobby' => '野球'
];

//バリューのみ
foreach($members as $member) {
  echo $member;
}

//キーとバリューそれぞれ表示
foreach($members as $key => $value) {
  echo $key . "は" . $value . "です。";
}

$members_2 = [
  '本田' =>[
    'height' => 170,
    'hobby' => '野球'
  ],
  '香川' =>[
    'height' => 172,
    'hobby' => 'サッカー'
  ],
];

//多段階の配列はforeachを繰り返す
foreach($members_2 as $member) {
  foreach($member as $key => $value){
    echo $key . "は" . $value . "です。";
  }
}


//for 繰り返す数が決まってる
for($i=0; $i < 10; $i++){
  // if($i===5){
  //   break;
  // }
  echo $i;
}

// while繰り返す数が決まっていない
$j = 0;
while($j < 5){
  echo $j;
  $j++;
}

// switch 基本使わない
$date = 2;
switch($date){ //型は確認しない==
  case 1:
    echo "1です。";
    break;
  case 2:
    echo "2です。";
    break;
  case 3:
    echo "3です。";
    break;
  default:
    echo "1~3ではありません。";
}
