<?php
class MainController {
  function index(){
    $data = array();
    $data["categories"] = Categorie::getAll();
    $data["brands"] = Brand::getAll();
    render("index", $data);
  }

  function checkout() {
    $item_input = $_GET["items"];
    $item_ids   = split(",", $item_input);
    $items = array();
    $total_price = 0;
    foreach($item_ids as $id) {
      if($id != "") {
        if(isset($items[$id])) {
          $items[$id]["count"] ++;
          $price += $items[$id]["product"]->getRealPrice();
        } else {
          $item = array();
          $item["count"] = 1;
          $item["product"] = Product::getById($id);
          $items[$id] = $item;
          $total_price += $items[$id]["product"]->getRealPrice();
        }
      }
    }
    $data = array();
    $data["items"] = $items;
    $data["total"] = $total_price;
    render("checkout", $data);
  }
}
