<?php
class OrderSuccessController extends BaseController
{
  public function __construct()
  {
    $this->setTemplate("client/order-success/index");
    $this->setLayout("ClientLayout");
  }
}
