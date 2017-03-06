<?php
class ProductController {
  function search(){
    render_json(Product::getById(1));
  }
}
