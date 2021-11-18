<?php
include_once "app/models/CategoryModel.php";
include_once "app/models/ProductModel.php";

class CategoryProductController extends BaseController
{
  public $categoryModel;
  public $productModel;

  public function __construct()
  {
    $this->categoryModel = new CategoryModel();
    $this->productModel = new ProductModel();

    $categoryId = $_GET['id'] ?? null;
    $sortBy = $_POST['sortBy'] ?? "id desc";
    $whereSql = "where category_id = $categoryId and status = 1";
    $page = $_GET['page'] ?? 1;
    $totalRecord = $this->productModel->getRowCountProduct($whereSql);
    $limit = 12;
    $totalPage = ceil($totalRecord / $limit);

    if ($page > $totalPage) {
      $page = $totalPage;
    } else if ($page < 1) {
      $page = 1;
    }

    $start = ($page - 1) * $limit;
    $end = $limit + $start;
    if ($end > $totalRecord) {
      $end = $totalRecord;
    }

    $result = [
      'category' => $this->categoryModel->getDetailCategory($categoryId),
      'products' => $this->productModel->getListProduct($whereSql, "limit $start, $limit", $sortBy),
      'page' => $page,
      'totalPage' => $totalPage,
      'sortBy' => $sortBy
    ];

    $this->setTemplate("client/category-product/index", $result);
    $this->setLayout("ClientLayout");
  }
}
