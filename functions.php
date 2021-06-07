<?php
define( 'THEME_VERSION'  , '3.0' );
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/module/theme_panel_set/' );
require_once dirname( __FILE__ ) . '/module/theme_panel_set/options-framework.php';
require_once dirname( __FILE__ ) . '/module/theme_panel_set/panel-js.php';
$optionsfile = locate_template( 'options.php' );load_template( $optionsfile );
require_once get_stylesheet_directory() . '/module/config/fun-navwalker.php';
require_once get_stylesheet_directory() . '/module/config/fun-optimize.php';
require_once get_stylesheet_directory() . '/module/config/fun-global.php';
require_once get_stylesheet_directory() . '/module/config/fun-mail.php';
require_once get_stylesheet_directory() . '/module/config/fun-user.php';
require_once get_stylesheet_directory() . '/module/config/fun-seo.php';
require_once get_stylesheet_directory() . '/module/config/fun-comments.php';
require_once get_stylesheet_directory() . '/module/config/fun-admin.php';
require_once get_stylesheet_directory() . '/module/config/fun-article.php';
if( get_boxmoe('no_categoty') ) require_once get_stylesheet_directory() . '/module//config/fun-no-category.php';
//以下可以自定义fun函数
//定义bbcode：收缩/展开
function xcollapse($atts, $content = null){
	extract(shortcode_atts(array("title"=>""),$atts));
	return '<div style="margin: 0.5em 0;">
		<div class="xControl">
			<span class="xTitle"></span>
			<a href="javascript:void(0)" class="collapseButton xButton">'.$title.'</a>
			<div style="clear: both;"></div>
		</div>
		<div class="xContent" style="display: none;">'.$content.'</div>
	</div>';
}
add_shortcode('collapse', 'xcollapse');
//添加展开/收缩快捷标签按钮
function appthemes_add_collapse() {if (wp_script_is('quicktags')){
?><script type="text/javascript">// <![CDATA[
QTags.addButton( 'collapse', '展开/收缩按钮', '[collapse title="说明文字"]','[/collapse]' );
// ]]></script><?php }} add_action('admin_print_footer_scripts', 'appthemes_add_collapse' );


