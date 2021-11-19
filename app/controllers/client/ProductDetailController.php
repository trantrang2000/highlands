<?php
include_once "app/models/ProductModel.php";
include_once "app/models/ProductImageModel.php";
include_once "app/models/CategoryModel.php";

class ProductDetailController extends BaseController
{
  public $productModel;
  public $productImageModel;
  public $categoryModel;

  public function __construct()
  {
    $this->categoryModel = new CategoryModel();
    $this->productModel = new ProductModel();
    $this->productImageModel = new ProductImageModel();

    $productId = $_GET['id'] ?? null;

    $product = $this->productModel->getDetailProduct($productId);

    $result = [
      'product' => $product,
      'category' => $this->categoryModel->getDetailCategory($product->category_id),
      'images' => $this->productImageModel->getListProductImage("where product_id = $product->id")
    ];

    $this->setTemplate("client/product-detail/index", $result);
    $this->setLayout("ClientLayout");
  }
}
