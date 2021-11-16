<?php

class CartController extends BaseController
{
  public $model;

  public function __construct()
  {
    $this->model = new Model();

    $action = $_GET['action'] ?? null;


    if (!isset($_SESSION["cart"])) {
      $_SESSION["cart"] = array();
    }

    switch ($action) {
      case 'add':
        $this->addCart();
        break;
      case 'destroy':
        $this->destroyCart();
        break;
      case 'delete':
        $this->deleteCartItem();
        break;
      default:
        $this->getCartList();
        break;
    }
  }

  /**
   * Lấy danh sách giỏ hàng
   */
  public function getCartList()
  {
    $result = [
      'carts' => $_SESSION["cart"],
    ];

    $this->setTemplate("client/cart/index", $result);
    $this->setLayout("ClientLayout");
  }

  /**
   * Thêm mới sản phẩm vào giỏ hàng
   */
  public function addCart()
  {
    global $APP_URL;
    $id = $_POST['id'] ??  null;
    $quantity = $_POST['quantity'] ?? 1;

    if (isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id]['quantity'] += $quantity;
      $_SESSION['cart'][$id]['total'] = $_SESSION['cart'][$id]['quantity'] * $_SESSION['cart'][$id]['price'];
      if ($_SESSION['cart'][$id]['quantity'] == 0) {
        $this->deleteCartItem($id);
      }
      $this->calculateTotalMoney();
    } else {
      $product = $this->model->getRecord("Select * from products where id = $id");
      $_SESSION['cart'][$id] = array(
        'id' => $id,
        'title' => $product->title,
        'thumbnail' => $product->thumbnail,
        'original_price' => $product->original_price,
        'price' => $product->price,
        'quantity' => $quantity,
        'total' => $quantity * $product->price
      );
      $this->calculateTotalMoney();
    }

    header("location:$APP_URL/cart");
  }

  /**
   * Xoá giỏ hàng
   */
  public function destroyCart()
  {
    global $APP_URL;

    unset($_SESSION['cart']);
    unset($_SESSION['totalMoney']);
    header("location:$APP_URL/cart");
  }

  /**
   * Xoá phần tử trong giỏ hàng
   */
  public function deleteCartItem()
  {
    global $APP_URL;
    $id = $_GET['id'] ??  null;

    unset($_SESSION['cart'][$id]);
    $this->calculateTotalMoney();
    header("location:$APP_URL/cart");
  }

  /**
   * Tính tổng giá trị đơn hàng
   */
  public function calculateTotalMoney()
  {
    $sum = 0;
    foreach ($_SESSION['cart'] as $value) {
      $sum += $value['total'];
    }

    $_SESSION['totalMoney'] = $sum;
  }
}
