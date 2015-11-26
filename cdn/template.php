<?php
/**
 * @file
 * The primary PHP file for this theme.
 */
function MarketPlace_preprocess_page(&$vars) 
{ 
	if(drupal_is_front_page()) 
	{ 
		unset($vars['page']['content']['system_main']['default_message']); //will remove message "no front page content is created" 
		drupal_set_title(''); //removes welcome message (page title) 
	}
}
/*
function MarketPlace_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

	$url = $_SERVER['HTTP_REFERER'];
	$path = preg_replace('/\//','',parse_url($url,PHP_URL_PATH),1);
	$path=explode("/",$path);
	$new_breadcrumbs=array();
	$lan=$path[0];
	$type=$path[1];
	//dpm($breadcrumb);
	if($type =="research-group" || $type=="grupo-investigacion")
	{
		$new_breadcrumbs[0]='<li>'.$breadcrumb[0].'</li>';
		$new_breadcrumbs[1]='<a href="/'.$lan.'/'.t($type).'/">'.t($type).'</a>';
		$new_breadcrumbs[2]='<li class="'.$breadcrumb[1]["class"].'">'.$breadcrumb[1]["data"].'</li>';
	}
	return '<ol class="breadcrumb" >'.implode(" / " ,$new_breadcrumbs).'</ol>';
}*/