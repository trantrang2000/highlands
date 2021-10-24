<?php
include_once "app/models/NewsModel.php";
include_once "app/models/CategoryModel.php";

class NewsController extends BaseController
{
  public $newsModel;
  public $categoryModel;
  public $pathList = "news";
  public $pathForm = "news";
  public $imageFolder = "news";
  public $title = "Tin tức";

  public function __construct()
  {
    $this->newsModel = new NewsModel();
    $this->categoryModel = new CategoryModel();

    $action = $_GET['action'] ?? null;
    $id = $_GET['id'] ?? null;

    switch ($action) {
      case 'create':
        $this->redirectCreateNews();
        break;
      case 'do_create':
        $this->createNews();
        break;
      case 'show':
        $this->showNews($id);
        break;
      case 'update':
        $this->updateNews($id);
        break;
      case 'delete':
        $this->deleteNews($id);
        break;
      default:
        $this->getListNews();
        break;
    }
  }

  /**
   * Lấy danh sách phần tử
   */
  public function getListNews()
  {
    $page = $_GET['page'] ?? 1;
    $keyword = $_POST['keyword'] ?? '';
    $totalRecord = $this->newsModel->getRowCountNews();
    $limit = 10;
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
      'news' => $this->newsModel->getListNews("where title like '%$keyword%'", "limit $start, $limit"),
      'page' => $page,
      'totalPage' => $totalPage,
      'totalRecord' => $totalRecord,
      'limit' => $limit,
      'start' => $start,
      'end' => $end,
      'pathList' => $this->pathList,
      'pathForm' => $this->pathForm,
      'title' => $this->title,
      'keyword' => $keyword
    ];

    $this->setTemplate("admin/$this->pathForm/index", $result);
    $this->setLayout('AdminLayout');
  }

  /**
   * Mở trang thêm phần tử
   */
  public function redirectCreateNews()
  {
    $result = [
      'formAction' => "admin/$this->pathForm/do_create",
      'title' => $this->title,
      'pathForm' => $this->pathForm,
      'pathList' => $this->pathList,
      'categories' => $this->categoryModel->getListCategory("where type = 2"),
    ];

    $this->setTemplate("admin/$this->pathForm/edit", $result);
    $this->setLayout('AdminNoSidebarLayout');
  }

  /**
   * Thêm phần tử
   */
  public function createNews()
  {
    global $APP_URL;

    $thumbnail = null;

    if ($_FILES['thumbnail']['name'] != '') {
      $fileName = time() . $_FILES['thumbnail']['name'];
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "public/images/upload/$this->imageFolder/$fileName");
      $thumbnail = "public/images/upload/$this->imageFolder/" . $fileName;
    }

    $this->newsModel->addNewNews([
      'title' => $_POST['title'],
      'description' => $_POST['description'],
      'content' => $_POST['content'],
      'author' => $_POST['author'],
      'source' => $_POST['source'],
      'category_id' => $_POST['category_id'],
      'thumbnail' => $thumbnail,
    ]);

    header("location:$APP_URL/admin/$this->pathList/1");
  }

  /**
   * Hiển thị chi tiết phần tử
   */
  public function showNews($id)
  {
    $result = [
      'formAction' => "admin/$this->pathForm/update/$id",
      'title' => $this->title,
      'detail' => $this->newsModel->getDetailNews($id),
      'pathForm' => $this->pathForm,
      'pathList' => $this->pathList,
      'categories' => $this->categoryModel->getListCategory("where type = 2"),
    ];

    $this->setTemplate("admin/$this->pathForm/edit", $result);
    $this->setLayout('AdminNoSidebarLayout');
  }

  /**
   * Cập nhật phần tử
   */
  public function updateNews($id)
  {
    global $APP_URL;

    if ($_FILES['thumbnail']['name'] != '') {
      $fileName = time() . $_FILES['thumbnail']['name'];
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "public/images/upload/$this->imageFolder/$fileName");
      $thumbnail = "public/images/upload/$this->imageFolder/" . $fileName;

      $this->newsModel->updateNews($id, [
        'thumbnail' => $thumbnail,
      ]);
    }

    $this->newsModel->updateNews($id, [
      'title' => $_POST['title'],
      'description' => $_POST['description'],
      'content' => $_POST['content'],
      'author' => $_POST['author'],
      'source' => $_POST['source'],
      'category_id' => $_POST['category_id'],
    ]);

    header("location:$APP_URL/admin/$this->pathList/1");
  }

  /**
   * Xoá phần tử
   */
  public function deleteNews($id)
  {
    global $APP_URL;

    $this->newsModel->deleteNews($id);

    header("location:$APP_URL/admin/$this->pathList/1");
  }
}
