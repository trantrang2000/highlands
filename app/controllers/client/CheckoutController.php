<?php
include_once "app/models/UserModel.php";
include_once "app/models/OrderModel.php";
include_once "app/models/OrderDetailModel.php";
include_once "app/models/PaymentMethodModel.php";
include_once "app/models/ShippingMethodModel.php";
include_once "app/models/ProductModel.php";

class CheckoutController extends BaseController
{
  public $user;
  public $order;
  public $orderDetail;
  public $paymentMethod;
  public $shippingMethod;
  public $productModel;

  public function __construct()
  {
    global $APP_URL;

    $this->user = new UserModel();
    $this->order = new OrderModel();
    $this->orderDetail = new OrderDetailModel();
    $this->paymentMethod = new PaymentMethodModel();
    $this->shippingMethod = new ShippingMethodModel();
    $this->productModel = new ProductModel();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $userId = null;
      $totalQuantity = 0;
      $totalMoney = 0;
      $cart = $_SESSION["cart"];

      if (!isset($_SESSION["user"])) {
        $userId = $this->user->addNewUser([
          "first_name" => $_POST["firstName"],
          "last_name" => $_POST["lastName"],
          "email" => $_POST["email"],
          "address" => $_POST["address"],
          "phone" => $_POST["phoneNumber"],
        ]);
      } else {
        $userId = $_SESSION["user"]->id;
      }

      foreach ($cart as $item) {
        $totalQuantity += $item['quantity'];
        $totalMoney += $item['total'];
      }

      $totalMoney += $_POST["shippingMethod"] == 1 ? 30000 : 50000;


      $order = $this->order->addNewOrder([
        "user_id" => $userId,
        'total_money' => $totalMoney,
        'total_quantity' => $totalQuantity,
        'payment_method_id' => $_POST["paymentMethod"],
        'shipping_method_id' => $_POST["shippingMethod"],
      ]);

      foreach ($cart as $value) {
        $product = $this->productModel->getDetailProduct($value['id']);

        $this->productModel->updateProduct($value['id'], [
          'quantity' => $product->quantity - 1
        ]);

        $this->orderDetail->addNewOrderDetail([
          "order_id" => $order,
          "product_id" => $value["id"],
          "price" => $value["price"],
          "quantity" => $value["quantity"],
        ]);
      }

      unset($_SESSION['cart']);
      header("location:$APP_URL/order-success");
    }

    $result = [
      'paymentMethods' => $this->paymentMethod->getListPaymentMethod(),
      'shippingMethods' => $this->shippingMethod->getListShippingMethod(),
    ];

    $this->setTemplate("client/checkout/index", $result);
    $this->setLayout("ClientLayout");
  }
}
