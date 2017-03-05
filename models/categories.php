<?php
class Categorie extends Model{
  public $id;
  public $name;
  public $parent;
  public $parent_id;
  public $childs;

  const TABLE_NAME = "Categorie";
  const TABLE_COLUMNS = ["id", "name", "parent_id"];

  static function Create($name, $parent = null){
    $c = new Categorie();
    $c->name = $name;
    $c->id = -1;
    $c->childs = null;
    $c->parent = $parent;
    if($parent != null) {
      $c->parent_id = $parent->getId();
    } else {
      $c->parent_id = null;
    }
    return $c;
  }

  function getId(){
    return $this->id;
  }

  function getName(){
    return $this->name;
  }

  function getParent(){
    if($this->parent == null) {
      if($this->parent_id != null) {
        $this->parent = Categorie::getById($this->parent_id);
      }
    }
    return $this->parent;
  }

  function getChilds(){
    if($this->childs == null) {
      $childs = array();

      $driver = DBDriver::get()->getDriver();
      $query  = $driver->prepare("SELECT * FROM ".static::TABLE_NAME." WHERE parent_id=".$this->getId());
      $query->execute();
      $data = array();
      while ($row = $query->fetch()) {
        $data[] = new Categorie($row);
      }
      $this->childs = $data;
    }

    return $this->childs;
  }
}
