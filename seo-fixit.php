<?

/*
Plugin Name: Seo fix it
Description: 1) remove h1 from Tiny_mce, 2) remove nav extra class&id
Version: 0.1a
Author: S.liang
License: GPLv2 or later
*/


/* remove h1 from tiny_mce */
class ForRemove_h1 {
	public function __construct() 
	{
		  
	// remove h1

	add_filter('tiny_mce_before_init', array($this, 'remove_h1_mce'));
	}
	
    public function remove_h1_mce($arr)
    {
    	
    $arr['theme_advanced_blockformats'] = 'p,h2,h3,h4,blockquote';
    return $arr;
  	}
}

//add_filter('tiny_mce_before_init',  array('ForRemove_h1', 'remove_h1_mce'));

new ForRemove_h1();
 
  
  
// remove nav extra
//Deletes all CSS classes and id's, except for those listed in the array below

class remove_menu_class 
{
	public function __construct()
	{
		add_filter('nav_menu_css_class', array ($this,'custom_wp_nav_menu'));
		add_filter('nav_menu_item_id', array($this,'custom_wp_nav_menu'));
	} 
	public function custom_wp_nav_menu($var) 
	{
	if(!is_array($var)){
		return '';
	}
	$rs = array();
	foreach($var as $d){
		if(preg_match('/-\d/', $d) || preg_match('/current/', $d))
		{
			$rs[] = $d;		
		}	
	}
	return $rs;
	}
}	

new remove_menu_class();







