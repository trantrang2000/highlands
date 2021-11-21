<?php
class PaymentMethodModel extends Model
{
  public $table = 'payment_methods';

  /**
   * Lấy danh sách phần tử
   */
  public function getListPaymentMethod()
  {
    $result = parent::getListAll("Select * from `$this->table` order by id asc");

    return $result;
  }

  /**
   * Lấy thông tin phần tử
   */
  public function getDetailPaymentMethod($id)
  {
    $result = parent::getRecord("Select * from `$this->table` where id = $id");
    return $result;
  }
}
