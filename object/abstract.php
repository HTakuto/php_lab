<?php
// 抽象クラス //設定するメソッドを強制
abstract class ProductAbstract{
  public function echoProduct(){
    echo '抽象クラス';
  }

  // 抽象メソッド 絶対に使用しなければならないメソッド
  abstract public function overProduct();
}

// 子クラス
class Product extends ProductAbstract {
  public function overProduct(){
    echo "使用しないとエラーになります。";
  }
}

// インスタンス化
$instance = new Product();

//子メソッドが実行される
$instance->overProduct();

