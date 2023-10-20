<?php

//配列(1行)
$array = [1,2,3,'文字も入る'];

//arrayと表示される
echo $array;
echo '<br>';

//0が配列の1番目を表す
echo $array[0];
echo '<br>';

//全体を確認したい場合はvar_dump()
echo '<pre>';var_dump($array);echo '</pre>';

// 配列(2行)
$array_2 = [
  ['赤','青','緑'],
  ['黄','紫','黒']
];

//赤を表示
echo $array_2[0][0];
echo '<br>';
//黒を表示
echo $array_2[1][2];

//全体を確認したい場合は同じくvar_dump()
echo '<pre>';var_dump($array_2);echo '</pre>';

//連想配列
$array_member = [
  'name' => '本田',
  'height' => 170,
  'hobby' => '野球',
];

echo $array_member['name'];


$array_school = [
  '東京高校' => [
    '1年' => [
      '1組' => [
        '1番' => [
          'name' => '本田',
          'height' => 170,
          'hobby' => '野球',
        ],
      ],
      '2組' => [

      ],
      '3組' => [

      ],
    ],
    '2年' => [
      '1組' => [

      ],
      '2組' => [

      ],
      '3組' => [

      ],
    ],
    '3年' => [
      '1組' => [

      ],
      '2組' => [

      ],
      '3組' => [

      ],
    ],
  ],
  '宮城高校' => [

  ]
];

// echo $array_school['東京高校']['1年']['1組']['1番']['name'];
echo '<pre>';var_dump($array_school);echo '</pre>';exit;
