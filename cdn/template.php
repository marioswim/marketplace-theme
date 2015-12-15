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

function MarketPlace_field($variables)
{
	//dpm($variables);
	$output='';
	$output.='<div class="'.$variables["classes"].'">';

		 if(!empty($variables["label"]))
			$output.='<div class="field-label">'.$variables["label"].'</div>';
		

		$output.='<div class="field-items">';
			$output.='<div class="field-item">';

				 $output.=$variables["items"][0]["#markup"]; 
				
			$output.='</div>';
			
		$output.='</div>';
	$output.='</div>';
	
	return $output;
}

function MarketPlace_breadcrumb($variables)
{
	dpm($variables);
	$breadcrumb='
		<ol class="breadcrumb">
			<li>'.$variables["breadcrumb"][0].'</li>';
	$node=menu_get_object();
	$start=strpos($variables["breadcrumb"][0], '"');
	$end=strripos($variables["breadcrumb"][0], '"');

	$lan=substr($variables["breadcrumb"][0], $start+1,$end-$start-1);

	switch (node_type_get_name($node)) 
	{
	 	case 'Research Group':
	 	for($i=1;$i<count($variables['breadcrumb'])-1;$i++)
 			{
 				if(isset($breadcrumb["breadcrumb"][$i]["class"]))
 					$breadcrumb.='<li ="'.$variables["breadcrumb"][$i]["class"][0].'">'.$variables["breadcrumb"][$i]["data"].'</li>';
 				else
 					$breadcrumb.='<li>'.$variables["breadcrumb"][$i]["data"].'</li>';
 			}
 			$path=drupal_get_path_alias("research-group");

	 		$breadcrumb.='<li><a href="'.$lan.'/'.$path.'">'.t("Research Groups").'</a></li>';	
	 		$breadcrumb.='<li class ="'.$variables["breadcrumb"][count($variables["breadcrumb"])-1]["class"][0].'">'.$variables["breadcrumb"][count($variables["breadcrumb"])-1]["data"].'</li>';	
	 		break;
	 	
	 	case 'Product':
	 	for($i=1;$i<count($variables['breadcrumb'])-1;$i++)
 			{
 				if(isset($breadcrumb["breadcrumb"][$i]["class"]))
 					$breadcrumb.='<li ="'.$variables["breadcrumb"][$i]["class"][0].'">'.$variables["breadcrumb"][$i]["data"].'</li>';
 				else
 					$breadcrumb.='<li>'.$variables["breadcrumb"][$i]["data"].'</li>';
 			}

 			$path=drupal_get_path_alias("list-products");

	 		$breadcrumb.='<li><a href="'.$lan.'/'.$path.'">'.t("Products").'</a></li>';	
	 		$breadcrumb.='<li class ="'.$variables["breadcrumb"][count($variables["breadcrumb"])-1]["class"][0].'">'.$variables["breadcrumb"][count($variables["breadcrumb"])-1]["data"].'</li>';	
	 		break;

 		default:
 			
 			for($i=1;$i<count($variables['breadcrumb']);$i++)
 			{
 				if(isset($breadcrumb["breadcrumb"][$i]["class"]))
 					$breadcrumb.='<li ="'.$variables["breadcrumb"][$i]["class"][0].'">'.$variables["breadcrumb"][$i]["data"].'</li>';
 				else
 					$breadcrumb.='<li>'.$variables["breadcrumb"][$i]["data"].'</li>';
 			}

 			break;
	} 

	$breadcrumb.="</ol>";
	return $breadcrumb;
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