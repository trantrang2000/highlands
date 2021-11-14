<?php
include_once "app/models/OrderModel.php";
include_once "app/models/PaymentMethodModel.php";
include_once "app/models/ShippingMethodModel.php";
include_once "app/models/UserModel.php";
include_once "app/models/OrderDetailModel.php";

class OrderController extends BaseController
{
  public $orderModel;
  public $paymentMethodModel;
  public $shippingMethodModel;
  public $userModel;
  public $orderDetailModel;
  public $pathList = "orders";
  public $pathForm = "order";
  public $title = "Quản lý đơn hàng";

  public function __construct()
  {
    $this->orderModel = new OrderModel();
    $this->paymentMethodModel = new PaymentMethodModel();
    $this->shippingMethodModel = new ShippingMethodModel();
    $this->userModel = new UserModel();
    $this->orderDetailModel = new OrderDetailModel();

    $action = $_GET['action'] ?? null;
    $id = $_GET['id'] ?? null;

    switch ($action) {
      case 'view':
        $this->redirectViewOrder($id);
        break;

      case 'update_status':
        $this->updateStatus($id);
        break;

      default:
        $this->getListOrder();
        break;
    }
  }

  /**
   * Lấy danh sách phần tử
   */
  public function getListOrder()
  {
    $page = $_GET['page'] ?? 1;
    $orderId = $_POST['orderId'] ?? "";
    $userId = $_POST['userId'] ?? "";
    $totalRecord = $this->orderModel->getRowCountOrder();
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

    $whereSql = "";
    if ($orderId != "" && $userId == "") {
      $whereSql = "where id = $orderId";
    } else if ($orderId == "" && $userId != "") {
      $whereSql = "where user_id = $userId";
    } else if ($orderId != "" && $userId != "") {
      $whereSql = "where id = $orderId and user_id = $userId";
    }

    $result = [
      'orders' => $this->orderModel->getListOrder($whereSql, "limit $start, $limit"),
      'page' => $page,
      'totalPage' => $totalPage,
      'totalRecord' => $totalRecord,
      'limit' => $limit,
      'start' => $start,
      'end' => $end,
      'pathList' => $this->pathList,
      'pathForm' => $this->pathForm,
      'title' => $this->title,
      'orderId' => $orderId,
      'userId' => $userId
    ];

    $this->setTemplate("admin/$this->pathForm/index", $result);
    $this->setLayout('AdminLayout');
  }

  /**
   * Mở trang xem chi tiết
   */
  public function redirectViewOrder($id)
  {
    $order = $this->orderModel->getDetailOrder($id);
    $paymentMethod = $this->paymentMethodModel->getDetailPaymentMethod($order->payment_method_id);
    $shippingMethod = $this->shippingMethodModel->getDetailShippingMethod($order->shipping_method_id);
    $user = $this->userModel->getDetailUser($order->user_id);
    $orderDetails = $this->orderDetailModel->getDetailOrderDetail($order->id);

    $result = [
      'formAction' => "admin/$this->pathForm/update_status/$id",
      'title' => $this->title,
      'pathForm' => $this->pathForm,
      'pathList' => $this->pathList,
      'order' => $order,
      'paymentMethod' => $paymentMethod,
      'shippingMethod' => $shippingMethod,
      'user' => $user,
      'orderDetails' => $orderDetails,
    ];

    $this->setTemplate("admin/$this->pathForm/view", $result);
    $this->setLayout('AdminNoSidebarLayout');
  }

  /**
   * Cập nhật trạng thái đơn hàng
   */
  public function updateStatus($id)
  {
    global $APP_URL;

    $this->orderModel->updateOrder($id, [
      'status' => $_POST['status'],
    ]);

    header("location:$APP_URL/admin/$this->pathList/1");
  }
}
