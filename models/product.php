<?php
class Product extends Model {
  public $id;
  public $name;
  public $picture;
  public $price;
  public $categorie;
  public $brand;
  public $grade;
  public $color;
  public $sale;
  public $real_price;
  public $new;
  protected $brand_id;
  protected $categorie_id;


  const TABLE_NAME = "Product";
  const TABLE_COLUMNS = ["id", "name", "brand_id", "categorie_id", "picture", "grade", "color", "price", "sale", "new"];
  const TABLE_JOIN = ["getBrand", "getCategorie"];

  static function Create($name, $picture, $grade, $color, $price, $sale, $new, $brand = null, $categorie = null){
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
    $c->new       = $new;

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

  function getRealPrice() {
    $sale = $this->getSale();
    $base_price = $this->getPrice();
    if($sale == null) {
      return $base_price;
    }

    return $base_price * (100 - $sale) / 100;
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
    if($this->categorie == null) {
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

  function isNew(){
    return $this->new;
  }
}
