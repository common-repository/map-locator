=== Map Locator ===
Contributors: Usama_Noman
Website link: http://9to5Best.com/
Donate link: http://9to5Best.com/
Tags: map, google maps, WP maps, Map Location
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
Map locator is easy to use plugin, which uses map API of google, to show users any location in your website page or widget. The most common use of this plugin would be to show website visitors where in map your company, hotel, hospital, school, college, university locate. All you need to know are coordinates of your position, you fill them out and there you are with google map locating your position.


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `map_locator.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
OR you can directly make a zip and upload the plugin through upload option in plugin section in WordPress admin panel.
== Frequently Asked Questions ==

Q-How to Use?

Map locator comes with two in one, “widget and short code”, uses.

Map Locator Widget:

To display map in your sidebar you need to activate the plugin. After activating the plugin you will be able to see our plugin by the name “Map Locator” in wordpress widget section. You will have to drag that to sidebar to active. By default if you don’t fill in the form the plugin will display our location (Don’t worry you can easily change them, see modify plugin section in this document). The widget form has four fields namely, title, latitude, longitude, and zoom. Zoom tell the zoom of google map you want to display and it ranges from value 1 to 20. The latitude value can lie between -90 to +90 and longitude value can lie between -180 to +180. In case if you don’t give it right values we will still show our location on your map as default.

Map Locator short code:

You can use short code in your pages and posts, all you will need to write.

[Map_Locator]
Since this doesn’t tell proper coordinates the map will show the default location which is ours. [Map_Locator] takes five difference values.

Q- What are default settings?

Zoom: Tells zoom of google map. (Default is 14)
Width: Tells width of google map which will appear on your website. (Default is 725)
Height: Tells height of google map which will appear on your website. (Default is 350)
Latitude: Tells latitude position of your location in google map. (Default is 24.878489)
Longitude: Tells Longitude position of your location in google map. (Default is 67.064235)

Q- I need an example to use the shortcode.

Example:

[Map_Locator width=”850” height=”470” zoom=”14” latitude=”24.678” longitude=”67.852”]
Changing Default Value:


If you exact our plugin to some folder and open up our file that is map_locator.php, replace all occurrences of 24.878489 with your latitude value and 67.064235 with your longitude value.



Better Use Now:

You can now just drag and drop the widget without entering any value to the form, and still you will see your location in map, it is because you have replaced the default coordinates. If you fill form your default values will override by new ones.

Similarly writing short code [Map_Locator] will display your location. Guess what? You still have access to those features to override default with new values at any time.

In most cases the plugin not only shows the desired location but also the nearest location listed in google maps. Hence makes your appearance and business grow more quickly.



== Screenshots ==

1. No screenshot description available. 

== Changelog ==

= 1.0 =
* No change, first version.

== Upgrade Notice ==

= 1.0 =
There is no upgrade of this plugin yet so far.


Hope you understand the documentation; feel free to drop any comments and feedbacks about this plugin.