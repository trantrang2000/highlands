<?php
class OrderModel extends Model
{
  public $table = 'orders';

  /**
   * Lấy danh sách phần tử
   */
  public function getListOrder($where = "", $pagination = "")
  {
    $result = parent::getListAll("Select * from `$this->table` $where order by id desc $pagination");

    return $result;
  }

  /**
   * Thêm mới phần tử
   */
  public function addNewOrder($fields)
  {
    $values = [];
    foreach ($fields as $key => $val) {
      $values[] = "`$key`='$val'";
    }
    $sql = "Insert into `$this->table` set " . implode(',', $values);

    return parent::execute($sql);
  }

  /**
   * Lấy số bản ghi
   */
  public function getRowCountOrder($where = "")
  {
    $result = parent::getRowCount("Select id from `$this->table` $where");

    return $result;
  }

  /**
   * Lấy thông tin phần tử
   */
  public function getDetailOrder($id)
  {
    $result = parent::getRecord("Select * from `$this->table` where id = $id");
    return $result;
  }

  /**
   * Update phần tử
   */
  public function updateOrder($id, $fields)
  {
    $values = [];
    foreach ($fields as $key => $val) {
      $values[] = "`$key`='$val'";
    }
    $sql = "Update `$this->table` set " . implode(',', $values) . " where id = $id";

    return parent::execute($sql);
  }
}
