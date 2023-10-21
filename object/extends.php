<?php
// 親クラス
// finalをつけると継承できないクラスになる
// final class BaseProduct{
class BaseProduct{
  public function echoProduct(){
    echo '親クラス';
  }

  // オーバーライド
  public function overProduct(){
    echo "親は表示されません。";
  }
}

// 子クラス
class Product extends BaseProduct {
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

  // オーバーライド
  public function overProduct(){
    echo "子のが表示される";
  }
}
// newでインスタンス化
$instance = new Product('テスト');

//親クラスのメソッド
$instance->echoProduct();

//子メソッドが実行される
$instance->overProduct();

