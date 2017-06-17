<?php
/**
 * Beauty skin file for theme.
 */


//------------------------------------------------------------------------------
// Skin's fonts
//------------------------------------------------------------------------------

// Add skin fonts in the used fonts list
add_filter('theme_skin_fonts', 'theme_skin_fonts_beauty');
function theme_skin_fonts_beauty($theme_fonts) {
	$theme_fonts['Alegreya Sans'] = 1;
	return $theme_fonts;
}

// Add skin fonts in the main fonts list
add_filter('theme_skin_list_fonts', 'theme_skin_list_fonts_beauty');
function theme_skin_list_fonts_beauty($list) {
	//$list['Advent Pro'] = array('family'=>'sans-serif', 'link'=>'Advent+Pro:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic,cyrillic-ext');
	if (!isset($list['Alegreya Sans']))	$list['Alegreya Sans'] = array('family'=>'sans-serif');
	return $list;
}


//------------------------------------------------------------------------------
// Skin's stylesheets
//------------------------------------------------------------------------------

// Add skin stylesheets
add_action('theme_skin_add_stylesheets', 'theme_skin_add_stylesheets_beauty');
function theme_skin_add_stylesheets_beauty() {
	themerex_enqueue_style( 'theme-skin', themerex_get_file_url('/skins/beauty/beauty.css'), array('main-style'), null );
}

// Add skin responsive styles
add_action('theme_skin_add_responsive', 'theme_skin_add_responsive_beauty');
function theme_skin_add_responsive_beauty() {
	if (file_exists(themerex_get_file_dir('/skins/beauty/beauty-responsive.css'))) 
		themerex_enqueue_style( 'theme-skin-responsive', themerex_get_file_url('/skins/beauty/beauty-responsive.css'), array('theme-skin'), null );
}

// Add skin responsive inline styles
add_filter('theme_skin_add_responsive_inline', 'theme_skin_add_responsive_inline_beauty');
function theme_skin_add_responsive_inline_beauty($custom_style) {
	$custom_style .= '
		.openResponsiveMenu,
		.responsive_menu .menuTopWrap > ul > li > a
		{ font-size:14px; font-weight:400; }
	';
	return $custom_style;	
}


//------------------------------------------------------------------------------
// Skin's scripts
//------------------------------------------------------------------------------

// Add skin scripts
add_action('theme_skin_add_scripts', 'theme_skin_add_scripts_beauty');
function theme_skin_add_scripts_beauty() {
	if (file_exists(themerex_get_file_dir('/skins/beauty/beauty.js')))
		themerex_enqueue_script( 'theme-skin-script', themerex_get_file_url('/skins/beauty/beauty.js'), array('main-style'), null );
}

// Add skin scripts inline
add_action('theme_skin_add_scripts_inline', 'theme_skin_add_scripts_inline_beauty');
function theme_skin_add_scripts_inline_beauty() {
	?>
	if (THEMEREX_theme_font=='') THEMEREX_theme_font = 'Alegreya Sans';

	// Add skin custom colors in custom styles
	function theme_skin_set_theme_color(custom_style, clr) {
		custom_style += 
			'.theme_accent2,.sc_team .sc_team_item .sc_team_item_position'
			+'{ color:'+clr+'; }'
			+'.theme_accent2_bgc,.twitBlock,.twitBlockWrap,.sc_title_divider.theme_accent2 .sc_title_divider_before,.sc_title_divider.theme_accent2 .sc_title_divider_after,.sc_team .sc_team_item .sc_team_item_avatar:after,.sliderHomeBullets.slider_alias_5 .slide-1 .order a,.sliderHomeBullets.slider_alias_5 .slide-3 .order a'
			+'{ background-color:'+clr+'; }'
			+'.theme_accent2_bg'
			+'{ background:'+clr+'; }'
			+'.theme_accent2_border,.sliderHomeBullets.slider_alias_5 .slide-1 .order a,.sliderHomeBullets.slider_alias_5 .slide-3 .order a'
			+'{ border-color:'+clr+'; }';
		return custom_style;
	}

	// Add skin's main menu (top panel) back color in the custom styles
	function theme_skin_set_menu_bgcolor(custom_style, clr) {
		return custom_style;
	}

	// Add skin's main menu (top panel) fore colors in the custom styles
	function theme_skin_set_menu_color(custom_style, clr) {
		return custom_style;
	}

	// Add skin's user menu (user panel) back color in the custom styles
	function theme_skin_set_user_menu_bgcolor(custom_style, clr) {
		custom_style +=
			'.userHeaderSection.custom > .sc_section'
			+' { background-color: '+clr+'; }'
			
			+'.userFooterSection.custom > .sc_section'
			+' { background-color: '+clr+'; }';

		return custom_style;
	}

	// Add skin's user menu (user panel) fore colors in the custom styles
	function theme_skin_set_user_menu_color(custom_style, clr) {
		return custom_style;
	}
	<?php
}


//------------------------------------------------------------------------------
// Get/Set skin's main (accent) theme color
//------------------------------------------------------------------------------

// Return main theme color (if not set in the theme options)
add_filter('theme_skin_get_theme_color', 'theme_skin_get_theme_color_beauty', 10, 1);
function theme_skin_get_theme_color_beauty($clr) {
	return empty($clr) ? '#b03f73' : $clr;
}

// Return main theme bg color
add_filter('theme_skin_get_theme_bgcolor', 'theme_skin_get_theme_bgcolor_beauty', 10, 1);
function theme_skin_get_theme_bgcolor_beauty($clr) {
	return '#ffffff';
}

// Add skin's specific theme colors in the custom styles
add_filter('theme_skin_set_theme_color', 'theme_skin_set_theme_color_beauty', 10, 2);
function theme_skin_set_theme_color_beauty($custom_style, $clr) {
	$custom_style .= '
		.theme_accent2,
		.sc_team .sc_team_item .sc_team_item_position,
		.twitBlock .sc_slider .flex-direction-nav li:hover a:before
		{ color:'.$clr.'; }
		.theme_accent2_bgc,
		.twitBlock,
		.twitBlockWrap,
		.sc_title_divider.theme_accent2 .sc_title_divider_before,
		.sc_title_divider.theme_accent2 .sc_title_divider_after,
		.sc_team .sc_team_item .sc_team_item_avatar:after,
		.sliderHomeBullets.slider_alias_5 .slide-1 .order a,
		.sliderHomeBullets.slider_alias_5 .slide-3 .order a
		{ background-color:'.$clr.'; }
		.theme_accent2_bg
		{ background:'.$clr.'; }
		.theme_accent2_border,
		.sliderHomeBullets.slider_alias_5 .slide-1 .order a,
		.sliderHomeBullets.slider_alias_5 .slide-3 .order a
		{ border-color:'.$clr.'; }
	';
	return $custom_style;
}


//------------------------------------------------------------------------------
// Get/Set skin's main menu (top panel) color
//------------------------------------------------------------------------------

// Return skin's main menu (top panel) background color (if not set in the theme options)
add_filter('theme_skin_get_menu_bgcolor', 'theme_skin_get_menu_bgcolor_beauty', 10, 1);
function theme_skin_get_menu_bgcolor_beauty($clr) {
	return empty($clr) ? '#b03f73' : $clr;
}

// Add skin's main menu (top panel) background color in the custom styles
add_filter('theme_skin_set_menu_bgcolor', 'theme_skin_set_menu_bgcolor_beauty', 10, 2);
function theme_skin_set_menu_bgcolor_beauty($custom_style, $clr) {
	return $custom_style;
}

// Add skin's main menu (top panel) fore colors in custom styles
add_filter('theme_skin_set_menu_color', 'theme_skin_set_menu_color_beauty', 10, 2);
function theme_skin_set_menu_color_beauty($custom_style, $clr) {
	return $custom_style;
}


//------------------------------------------------------------------------------
// Get/Set skin's user menu (user panel) color
//------------------------------------------------------------------------------

// Return skin's user menu color (if not set in the theme options)
add_filter('theme_skin_get_user_menu_bgcolor', 'theme_skin_get_user_menu_bgcolor_beauty', 10, 1);
function theme_skin_get_user_menu_bgcolor_beauty($clr) {
	return empty($clr) ? '#070e2b' : $clr;
}

// Add skin's user menu (user panel) background color in the custom styles
add_filter('theme_skin_set_user_menu_bgcolor', 'theme_skin_set_user_menu_bgcolor_beauty', 10, 2);
function theme_skin_set_user_menu_bgcolor_beauty($custom_style, $clr) {
	$custom_style .= '
.userHeaderSection.custom > .sc_section {
	background-color: '.$clr.'; 
}

.userFooterSection.custom > .sc_section { 
	background-color: '.$clr.'; 
}
	';

	return $custom_style;
}

// Add skin's user menu (user panel) fore colors in custom styles
add_filter('theme_skin_set_user_menu_color', 'theme_skin_set_user_menu_color_beauty', 10, 2);
function theme_skin_set_user_menu_color_beauty($custom_style, $clr) {
	return $custom_style;
}
?>