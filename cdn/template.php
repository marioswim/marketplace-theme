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