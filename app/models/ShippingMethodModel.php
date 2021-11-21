<?php
class ShippingMethodModel extends Model
{
  public $table = 'shipping_methods';

  /**
   * Lấy danh sách phần tử
   */
  public function getListShippingMethod()
  {
    $result = parent::getListAll("Select * from `$this->table` order by id asc");

    return $result;
  }

  /**
   * Lấy thông tin phần tử
   */
  public function getDetailShippingMethod($id)
  {
    $result = parent::getRecord("Select * from `$this->table` where id = $id");
    return $result;
  }
}
