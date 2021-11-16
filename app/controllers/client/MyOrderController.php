<?php
include_once "app/models/OrderModel.php";
class MyOrderController extends BaseController
{
  public $orderModel;

  public function __construct()
  {
    global $APP_URL;

    $this->orderModel = new OrderModel();
    $userId = $_SESSION["user"]->id;
    $action = $_GET['action'] ?? null;
    $id = $_GET['id'] ?? null;

    switch ($action) {
      case 'cancel_order':
        $this->orderModel->updateOrder($id, [
          'status' => 4,
        ]);

        header("location:$APP_URL/my/orders");
        break;

      default:
        $results = [
          'orders' => $this->orderModel->getListOrder("where user_id = $userId")
        ];

        $this->setTemplate("client/myorder/index", $results);
        $this->setLayout("ClientLayout");
        break;
    }
  }
}
