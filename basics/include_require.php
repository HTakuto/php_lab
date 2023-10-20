<?php
// require();//エラーが表示される 処理が止まる
// include();//警告 処理が止まらない
require 'test.php';

echo $commonVariable;
commonTest();

echo __DIR__;//ファイルのディレクトリまでを表示
echo __FILE__;//ファイルまでのパスを表示
