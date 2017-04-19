<?php

function generate_menu($categories, $firstlevel){
  $str = "<ul>";
  foreach($categories as $categorie) {
    if(! ($firstlevel && $categorie->getParent() != null)) {
      $str .="<li class=\"pointer\" data-send=\"filters\" data-categorie=\"categorie\" data-value=\"".$categorie->getId()."\"> ".$categorie->getName();
          $str .= generate_menu($categorie->getChilds(), false);
        $str .= "</li>";
    }
  }
  $str .= "</ul>";
  return $str;
}
