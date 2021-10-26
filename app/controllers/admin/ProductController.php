<?php
include_once "app/models/ProductModel.php";
include_once "app/models/CategoryModel.php";
include_once "app/models/CollectionModel.php";

class ProductController extends BaseController
{
  public $productModel;
  public $categoryModel;
  public $collectionModel;
  public $pathList = "products";
  public $pathForm = "product";
  public $imageFolder = "product";
  public $title = "Sản phẩm";

  public function __construct()
  {
    $this->productModel = new ProductModel();
    $this->categoryModel = new CategoryModel();
    $this->collectionModel = new CollectionModel();

    $action = $_GET['action'] ?? null;
    $id = $_GET['id'] ?? null;

    switch ($action) {
      case 'create':
        $this->redirectCreateProduct();
        break;
      case 'do_create':
        $this->createProduct();
        break;
      case 'show':
        $this->showProduct($id);
        break;
      case 'update':
        $this->updateProduct($id);
        break;
      case 'delete':
        $this->deleteProduct($id);
        break;
      default:
        $this->getListProduct();
        break;
    }
  }

  /**
   * Lấy danh sách phần tử
   */
  public function getListProduct()
  {
    $page = $_GET['page'] ?? 1;
    $keyword = $_POST['keyword'] ?? '';
    $totalRecord = $this->productModel->getRowCountProduct();
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
      'products' => $this->productModel->getListProduct("where title like '%$keyword%'", "limit $start, $limit"),
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
  public function redirectCreateProduct()
  {
    $result = [
      'formAction' => "admin/$this->pathForm/do_create",
      'title' => $this->title,
      'pathForm' => $this->pathForm,
      'pathList' => $this->pathList,
      'categories' => $this->categoryModel->getListCategory("where type = 1"),
      'collections' => $this->collectionModel->getListCollection(""),
    ];

    $this->setTemplate("admin/$this->pathForm/edit", $result);
    $this->setLayout('AdminNoSidebarLayout');
  }

  /**
   * Thêm phần tử
   */
  public function createProduct()
  {
    global $APP_URL;

    $thumbnail = null;

    if ($_FILES['thumbnail']['name'] != '') {
      $fileName = time() . $_FILES['thumbnail']['name'];
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "public/images/upload/$this->imageFolder/$fileName");
      $thumbnail = "public/images/upload/$this->imageFolder/" . $fileName;
    }

    $this->productModel->addNewProduct([
      'title' => $_POST['title'],
      'original_price' => $_POST['original_price'],
      'price' => $_POST['price'],
      'description' => $_POST['description'],
      'content' => $_POST['content'],
      'include' => $_POST['include'],
      'quantity' => $_POST['quantity'],
      'is_hot' => $_POST['is_hot'],
      'category_id' => $_POST['category_id'],
      'collection_id' => $_POST['collection_id'],
      'status' => $_POST['status'],
      'thumbnail' => $thumbnail,
    ]);

    header("location:$APP_URL/admin/$this->pathList/1");
  }

  /**
   * Hiển thị chi tiết phần tử
   */
  public function showProduct($id)
  {
    $result = [
      'formAction' => "admin/$this->pathForm/update/$id",
      'title' => $this->title,
      'detail' => $this->productModel->getDetailProduct($id),
      'pathForm' => $this->pathForm,
      'pathList' => $this->pathList,
      'categories' => $this->categoryModel->getListCategory("where type = 1"),
      'collections' => $this->collectionModel->getListCollection(""),
    ];

    $this->setTemplate("admin/$this->pathForm/edit", $result);
    $this->setLayout('AdminNoSidebarLayout');
  }

  /**
   * Cập nhật phần tử
   */
  public function updateProduct($id)
  {
    global $APP_URL;

    if ($_FILES['thumbnail']['name'] != '') {
      $fileName = time() . $_FILES['thumbnail']['name'];
      move_uploaded_file($_FILES['thumbnail']['tmp_name'], "public/images/upload/$this->imageFolder/$fileName");
      $thumbnail = "public/images/upload/$this->imageFolder/" . $fileName;

      $this->productModel->updateProduct($id, [
        'thumbnail' => $thumbnail,
      ]);
    }

    $this->productModel->updateProduct($id, [
      'title' => $_POST['title'],
      'original_price' => $_POST['original_price'],
      'price' => $_POST['price'],
      'description' => $_POST['description'],
      'content' => $_POST['content'],
      'include' => $_POST['include'],
      'quantity' => $_POST['quantity'],
      'is_hot' => $_POST['is_hot'],
      'category_id' => $_POST['category_id'],
      'collection_id' => $_POST['collection_id'],
      'status' => $_POST['status'],
    ]);

    header("location:$APP_URL/admin/$this->pathList/1");
  }

  /**
   * Xoá phần tử
   */
  public function deleteProduct($id)
  {
    global $APP_URL;

    $this->productModel->deleteProduct($id);

    header("location:$APP_URL/admin/$this->pathList/1");
  }
}
