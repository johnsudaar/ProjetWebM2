<?php

function generate_menu($categories, $firstlevel){
  if($firstlevel) {
    $str = "<ul class=\"categories\">";
  } else {
    $str = "<ul>";
  }
  foreach($categories as $categorie) {
    if($firstlevel || $categorie->getParent() != null) {
      if(count($categorie->getChilds()) != 0) {
        $str .= "<li>".$categorie->getName()."</li>";
        $str .= generate_menu($categorie->getChilds(), false);
      } else {
        $str .="<li class=\"pointer\" data-send=\"filters\" data-categorie=\"categorie\" data-value=\"".$categorie->getId()."\"> ".$categorie->getName();
      }
      $str .= "</li>";
    }
  }
  $str .= "</ul>";
  return $str;
}
