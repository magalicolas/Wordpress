<?php 
// si vous voulez seulement un niveau de titre spécifique il faut modifier les $matches
  function replace_ca($matches){
    return '<h'.$matches[1].$matches[2].' id="'.sanitize_title($matches[3]).'">'.$matches[3].'</h'.$matches[4].'>';
  }
add_filter('the_content', 'add_anchor_to_title', 12);

// fonction de création des ancres basées sur le contenu
function add_anchor_to_title($content){
	if(is_singular()){ 
		// vous pouvez modifier ce bou de code pour y mettre votre custom post type
		global $post;
		$pattern = "/<h([2-4])(.*?)>(.*?)<\/h([2-4])>/i";$content = preg_replace_callback($pattern, 'replace_ca', $content);
		return $content;
	}
	else{
		return $content;
	}
} 
// fonction de création du sommaire en liste à puces, vous pouvez y placer votre class ou id css pour appliquer votre propre style 
function automenu(){
	global $post;
	$obj = '<ul id="sommaire-article">';
	$original_content = $post->post_content;$patt = "/<h([2-4])(.*?)>(.*?)<\/h([2-4])>/i";
	preg_match_all($patt, $original_content, $results);$lvl1 = 0;
	$lvl2 = 0;
	$lvl3 = 0;
	foreach ($results[3] as $k=> $r) {
		$obj .= '<li><a href="#'.sanitize_title($r).'" '.$results[1][$k].'">'.$niveau.$r.'</a></li>';
	}
	$obj .= '</ul>';
	if ( $echo )
	echo $obj;
	else
	return $obj;
}
