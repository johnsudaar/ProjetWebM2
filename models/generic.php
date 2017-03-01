<?php
class Model {
  public static function getAll(){
    $driver = DBDriver::get()->getDriver();
    $query  = $driver->prepare("SELECT * FROM "+$TABLE_NAME);
    $query->execute();
    $data = array();
    while ($row = $query->fetch()) {
      $data[] = new $$TABLE_NAME($row);
    }
    return $data;
  }
}
?>
