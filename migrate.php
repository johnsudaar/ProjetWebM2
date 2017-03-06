<?php
require_once "core/bootstrap.php";
$generator = new \Nubs\RandomNameGenerator\Alliteration();


function query($cmd){
  $driver = DBDriver::get()->getDriver();
  $driver->exec($cmd);
  ce(" Ok \n");
}

function ce($char){
  $driver = DBDriver::get()->getDriver();
  $error = $driver->errorInfo();
  if ($error[0] != 0) {
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

echo "\033[0m Starting migrations ... \n";

echo "\033[0m Droping Categories";
query("DROP TABLE IF EXISTS ".Categorie::TABLE_NAME);

echo "\033[0m Creating Categories";
query("CREATE TABLE ".Categorie::TABLE_NAME."(\n".
  "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,\n".
  "name VARCHAR(60) NOT NULL \n,".
  "parent_id INT(6) UNSIGNED)");

echo "\033[0m Droping Brands";
query("DROP TABLE IF EXISTS ".Brand::TABLE_NAME);

echo "\033[0m Creating Brands";
query("CREATE TABLE ".Brand::TABLE_NAME." (\n".
  "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,\n".
  "name VARCHAR(60) NOT NULL)");

echo "\033[0m Droping Products";
query("DROP TABLE IF EXISTS ".Product::TABLE_NAME);

echo "\033[0m Creating Products";
query("CREATE TABLE ".Product::TABLE_NAME." (\n".
  "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,\n".
  "name VARCHAR(60) NOT NULL, \n".
  "brand_id INT(6) UNSIGNED NOT NULL, \n".
  "categorie_id INT(6) UNSIGNED NOT NULL, \n".
  "price INT NOT NULL, \n".
  "grade INT NOT NULL, \n".
  "color VARCHAR(20) NOT NULL, \n".
  "sale INT, \n".
  "picture VARCHAR(60) NOT NULL)");

$categories = array();

echo "\033[0m Seeding categories";
$categories[] = Categorie::create("Vivamus mauris")->save();
ce(".");
$categories[] = Categorie::create("Rhoncus vitae semper")->save();
ce(".");
$categories[] = Categorie::create("Vivamus mauis", Categorie::getById(2))->save();
ce(".");
$categories[] = Categorie::create("Rhoncus vitae semper", Categorie::getById(2))->save();
ce(".");
$categories[] = Categorie::create("Adipiscing ac eros", Categorie::getById(2))->save();
ce(".");
$categories[] = Categorie::create("Fuse ac ante elit")->save();
ce(".");
$categories[] = Categorie::create("Vel porta nisi")->save();
ce(".");
$categories[] = Categorie::create("Aliquam vulputate")->save();
ce(".");
$categories[] = Categorie::create("Venenatis sapien")->save();
ce(".");
echo "\033[32m Ok\n\033[0m";

$brands = array();
echo "\033[0m Seeding Brands";
$brands[] = Brand::create("Karma")->save();
ce(".");
$brands[] = Brand::create("Ideos")->save();
ce(".");
echo "\033[32m Ok\n\033[0m";

$colors = ["red","orange","yellow","green","aqua","cyan","light-blue","blue","dark-purple","purple","black","white","black-white","pink","dark-pink"];

echo "\033[0m Seeding Products";
foreach ($categories as $categorie) {
  foreach($brands as $brand) {
    foreach($colors as $color) {
      for($i = 0; $i < 9 ; $i++) {
        $grade = rand(1,10);
        $price = rand(100, 10000);
        $sale  = 0;
        if($i == 0) {
          $sale = rand(1,5) * 10;
        }
        $name = ucfirst($color." ".$generator->getName());
        Product::create($name, "pic.png", $grade, $color, $price, $sale, $brand, $categorie)->save();
        ce(".");
      }
    }
  }
}

echo "\033[32m Ok\n\033[0m";
