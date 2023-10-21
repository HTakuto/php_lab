<?php

class Product {
  //アクセス修飾子, private(このクラス), protected(このクラスと継承クラス), public(全体のクラス)

  //プロパティ(変数)
  private $product = [];

  //メソッド(関数)

  // __constructはクラスをインスタンス化した初回に実行される
  function __construct($product){
    $this->product = $product;
  }

  public function getProduct(){
    echo $this->product;
  }

  public function addProduct($item){
    $this->product .= $item;
  }

  // static = 静的
  public static function getStaticProduct($str){
    echo $str;
  }
}
// newでインスタンス化
$instance = new Product('テスト');

$instance->getProduct();
echo '<br>';

$instance->addProduct('追加');
echo '<br>';

$instance->getProduct();
echo '<br>';


// 静的(static)クラス名::インスタンス名
// インスタンス化せず使用可能
Product::getStaticProduct('静的');

