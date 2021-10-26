<?php
class ProductModel extends Model
{
  public $table = 'products';

  /**
   * Lấy danh sách phần tử
   */
  public function getListProduct($where = "", $pagination = "", $order = "id desc")
  {
    $result = parent::getListAll("Select * from `$this->table` $where order by $order $pagination");

    return $result;
  }

  /**
   * Lấy số bản ghi
   */
  public function getRowCountProduct($where = '')
  {
    $result = parent::getRowCount("Select id from `$this->table` $where");

    return $result;
  }

  /**
   * Lấy thông tin phần tử
   */
  public function getDetailProduct($id)
  {
    $result = parent::getRecord("Select * from `$this->table` where id = $id");
    return $result;
  }

  /**
   * Thêm mới phần tử
   */
  public function addNewProduct($fields)
  {
    $values = [];
    foreach ($fields as $key => $val) {
      if ($val != null) {
        $values[] = "`$key`='$val'";
      }
    }
    $sql = "Insert into `$this->table` set " . implode(',', $values);

    return parent::execute($sql);
  }

  /**
   * Update phần tử
   */
  public function updateProduct($id, $fields)
  {
    $values = [];
    foreach ($fields as $key => $val) {
      if ($val != null) {
        $values[] = "`$key`='$val'";
      }
    }
    $sql = "Update `$this->table` set " . implode(',', $values) . " where id = $id";

    return parent::execute($sql);
  }

  /**
   * Xoá phần tử
   */
  public function deleteProduct($id)
  {
    return parent::execute("Delete from `$this->table` where id = $id");
  }
}
