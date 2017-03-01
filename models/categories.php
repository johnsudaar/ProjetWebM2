<?php
class Categorie {
  private $id;
  private $name;
  private $_indb;
  private static $TABLE_NAME = "Categorie";

  public function __construct($row) {
    $id = $row["id"];
    $name = $row["name"];
  }


  function getId(){
    return $this->id;
  }

  function getName(){
    return $this->name;
  }

  function setName(){
    return $this->name;
  }

  function save(){
    if($this->_indb) {
      $request = "UPDATE "+$TABLE_NAME+" SET name=? WHERE id=?;";
    } else {
      $request = "INSERT INTO "+$TABLE_NAME+"(id, name) VALUES (?,?);";
    }
  }

  public static function getAll(){
    $driver = DBDriver::get()->getDriver();
    $query  = $driver->prepare("SELECT * FROM "+$TABLE_NAME);
    $query->execute();
    $data = array();
    while ($row = $query->fetch()) {
      $data[] = new User($row["id"],$row["nom"],$row["prenom"],$row["fonction"],$row["pays"],$row["etablissement"],$row["ville"], $row["adresse"], $row["photo"], User::getTagsForUser($row["id"]),$row['connect']);
    }
    return $data;
  }
}
?>
