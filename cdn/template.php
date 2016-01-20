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
	switch ($variables["element"]["#field_name"]) {
		case 'field_sector_productivo':

			$output=someValues($variables);

			break;
		case 'field_inventores':

			$output=someValues($variables);

			break;
		
		case 'field_keywords':

			$output=someValues($variables);

			break;

		default:
			
			$output.='<div class="'.$variables["classes"].'">';

				 if(!empty($variables["label"]))
					$output.='<div class="field-label">'.$variables["label"].'</div>';
				

				$output.='<div class="field-items">';
					$output.='<div class="field-item">';
						 $output.=$variables["items"][0]["#markup"]; 
					$output.='</div>';
				$output.='</div>';
			$output.='</div>';
			break;
	}
	

		return $output;
}

function MarketPlace_breadcrumb($variables)
{
	if(!empty($variables["breadcrumb"]))
	{
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
	 	case 'Grupo Investigación':
	 	
		 	if(count($variables['breadcrumb'])==3)
		 	{
		 		array_pop($variables["breadcrumb"]);
		 		$aux=$variables["breadcrumb"][count($variables['breadcrumb'])-1];
		 		$variables["breadcrumb"][count($variables['breadcrumb'])-1]=
	 			array(
	 				"data" => $aux,
		 			"class" => array(0=>"active"));

		 	}
		 	
		 	for($i=1;$i<count($variables['breadcrumb'])-1;$i++)
 			{

 				if(isset($variables["breadcrumb"][$i]["class"]))
 					$breadcrumb.='<li ="'.$variables["breadcrumb"][$i]["class"][0].'">'.$variables["breadcrumb"][$i]["data"].'</li>';
 				else
 					$breadcrumb.='<li>'.$variables["breadcrumb"][$i].'</li>';
 			}
 			$path=drupal_get_path_alias("research-group");

	 		$breadcrumb.='<li><a href="'.$lan.'/'.$path.'">'.t("Research Groups").'</a></li>';	
	 		$breadcrumb.='<li class ="'.$variables["breadcrumb"][count($variables["breadcrumb"])-1]["class"][0].'">'.$variables["breadcrumb"][count($variables["breadcrumb"])-1]["data"].'</li>';	
	 		break;
	 	
	 	case 'Product':
	 	case "Producto":

		 	if(count($variables['breadcrumb'])==3)
		 	{
		 		array_pop($variables["breadcrumb"]);
		 		$aux=$variables["breadcrumb"][count($variables['breadcrumb'])-1];
		 		$variables["breadcrumb"][count($variables['breadcrumb'])-1]=
	 			array(
	 				"data" => $aux,
		 			"class" => array(0=>"active"));

		 	}
	 		for($i=1;$i<count($variables['breadcrumb'])-1;$i++)
 			{
 				if(isset($variables["breadcrumb"][$i]["class"]))
 					$breadcrumb.='<li ="'.$variables["breadcrumb"][$i]["class"][0].'">'.$variables["breadcrumb"][$i]["data"].'</li>';
 				else
 					$breadcrumb.='<li>'.$variables["breadcrumb"][$i].'</li>';
 			}

 			$path=drupal_get_path_alias("list-products");

	 		$breadcrumb.='<li><a href="'.$lan.'/'.$path.'">'.t("Products").'</a></li>';	
	 		$breadcrumb.='<li class ="'.$variables["breadcrumb"][count($variables["breadcrumb"])-1]["class"][0].'">'.$variables["breadcrumb"][count($variables["breadcrumb"])-1]["data"].'</li>';	
	 		break;

 		default:
 			
 			for($i=1;$i<count($variables['breadcrumb']);$i++)
 			{
 				if(isset($variables["breadcrumb"][$i]["class"]))
 					$breadcrumb.='<li ="'.$variables["breadcrumb"][$i]["class"][0].'">'.$variables["breadcrumb"][$i]["data"].'</li>';
 				else
 					$breadcrumb.='<li>'.$variables["breadcrumb"][$i].'</li>';
 			}

 			break;
	} 

		$breadcrumb.="</ol>";
		return $breadcrumb;

	}
	else
	{
		return;
	}
	
}
function someValues($variables)
{
	$output="";

	$output.='<div class="'.$variables["classes"].'">';

		if(!empty($variables["label"]))
			$output.='<div class="field-label">'.$variables["label"].'</div>';
		

		$output.='<div class="field-items">';
			$output.='<div class="field-item">';
				$aux="";
				for($i=0;$i<count($variables["items"]);$i++)
				{
					$aux.='<p>'.$variables["items"][$i]["#markup"].'</p>';							
				}
				$output.=$aux; 
			$output.='</div>';
		$output.='</div>';
	$output.='</div>';
	return $output;
}
