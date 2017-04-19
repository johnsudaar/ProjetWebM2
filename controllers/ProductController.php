<?php
class ProductController {
  function search(){
    $page_size = 10;
    $page = 1;
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
    }

    if(isset($_GET['per_page'])) {
      $page_size = $_GET['per_page'];
    }

    $query = Product::QueryBuilder()->paginate($page, $page_size);

    $fields = ["color", "categorie_id", "brand_id"];

    foreach($fields as $field) {
      if(isset($_GET[$field])) {
        $query->andValue($field, $_GET[$field]);
      }
    }

    if(isset($_GET["name"])){
      $query->andLike("name", "%".$_GET["name"]."%");
    }

    if(isset($_GET["price_max"])){
      $query->andLessOrEqual("price",$_GET['price_max']);
    }

    if(isset($_GET["price_min"])){
      $query->andGreaterOrEqual("price",$_GET['price_min']);
    }

    $data = array();
    $data["results"] =$query->execute();
    $data["page"] = $page;
    $data["page_size"] = $page_size;
    $data["count"] = count($data["results"]);
    render_json($data);
  }
}
