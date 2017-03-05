<?php
class Product {
  private $id;
  private $name;
  private $picture;
  private $price;
  private $categorie;
  private $categorie_id;
  private $brand;
  private $brand_id;
  private $grade;

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

  function getCategorie(){
    if($this->categorie != null) {
      return $this->categorie;
    } else {
      return nill;
    }
  }
}
