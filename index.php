<?php
session_start();
include "bootstrap.php";
$path = explode("/",$_SERVER["PATH_INFO"]);
if(count($path) <= 1){
	redirect("index.php/main/index");
}
array_shift($path);
$class_name = ucfirst($path[0])."Controller";
if(file_exists("controllers/".$class_name.".php")){
	include("controllers/".$class_name.".php");
	if(class_exists($class_name,false)){
		$class = new $class_name();
		if(method_exists($class, $path[1])){
			$function = $path[1];
			array_shift($path);
			array_shift($path);
			$class->$function($path);
			die();
		}
	}
}
notFound();
?>
