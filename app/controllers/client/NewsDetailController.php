<?php
include_once "app/models/NewsModel.php";
include_once "app/models/CategoryModel.php";

class NewsDetailController extends BaseController
{
  public $newsModel;
  public $categoryModel;

  public function __construct()
  {
    $this->categoryModel = new CategoryModel();
    $this->newsModel = new NewsModel();

    $id = $_GET['id'] ?? null;

    $news = $this->newsModel->getDetailNews($id);

    $result = [
      'news' => $news,
      'category' => $this->categoryModel->getDetailCategory($news->category_id),
    ];

    $this->setTemplate("client/news-detail/index", $result);
    $this->setLayout("ClientLayout");
  }
}
