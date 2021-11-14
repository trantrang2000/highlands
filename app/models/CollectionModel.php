<?php
class CollectionModel extends Model
{
  public $table = 'collections';

  /**
   * Lấy danh sách phần tử
   */
  public function getListCollection($where = "", $pagination = "")
  {
    $result = parent::getListAll("Select * from `$this->table` $where order by id asc $pagination");

    return $result;
  }

  /**
   * Lấy số bản ghi
   */
  public function getRowCountCollection()
  {
    $result = parent::getRowCount("Select id from `$this->table`");

    return $result;
  }

  /**
   * Lấy thông tin phần tử
   */
  public function getDetailCollection($id)
  {
    $result = parent::getRecord("Select * from `$this->table` where id = $id");
    return $result;
  }

  /**
   * Thêm mới phần tử
   */
  public function addNewCollection($fields)
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
  public function updateCollection($id, $fields)
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
  public function deleteCollection($id)
  {
    return parent::execute("Delete from `$this->table` where id = $id");
  }

  /* Lấy danh sách category product gồm cả sản phẩm */
  public function getListCollectionWithProducts()
  {
    $result = parent::getListAll("Select categories.id as categoryId, categories.title as categoryTitle, categories.thumbnail as categoryThumbnail, products.id, products.title, products.thumbnail, products.include, products.original_price, products.price from categories inner join products on categories.id = products.category_id");

    return $result;
  }
}
