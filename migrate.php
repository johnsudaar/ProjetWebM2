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
Categorie::create("Vivamus mauris")->save();
ce(".");
Categorie::create("Rhoncus vitae semper")->save();
ce(".");
Categorie::create("Vivamus mauis", Categorie::getById(2))->save();
ce(".");
Categorie::create("Rhoncus vitae semper", Categorie::getById(2))->save();
ce(".");
Categorie::create("Adipiscing ac eros", Categorie::getById(2))->save();
ce(".");
Categorie::create("Fuse ac ante elit")->save();
ce(".");
Categorie::create("Vel porta nisi")->save();
ce(".");
Categorie::create("Aliquam vulputate")->save();
ce(".");
Categorie::create("Venenatis sapien")->save();
ce(".");
echo "\033[32m Ok\n\033[0m";

echo "\033[0m Droping Brands";
query("DROP TABLE IF EXISTS ".Brand::TABLE_NAME);

echo "\033[0m Creating Brands";
query("CREATE TABLE ".Brand::TABLE_NAME." (\n".
  "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,\n".
  "name VARCHAR(60) NOT NULL)");

echo "\033[0m Seeding Brands";
Brand::create("Karma")->save();
ce(".");
Brand::create("Ideos")->save();
ce(".");
echo "\033[32m Ok\n\033[0m";
