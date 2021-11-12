<?php
include_once "app/models/ProductModel.php";

class SearchController extends BaseController
{
  public $productModel;

  public function __construct()
  {
    $this->productModel = new ProductModel();

    $keyword = $_POST['keyword'] ?? "";

    $result = [
      'products' => $this->productModel->getListProduct("where title like '%$keyword%'"),
      'keyword' => $keyword
    ];

    $this->setTemplate("client/search/index", $result);
    $this->setLayout("ClientLayout");
  }
}
