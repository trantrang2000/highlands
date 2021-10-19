<?php
include_once "app/models/BannerModel.php";

class BannerController extends BaseController
{
  public $bannerModel;
  public $pathList = "banners";
  public $pathForm = "banner";
  public $imageFolder = "banner";
  public $title = "Banners";

  public function __construct()
  {
    $this->bannerModel = new BannerModel();

    $action = $_GET['action'] ?? null;
    $id = $_GET['id'] ?? null;

    switch ($action) {
      case 'create':
        $this->redirectCreateBanner();
        break;
      case 'do_create':
        $this->createBanner();
        break;
      case 'show':
        $this->showBanner($id);
        break;
      case 'update':
        $this->updateBanner($id);
        break;
      case 'delete':
        $this->deleteBanner($id);
        break;
      default:
        $this->getListBanner();
        break;
    }
  }

  /**
   * Lấy danh sách phần tử
   */
  public function getListBanner()
  {
    $page = $_GET['page'] ?? 1;
    $keyword = $_POST['keyword'] ?? '';
    $totalRecord = $this->bannerModel->getRowCountBanner();
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
      'banners' => $this->bannerModel->getListBanner($keyword ? "where title like '%$keyword%' or link like '%$keyword%'" : '', "limit $start, $limit"),
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
  public function redirectCreateBanner()
  {
    $result = [
      'formAction' => "admin/$this->pathForm/do_create",
      'title' => $this->title,
      'pathForm' => $this->pathForm,
      'pathList' => $this->pathList,
    ];

    $this->setTemplate("admin/$this->pathForm/edit", $result);
    $this->setLayout('AdminNoSidebarLayout');
  }

  /**
   * Thêm phần tử
   */
  public function createBanner()
  {
    global $APP_URL;

    $thumbnail = null;

    if ($_FILES['thumbnail']['name'] != '') {
      $fileName = time() . $_FILES['thumbnail']['name'];
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "public/images/upload/$this->imageFolder/$fileName");
      $thumbnail = "public/images/upload/$this->imageFolder/" . $fileName;
    }

    $this->bannerModel->addNewBanner([
      'title' => $_POST['title'],
      'link' => $_POST['link'],
      'is_external' => $_POST['is_external'],
      'status' => $_POST['status'],
      'display_order' => $_POST['display_order'],
      'thumbnail' => $thumbnail,
    ]);

    header("location:$APP_URL/admin/$this->pathList/1");
  }

  /**
   * Hiển thị chi tiết phần tử
   */
  public function showBanner($id)
  {
    $result = [
      'formAction' => "admin/$this->pathForm/update/$id",
      'title' => $this->title,
      'detail' => $this->bannerModel->getDetailBanner($id),
      'pathForm' => $this->pathForm,
      'pathList' => $this->pathList,
    ];

    $this->setTemplate("admin/$this->pathForm/edit", $result);
    $this->setLayout('AdminNoSidebarLayout');
  }

  /**
   * Cập nhật phần tử
   */
  public function updateBanner($id)
  {
    global $APP_URL;

    if ($_FILES['thumbnail']['name'] != '') {
      $fileName = time() . $_FILES['thumbnail']['name'];
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "public/images/upload/$this->imageFolder/$fileName");
      $thumbnail = "public/images/upload/$this->imageFolder/" . $fileName;

      $this->bannerModel->updateBanner($id, [
        'thumbnail' => $thumbnail,
      ]);
    }

    $this->bannerModel->updateBanner($id, [
      'title' => $_POST['title'],
      'link' => $_POST['link'],
      'is_external' => $_POST['is_external'],
      'status' => $_POST['status'],
      'display_order' => $_POST['display_order'],
    ]);

    header("location:$APP_URL/admin/$this->pathList/1");
  }

  /**
   * Xoá phần tử
   */
  public function deleteBanner($id)
  {
    global $APP_URL;

    $this->bannerModel->deleteBanner($id);

    header("location:$APP_URL/admin/$this->pathList/1");
  }
}
