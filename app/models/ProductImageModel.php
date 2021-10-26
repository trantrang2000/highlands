<?php
class ProductImageModel extends Model
{
  public $table = 'product_images';

  /**
   * Lấy danh sách phần tử
   */
  public function getListProductImage($where = "")
  {
    $result = parent::getListAll("Select * from `$this->table` $where order by id asc");

    return $result;
  }

  /**
   * Lấy số bản ghi
   */
  public function getRowCountProductImage()
  {
    $result = parent::getRowCount("Select id from `$this->table`");

    return $result;
  }

  /**
   * Lấy thông tin phần tử
   */
  public function getDetailProductImage($id)
  {
    $result = parent::getRecord("Select * from `$this->table` where id = $id");
    return $result;
  }

  /**
   * Thêm mới phần tử
   */
  public function addNewProductImage($fields)
  {
    $values = [];
    foreach ($fields as $key => $val) {
      $values[] = "`$key`='$val'";
    }
    $sql = "Insert into `$this->table` set " . implode(',', $values);

    return parent::execute($sql);
  }

  /**
   * Update phần tử
   */
  public function updateProductImage($id, $fields)
  {
    $values = [];
    foreach ($fields as $key => $val) {
      $values[] = "`$key`='$val'";
    }
    $sql = "Update `$this->table` set " . implode(',', $values) . " where id = $id";

    return parent::execute($sql);
  }

  /**
   * Xoá phần tử
   */
  public function deleteProductImage($id)
  {
    return parent::execute("Delete from `$this->table` where id = $id");
  }
}
