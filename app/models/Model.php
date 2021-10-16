<?php

$db = mysqli_connect($hostname, $username, $password, $database);
mysqli_set_charset($db, "UTF8");

class Model
{
  public function getListAll($sql)
  {
    global $db;
    $result = mysqli_query($db, $sql);
    $arr = array();

    if ($result) {
      while ($rows = mysqli_fetch_object($result)) {
        $arr[] = $rows;
      }
    }

    return $arr;
  }

  public function execute($sql)
  {
    global $db;

    if (mysqli_query($db, $sql)) {
      return mysqli_insert_id($db);
    }
  }

  public function getRecord($sql)
  {
    global $db;
    $result = mysqli_query($db, $sql);
    $record = mysqli_fetch_object($result);

    return $record;
  }

  public function getRowCount($sql)
  {
    global $db;
    $result = mysqli_query($db, $sql);

    return mysqli_num_rows($result);
  }
}
