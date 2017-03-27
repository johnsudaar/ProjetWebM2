<?php

class QueryBuilder {
  private $table_name;
  private $class_name;
  private $query;
  private $paginate;
  private $page_size;
  private $page_index;
  private $first;

  public function __construct($table_name, $class_name) {
    $this->table_name = $table_name;
    $this->class_name = $class_name;
    $this->query      = "";
    $this->first      =  true;
    $this->paginate   = false;
  }

  public function andValue($field, $value){
    $this->appendQuery("AND",$field, "=",$value);
    return $this;
  }

  public function orValue($field, $v){
    $this->appendQuery("OR", $field, "=", $value);
    return $this;
  }

  public function andLessThan($field, $value) {
    $this->appendQuery("AND", $field, "<", $value);
    return $this;
  }

  public function andLessOrEqual($field, $value) {
    $this->appendQuery("AND", $field, "<=", $value);
    return $this;
  }

  public function andGreaterThan($field, $value) {
    $this->appendQuery("AND", $field, ">", $value);
    return $this;
  }

  public function andGreaterOrEqual($field, $value) {
    $this->appendQuery("AND", $field, ">=", $value);
    return $this;
  }

  public function andLike($field, $value) {
    $this->appendQuery("AND", $field, "LIKE", $value);
    return $this;
  }

  public function orLike($field, $value) {
    $this->appendQuery("OR", $field, "LIKE", $value);
    return $this;
  }

  public function paginate($page, $size){
    $this->page_size = $size;
    $this->page      = $page;
    $this->paginate  = true;
    return $this;
  }

  public function execute(){
    $query = "SELECT * FROM ".$this->table_name." WHERE ".$this->query;
    if($this->first) {
      $query = "SELECT * FROM ".$this->table_name;
    }

    if($this->paginate) {
      $start  = ($this->page - 1) * $this->page_size;
      $query .= " LIMIT ".$start." , ".$this->page_size;
    }

    $driver = DBDriver::get()->getDriver();
    $query  = $driver->prepare($query);
    $query->execute();
    $data = array();
    while ($row = $query->fetch()) {
      $data[] = (new $this->class_name($row))->complete();
    }
    return $data;
  }

  private function appendQuery($join, $field, $comparator, $value){
    if($this->first) {
      $this->query .= " ".$field." ".$comparator." '".$value."'";
      $this->first  = false;
    } else {
      $this->query .= " ".$join." ".$field." ".$comparator." '".$value."'";
    }
  }
}
