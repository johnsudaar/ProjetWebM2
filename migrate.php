<?php

function query($cmd){
  $driver = DBDriver::get()->getDriver();
  $driver->exec($cmd);
  ce(" Ok \n");
}

function ce($char){
  $driver = DBDriver::get()->getDriver();
  $error = $driver->errorInfo();
  if ($error[0] != 0) {
    echo "\033[0m Command: \n\033[34m".$cmd."\033[0m";
    echo "\n\033[31m PDO::errorInfo():".$error[2]."\n";
    echo "\033[0m\n";
    exit(1);
  } else {
    echo "\033[32m".$char."\033[0m";
  }
}
$sapi_type = php_sapi_name();
if (substr($sapi_type, 0, 3) != 'cli') {
  phpinfo();
  exit(1);
}

require_once "core/bootstrap.php";

echo "\033[0m Starting migrations ... \n";

echo "\033[0m Droping Categories";
query("DROP TABLE IF EXISTS ".Categorie::TABLE_NAME);

echo "\033[0m Creating Categories";
query("CREATE TABLE ".Categorie::TABLE_NAME."(\n".
  "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,\n".
  "name VARCHAR(60) NOT NULL \n,".
  "parent_id INT(6) UNSIGNED)");

echo "\033[0m Seeding categories";
Categorie::create("test1", null)->save();
ce(".");
Categorie::create("test2")->save();
ce(".");
Categorie::create("test21", Categorie::getById(1))->save();
ce(".");
Categorie::create("test22", Categorie::getById(1))->save();
ce(".");
Categorie::create("test23", Categorie::getById(1))->save();
ce(".");
Categorie::create("test3")->save();
ce(".");
Categorie::create("test4")->save();
ce(".");

echo "\033[32m Ok\n\033[0m";
?>
