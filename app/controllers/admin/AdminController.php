<?php
include_once "app/models/UserModel.php";
include_once "app/models/OrderModel.php";

class AdminController extends BaseController
{
  public $userModel;
  public $orderModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->orderModel = new OrderModel();

    $currentYear = $_GET['year'] ?? date("Y");
    $currentMonth = $_GET['month'] ?? date("m");

    $orders = $this->orderModel->getListOrder("where MONTH(created_at) = $currentMonth and YEAR(created_at) = $currentYear");
    $totalMoneyOrder = 0;
    $totalQuantityOrder = 0;

    foreach ($orders as $order) {
      $totalMoneyOrder += $order->total_money;
      $totalQuantityOrder += $order->total_quantity;
    }

    $results = [
      'totalUser' => $this->userModel->getRowCountUser("where MONTH(created_at) = $currentMonth and YEAR(created_at) = $currentYear"),
      'totalOrder' => $this->orderModel->getRowCountOrder("where MONTH(created_at) = $currentMonth and YEAR(created_at) = $currentYear"),
      'totalMoneyOrder' => $totalMoneyOrder,
      'totalQuantityOrder' => $totalQuantityOrder
    ];

    $this->setTemplate("admin/dashboard/index", $results);
    $this->setLayout("AdminLayout");
  }
}
