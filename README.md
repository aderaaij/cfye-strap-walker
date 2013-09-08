CFYE-Strap Wordpress menu-walker plugin
=================

This Wordpress Menu walker plugin is made to support font-icons both before and after the menu-text by adding classes.

This plugin is originally created for http://cfye.com. 

Note that this plugin does not include any font-icons, css styling or javascript. 

### Instructions

* Install the plugin by uploading the files to your plugin folder or installing it via the WP admin
* Add theme support for the custom walker. [wp_nav_menu reference](http://codex.wordpress.org/Function_Reference/wp_nav_menu)
		wp_nav_menu(
			array(
				'menu'       => 'side_menu',
				'depth'      => 3,
				'container'  => false,
				'menu_class' => 'nav nav-tabs nav-stacked',
				//CFYE Strap nav plugin call
				'walker' => new cfye_strap_nav()
	   		)
		);
* Add font-icon classes in Wordpress back-end
* Style with CSS 

### Originally based on twitter_bootstrap_nav_walker:

 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom Wordpress nav walker to implement the Twitter Bootstrap 2 (https://github.com/twitter/bootstrap/) dropdown navigation using the Wordpress built in menu manager.
 * Version: 1.2.2
 * Author: Edward McIntyre - @twittem
 * Licence: WTFPL 2.0 (http://sam.zoy.org/wtfpl/COPYING)
