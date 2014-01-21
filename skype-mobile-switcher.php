<?php
/*
Plugin Name: Skype Mobile Switcher
Plugin URI: http://schurpf.com/skype-mobile-switcher
Description: Ads a simple short tag to add clickable phone numbers for mobile devices and skype calls for mobile
Version: 0.0
Stable Tag: 0.0
Author: Schurpf
Author URI: http://schurpf.com
Text Domain: skype-mobile-switcher

GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


function schurpf_wp_phone_number( $atts, $content = null ) {
	extract( shortcode_atts( array(
				'number' => '',
			), $atts , 'phone' ) );
	if (! is_null( $content )){
		$number = $content;
	} 
	if ( wp_is_mobile() ) {
		return '<a href="tel:'.schurpf_format_phone_number( $number ).'">'.$number.'</a>';
	}  else {
		return '<a href="skype:'.schurpf_format_phone_number( $number ).'">'.$number.'</a>';
	}
}
add_shortcode( 'phone', 'schurpf_wp_phone_number' );

function schurpf_format_phone_number( $number ) {
	$search  = array( ' ', '-', '.' );
	$replace = array( '', '', '' );
	return str_replace( $search, $replace, $number );
}
