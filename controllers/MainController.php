<?php
class MainController {
  function index(){
    $data = array();
    $data["categories"] = Categorie::getAll();
    render("index", $data);
  }
}
?>
