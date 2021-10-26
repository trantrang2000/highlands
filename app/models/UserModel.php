<?php
class UserModel extends Model
{
  public $table = 'users';

  /**
   * Lấy danh sách phần tử
   */
  public function getListUser()
  {
    $result = parent::getListAll("Select * from `$this->table` order by id desc");

    return $result;
  }

  /**
   * Lấy số bản ghi
   */
  public function getRowCountUser($where = "")
  {
    $result = parent::getRowCount("Select id from `$this->table` $where");

    return $result;
  }

  /**
   * Lấy thông tin phần tử
   */
  public function getDetailUser($id)
  {
    $result = parent::getRecord("Select * from `$this->table` where id = $id");
    return $result;
  }

  /**
   * Thêm mới phần tử
   */
  public function addNewUser($fields)
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
  public function updateUser($id, $fields)
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
  public function deleteUser($id)
  {
    return parent::execute("Delete from `$this->table` where id = $id");
  }
}
