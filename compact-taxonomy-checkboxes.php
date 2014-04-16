<?php

/*
Plugin Name: Compact Taxonomy Checkboxes
Plugin URI: https://github.com/benhuson/compact-taxonomy-checkboxes
Description: Collapse and reduce the height of hierarchical category and taxonomy panels in the WordPress admin.
Version: 1.1
Author: Ben Huson
Author URI: http://www.benhuson.co.uk/
License: GPL2
*/

/*
Copyright 2012 Ben Huson (email : ben@thewhiteroom.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action( 'admin_init', 'compact_taxonomy_checkboxes_admin_init' );
function compact_taxonomy_checkboxes_admin_init() {
	global $wp_version;
	if ( version_compare( $wp_version, '3.5.dev', '<' ) ) {
		add_action( 'admin_head', 'compact_taxonomy_checkboxes_admin_head' );
	} else {
		if ( is_plugin_active( plugin_basename( __FILE__ ) ) ) {
    		add_action( 'admin_notices', 'compact_taxonomy_checkboxes_admin_notices' );
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}
	}
}

function compact_taxonomy_checkboxes_admin_notices() {
    echo '<div id="message" class="error">';
    echo '<p><strong>The Compact Taxonomy Checkboxes plugin has been disabled as you are using WordPress 3.5+ which includes this functionality by default.</strong> You may delete this plugin as it is only useful for earlier versions of WordPress.</p>';
    echo '</div>';
}

function compact_taxonomy_checkboxes_admin_head() {
	echo '
<style type="text/css">
.posttypediv div.tabs-panel,
.taxonomydiv div.tabs-panel,
.categorydiv div.tabs-panel { 
height: auto;
max-height: 200px;
padding-bottom: 0.8em;
}
</style>
	';
}
