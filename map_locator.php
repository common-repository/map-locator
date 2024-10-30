<?php
/*
Plugin Name: Map Locator
URI: http://infinityloopers.com/developers/map-locator/
Description: Map Locator lets you show maps in your sidebar or on your pages/posts via simple shortcode.
Version: 1.0
Author: Usama Noman
Author URI: http://codecanyon.net/user/InfinityLoopers/portfolio
*/
function the_map_locator_method($attr)
{

	
	//Setting Default Values
	if(!isset($attr['zoom']) ){
		$attr['zoom']='14';
	}
	
	if(!isset($attr['latitude']) || empty($attr['longitude'])){
	$attr['latitude']='24.878489';
	}
	if(!isset($attr['longitude']) || empty($attr['longitude'])){
		$attr['longitude']='67.064235';
	}
	
	//Making necessary checking and assigning values
	$zoom=$attr['zoom'] > 20 ? 20 : $attr['zoom'];
	$zoom=$attr['zoom'] < 1 ? 1 : $attr['zoom'];
	$latitude=$attr['latitude'];
	$longitude=$attr['longitude'];
	

	//Lat Long to Degree formula starts here
	if($latitude>=0 && $latitude<=90){
		$lat_degree=floor($latitude);
		$lat_minute=floor(($latitude-$lat_degree)*60);
		$lat_second=((($latitude-$lat_degree)*60)-$lat_minute)*60;
	}
	else if($latitude<0 && $latitude>=-90){
		$lat_degree=intval($latitude);
		$lat_minute=floor(($lat_degree-$latitude)*60);
		$lat_second=((($lat_degree-$latitude)*60)-$lat_minute)*60;
	}
	else{
		//Setting Defaults
		$latitude='24.878489';
		$lat_degree=floor($latitude);
		$lat_minute=floor(($latitude-$lat_degree)*60);
		$lat_second=((($latitude-$lat_degree)*60)-$lat_minute)*60;
	}
	if($longitude>=0 && $latitude<=180){
		
		$long_degree=floor($longitude);
		$long_minute=floor(($longitude-$long_degree)*60);
		$long_second=((($longitude-$long_degree)*60)-$long_minute)*60;
	}
	else if($longitude<0 && $latitude>=-180){
		$long_degree=intval($longitude);
		$long_minute=floor(($long_degree-$longitude)*60);
		$long_second=((($long_degree-$longitude)*60)-$long_minute)*60;
	}
	else {
	
		$longitude='67.064235';
		$long_degree=floor($longitude);
		$long_minute=floor(($longitude-$long_degree)*60);
		$long_second=((($longitude-$long_degree)*60)-$long_minute)*60;
	}
	//Lat Long to Degree formula ends here

	
	//Making link for google map
	return "https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=%2B".$lat_degree."%C2%B0+".$lat_minute."'+".$lat_second."%22,%2B".$long_degree."%C2%B0+".$long_minute."'+".$long_second."%22&aq=&ie=UTF8&t=m&z=".$zoom."&ll=".$latitude.",".$longitude."&output=embed";

}



function map_locator_function($attr)
{
$the_gmap_link=the_map_locator_method($attr);

	if(!isset($attr['width'])){
		$attr['width']='725';
	}
	if(!isset($attr['height'])){
		$attr['height']='350';
	}
	$width=$attr['width'];
	$height=$attr['height'];
	//Display google map
return "<iframe style='max-width:none;' width='".$width."' height='".$height."' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' 
src=".$the_gmap_link.">
</iframe>";
}

add_shortcode('Map_Locator', 'map_locator_function'); //Making Shortcode

class Map_Locator_Class extends WP_Widget{
	function __construct(){
		$params=array(
			'description' => 'Display map to your visitors.',
			'name'=>"Map Locator"
		);
		parent::__construct('Map_Locator_Class','',$params);
	}
	public function form($args)
	{
		extract($args);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" type="text" 
					id="<?php echo $this->get_field_id('title'); ?>" 
					name="<?php echo $this->get_field_name('title'); ?>" 
					value="<?php if(isset($title)){ echo esc_attr($title);} ?>"
					/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('latitude'); ?>">Latitude:</label>
			<input class="widefat" type="text" 
					id="<?php echo $this->get_field_id('latitude'); ?>" 
					name="<?php echo $this->get_field_name('latitude'); ?>" 
					value="<?php if(isset($latitude)){ echo esc_attr($latitude);} ?>"
					/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('longitude'); ?>">Longitude:</label>
			<input class="widefat" type="text" 
					id="<?php echo $this->get_field_id('longitude'); ?>" 
					name="<?php echo $this->get_field_name('longitude'); ?>" 
					value="<?php if(isset($longitude)){ echo esc_attr($longitude);} ?>"
					/>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('zoom'); ?>">Zoom Of Map (1-20):</label>
			<input class="widefat" type="text" 
					id="<?php echo $this->get_field_id('zoom'); ?>" 
					name="<?php echo $this->get_field_name('zoom'); ?>" 
					value="<?php if(isset($zoom)){ echo esc_attr($zoom);} ?>"
					/>
		</p>
		
		
		<?php
	}
	public function widget($args,$inst)
	{
		extract($args);
		extract($inst);
		if(empty($title))$title="Map Locator";
		echo $before_widget;
		echo $before_title . $title .$after_title;
			$argument=array(
				'zoom' => $zoom,
				'latitude' => $latitude,
				'longitude' => $longitude,
			);
			
			
			$the_gmap_link=the_map_locator_method($argument);
			//Display google map
			
			echo "<iframe style='max-width:none;' width='100%' height='100%' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' 
			src=".$the_gmap_link.">
			</iframe>";

		echo $after_widget;
	}
}
function map_locator_function_widget()
{
	register_widget('Map_Locator_Class');
}
add_action('widgets_init','map_locator_function_widget');



