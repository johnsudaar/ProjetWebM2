<?php

function generate_menu($categories, $firstlevel){
  $str = "<ul>";
  foreach($categories as $categorie) {
    if(! ($firstlevel && $categorie->getParent() != null)) {
        $str .="<li> ".$categorie->getName();
          $str .= generate_menu($categorie->getChilds(), false);
        $str .= "</li>";
    }
  }
  $str .= "</ul>";
  return $str;
}
