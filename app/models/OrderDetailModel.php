<?php
class OrderDetailModel extends Model
{
  public $table = 'order_details';

  /**
   * Thêm mới phần tử
   */
  public function addNewOrderDetail($fields)
  {
    $values = [];
    foreach ($fields as $key => $val) {
      $values[] = "`$key`='$val'";
    }
    $sql = "Insert into `$this->table` set " . implode(',', $values);

    return parent::execute($sql);
  }

  /**
   * Lấy chi tiết đơn hàng
   */
  public function getDetailOrderDetail($orderId)
  {
    $result = parent::getListAll("Select order_details.price as order_detail_price, order_details.quantity as order_detail_quantity, products.title, products.thumbnail from order_details inner join products on order_details.product_id = products.id where order_id = $orderId");

    return $result;
  }
}
