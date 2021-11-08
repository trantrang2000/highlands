<?php
include_once "app/models/BannerModel.php";
include_once "app/models/CollectionModel.php";
include_once "app/models/ProductModel.php";

class HomeController extends BaseController
{
  public $bannerModel;
  public $collectionModel;
  public $productModel;

  public function __construct()
  {
    $this->bannerModel = new BannerModel();
    $this->collectionModel = new CollectionModel();
    $this->productModel = new ProductModel();

    $result = [
      'banners' => $this->bannerModel->getListBanner("where status = 1"),
      'collections' => $this->collectionModel->getListCollection("where status = 1"),
      'hotProducts' => $this->productModel->getListProduct("where status = 1 and is_hot = 1"),
      'salesProducts' => $this->productModel->getListProduct("where status = 1 and price < original_price")
    ];

    $this->setTemplate("client/home/index", $result);
    $this->setLayout("ClientLayout");
  }
}
