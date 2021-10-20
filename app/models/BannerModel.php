<?php
class BannerModel extends Model
{
  public $table = 'banners';

  /**
   * Lấy danh sách phần tử
   */
  public function getListBanner($where = "", $pagination = "")
  {
    $result = parent::getListAll("Select * from `$this->table` $where order by display_order asc $pagination");

    return $result;
  }

  /**
   * Lấy số bản ghi
   */
  public function getRowCountBanner()
  {
    $result = parent::getRowCount("Select id from `$this->table`");

    return $result;
  }

  /**
   * Lấy thông tin phần tử
   */
  public function getDetailBanner($id)
  {
    $result = parent::getRecord("Select * from `$this->table` where id = $id");
    return $result;
  }

  /**
   * Thêm mới phần tử
   */
  public function addNewBanner($fields)
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
  public function updateBanner($id, $fields)
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
  public function deleteBanner($id)
  {
    return parent::execute("Delete from `$this->table` where id = $id");
  }
}
