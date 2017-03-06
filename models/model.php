<?php
class Model {
  private $_indb;

  public function __construct($row = null) {
    if($row != null) {
      foreach(static::TABLE_COLUMNS as $col) {
        $this->{$col} = $row[$col];
      }
      $this->_indb = true;
    } else {
      $this->_indb = false;
    }
  }


  public static function getAll(){
    $TABLE_NAME = static::TABLE_NAME;

    $driver = DBDriver::get()->getDriver();
    $query  = $driver->prepare("SELECT * FROM ".static::TABLE_NAME);
    $query->execute();
    $data = array();
    while ($row = $query->fetch()) {
      $data[] = new $TABLE_NAME($row);
    }
    return $data;
  }

  public static function getById($id) {
    $TABLE_NAME = static::TABLE_NAME;

    $driver = DBDriver::get()->getDriver();
    $query  = $driver->prepare("SELECT *  FROM ".static::TABLE_NAME." WHERE id=".$id);
    $query->execute();
    $data = null;
    if($row = $query->fetch()) {
      $data = new $TABLE_NAME($row);
    }
    return $data;
  }

  function save(){
    $driver = DBDriver::get()->getDriver();
    if($this->_indb) {
      $request = "UPDATE ".static::TABLE_NAME." SET ";
      foreach(static::TABLE_COLUMNS as $col) {
        $request .= " ".$col." = ".$this->{$col};
      }
      $request .= " WHERE id=".$this->id;
    } else {
      $values = array();
      $columns = array();
      foreach(static::TABLE_COLUMNS as $col) {
        if($col != "id") {
          if($this->{$col}) {
            $values[] = "'".strval($this->{$col})."'";
          } else {
            $values[] = "NULL";
          }
          $columns[] = $col;
        }
      }
      $request = "INSERT INTO ".static::TABLE_NAME."(".implode(",",$columns).") VALUES (".implode(",", $values).");";
    }

    $query = $driver->exec($request);
    $error = $driver->errorInfo();
    if ($error[0] != 0) {
      echo "\n\033[31m PDO::errorInfo():".$error[2]."\n";
      echo "\033[0m\n";
      exit(1);
    }
    $this->id = $driver->lastInsertId();
    $this->_indb = true;

    return $this;
  }
}
