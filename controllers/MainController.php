<?php
class MainController {
  function index(){
    $data = array();
    $data["categories"] = Categorie::getAll();
    $data["brands"] = Brand::getAll();
    render("index", $data);
  }
}
?>
