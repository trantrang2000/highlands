<?php
include_once "app/models/CategoryModel.php";

class CategoryProductController extends BaseController
{
  public $categoryModel;
  public $pathList = "categories-product";
  public $pathForm = "category-product";
  public $imageFolder = "category";
  public $title = "Danh mục sản phẩm";

  public function __construct()
  {
    $this->categoryModel = new CategoryModel();

    $action = $_GET['action'] ?? null;
    $id = $_GET['id'] ?? null;

    switch ($action) {
      case 'create':
        $this->redirectCreateCategoryProduct();
        break;
      case 'do_create':
        $this->createCategoryProduct();
        break;
      case 'show':
        $this->showCategoryProduct($id);
        break;
      case 'update':
        $this->updateCategoryProduct($id);
        break;
      case 'delete':
        $this->deleteCategoryProduct($id);
        break;
      default:
        $this->getListCategoryProduct();
        break;
    }
  }

  /**
   * Lấy danh sách phần tử
   */
  public function getListCategoryProduct()
  {
    $page = $_GET['page'] ?? 1;
    $keyword = $_POST['keyword'] ?? '';
    $totalRecord = $this->categoryModel->getRowCountCategory();
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
      'categories' => $this->categoryModel->getListCategory("where type = 1 and title like '%$keyword%'", "limit $start, $limit"),
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
  public function redirectCreateCategoryProduct()
  {
    $result = [
      'formAction' => "admin/$this->pathForm/do_create",
      'title' => $this->title,
      'pathForm' => $this->pathForm,
      'pathList' => $this->pathList,
      'categories' => $this->categoryModel->getListCategory("where type = 1"),
    ];

    $this->setTemplate("admin/$this->pathForm/edit", $result);
    $this->setLayout('AdminNoSidebarLayout');
  }

  /**
   * Thêm phần tử
   */
  public function createCategoryProduct()
  {
    global $APP_URL;

    $thumbnail = null;

    if ($_FILES['thumbnail']['name'] != '') {
      $fileName = time() . $_FILES['thumbnail']['name'];
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "public/images/upload/$this->imageFolder/$fileName");
      $thumbnail = "public/images/upload/$this->imageFolder/" . $fileName;
    }

    $this->categoryModel->addNewCategory([
      'title' => $_POST['title'],
      'parent_id' => $_POST['parent_id'],
      'type' => $_POST['type'],
      'status' => $_POST['status'],
      'display_order' => $_POST['display_order'],
      'thumbnail' => $thumbnail,
    ]);

    header("location:$APP_URL/admin/$this->pathList/1");
  }

  /**
   * Hiển thị chi tiết phần tử
   */
  public function showCategoryProduct($id)
  {
    $result = [
      'formAction' => "admin/$this->pathForm/update/$id",
      'title' => $this->title,
      'detail' => $this->categoryModel->getDetailCategory($id),
      'pathForm' => $this->pathForm,
      'pathList' => $this->pathList,
      'categories' => $this->categoryModel->getListCategory("where id != $id && type = 1"),
    ];

    $this->setTemplate("admin/$this->pathForm/edit", $result);
    $this->setLayout('AdminNoSidebarLayout');
  }

  /**
   * Cập nhật phần tử
   */
  public function updateCategoryProduct($id)
  {
    global $APP_URL;

    if ($_FILES['thumbnail']['name'] != '') {
      $fileName = time() . $_FILES['thumbnail']['name'];
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "public/images/upload/$this->imageFolder/$fileName");
      $thumbnail = "public/images/upload/$this->imageFolder/" . $fileName;

      $this->categoryModel->updateCategory($id, [
        'thumbnail' => $thumbnail,
      ]);
    }

    $this->categoryModel->updateCategory($id, [
      'title' => $_POST['title'],
      'parent_id' => $_POST['parent_id'],
      'type' => $_POST['type'],
      'status' => $_POST['status'],
      'display_order' => $_POST['display_order'],
    ]);

    header("location:$APP_URL/admin/$this->pathList/1");
  }

  /**
   * Xoá phần tử
   */
  public function deleteCategoryProduct($id)
  {
    global $APP_URL;

    $this->categoryModel->deleteCategory($id);

    header("location:$APP_URL/admin/$this->pathList/1");
  }
}
