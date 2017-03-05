<?php
class Brand extends Model {
  public $id;
  public $name;

  const TABLE_NAME = "Brand";
  const TABLE_COLUMNS = ["id", "name"];

  static function Create($name){
    $c = new Brand();
    $c->name = $name;
    $c->id = -1;
    return $c;
  }

  function getId(){
    return $this->id;
  }

  function getName(){
    return $this->name;
  }
}
