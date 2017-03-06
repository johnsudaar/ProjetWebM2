<?php
class Product extends Model {
  public $id;
  public $name;
  public $picture;
  public $price;
  public $categorie;
  public $categorie_id;
  public $brand;
  public $brand_id;
  public $grade;
  public $color;
  public $sale;

  const TABLE_NAME = "Product";
  const TABLE_COLUMNS = ["id", "name", "brand_id", "categorie_id", "picture", "grade", "color", "price", "sale"];

  static function Create($name, $picture, $grade, $color, $price, $sale, $brand = null, $categorie = null){
    $c = new Product();
    $c->name      = $name;
    $c->id        = -1;
    $c->picture   = $picture;
    $c->grade     = $grade;
    $c->color     = $color;
    $c->price     = $price;
    $c->sale      = $sale;
    $c->brand     = $brand;
    $c->categorie = $categorie;

    if($c->brand != null) {
      $c->brand_id = $c->brand->getId();
    } else {
      $c->brand_id = -1;
    }

    if($c->categorie != null) {
      $c->categorie_id = $c->categorie->getId();
    } else {
      $c->categorie_id = -1;
    }

    return $c;
  }


  function getID(){
    return $this->id;
  }

  function getName(){
    return $this->name;
  }

  function getPicture(){
    return $this->picture;
  }

  function getPrice(){
    return $this->price;
  }

  function getGrade(){
    return $this->grade;
  }

  function getColor(){
    return $this->color;
  }

  function getSale(){
    return $this->sale;
  }

  function getCategorie(){
    if($this->categorie != null) {
      $this->categorie = Categorie::getById($this->categorie_id);
    }
    return $this->categorie;
  }

  function getBrand(){
    if($this->brand_id != null) {
      $this->brand = Brand::getById($this->brand_id);
    }

    return $this->brand;
  }
}
