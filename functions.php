<?php

function render($view){
  include "views/".$view.".html.php";
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
