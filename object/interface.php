<?php
// インターフェース
// abstractと同じく強制
interface ProductInterface{
  //使用するメソッドしかかけない
  public function getProduct();
}

interface NewsInterface{
  public function getNews();
}

// 複数継承可能
class Product implements ProductInterface, NewsInterface {
  public function getProduct(){
    echo 'getProductです。';
  }

  public function getNews(){
    echo 'getNewsです。';
  }
}
// インスタンス化
$instance = new Product();

//  ProductInterface, NewsInterfaceが実行されていないとエラー

$instance->getProduct();
$instance->getNews();
