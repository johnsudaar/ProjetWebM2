<?php

function render($view){
  //include "views/template/header.html.php";
  include "views/".$view.".html.php";
  //include "views/template/footer.html.php";

}

function redirect($path){
	header('Location:'.$SERVER_URL.$path);
	die();
}

function notFound() {
  render("404");
  die();
}
?>
