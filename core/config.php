<?php
function getfromenv($index,$default){
  if(getenv($index) !== null) {
    return getenv($index);
  } else {
    return $default;
  }
}
$SERVER_URL = getfromenv("SEVER_URL", "http://localhost:8081/");
$DATABASE_URL = getfromenv("DATABASE_URL", "db");
$DATABASE_NAME = getfromenv("DATABASE_NAME", "softmarket");
$DATABASE_USER = getfromenv("DATABASE_USER", "softmarket");
$DATABASE_PASSWORD = getfromenv("DATABASE_PASSWORD", "softmarket");
?>
