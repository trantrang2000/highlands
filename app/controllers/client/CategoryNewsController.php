<?php
include_once "app/models/CategoryModel.php";
include_once "app/models/NewsModel.php";

class CategoryNewsController extends BaseController
{
  public $categoryModel;
  public $newsModel;

  public function __construct()
  {
    $this->categoryModel = new CategoryModel();
    $this->newsModel = new NewsModel();

    $categoryId = $_GET['id'] ?? null;
    $whereSql = "where category_id = $categoryId";
    $page = $_GET['page'] ?? 1;
    $totalRecord = $this->newsModel->getRowCountNews($whereSql);
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
      'news' => $this->newsModel->getListNews($whereSql, "limit $start, $limit"),
      'page' => $page,
      'totalPage' => $totalPage,
    ];

    $this->setTemplate("client/category-news/index", $result);
    $this->setLayout("ClientLayout");
  }
}
