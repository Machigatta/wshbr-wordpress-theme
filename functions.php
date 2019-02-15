<?php
get_template_part('userfuncts');

function wshbr_script_enqueue() {
    wp_enqueue_style('bootstrap_style', get_template_directory_uri() . '/bootstrap/css/bootstrap.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap_style', get_template_directory_uri() . '/bootstrap/css/bootstrap-theme.css', array(), '1.0.0', 'all');
	wp_enqueue_style('wp_style', get_template_directory_uri() . '/css/wp.css', array(), '1.0.0', 'all');
	wp_enqueue_style('fa_style', get_template_directory_uri() . '/css/fontawesome/css/fontawesome-all.min.css', array(), '1.0.0', 'all');
	wp_enqueue_style('animate_style', get_template_directory_uri() . '/css/animate.css', array(), '1.0.0', 'all');
    wp_enqueue_style('menu_style', get_template_directory_uri() . '/css/menu.css', array(), '1.0.0', 'all');
	
    wp_enqueue_style('main_style', get_template_directory_uri() . '/css/base.css', array(), '1.0.0', 'all');
    
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.1.1.min.js', array(), '3.1.1', false);
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ), '1.0.0', false );
    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/initial.js', array('jquery'), '1.0.0', true);   
}

add_action('wp_enqueue_scripts', 'wshbr_script_enqueue');

function wshbr_theme_setup(){
    add_theme_support('menus');
    add_theme_support( 'post-thumbnails' );

    register_nav_menu('primary', 'the header menu');
    register_nav_menu('secondary', 'the footer menu');
}

add_action('init', 'wshbr_theme_setup');


class CSS_Menu_Walker extends Walker {

	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
	
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}
	
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	
		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		
		/* Add active class */
		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
		}
		
		/* Check for children */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}
		
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;
		
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
	
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}

function pagination($range = 3, $show_one_pager = true, $show_page_hint = false)
{
    global $wp_query;
    $num_of_pages = (int)$wp_query->max_num_pages;
    if(!is_single() && $num_of_pages > 1)
    {
        $current_page = get_query_var('paged') === 0 ? 1 : get_query_var('paged');
        $num_of_display_pages = ($range * 2) + 1;        

        $output = '<div id="pagination">';

        if($show_page_hint)
        {
            $output .= '<span>Seite ' . $current_page . ' von ' . $num_of_pages . '</span>';
        }
		
		if($current_page > 2 && $current_page > $range + 1 && $num_of_display_pages < $num_of_pages)
		{
			$output .= '<a href="' . get_pagenum_link(1) . '" title="Seite 1 - Neueste Artikel">«</a>';
		}
		if($show_one_pager && $current_page > 1)
		{
			$output .= '<a href="' . get_pagenum_link($current_page - 1) . '" title="Seite ' . ($current_page - 1) . ' - Neuere Artikel">‹</a>';
		}

		for($i = 1; $i <= $num_of_pages; $i++)
		{
			if($i < $current_page + $range + 1 && $i > $current_page - $range - 1)
            {
				if($current_page === $i)
				{
					$output .= '<span class="current">' . $i . '</span>';
				}
				else
				{
					$output .= '<a href="' . get_pagenum_link($i) . '" title="Seite ' . $i . '" >' . $i . '</a>';
				}
            }
		}
		
		if($show_one_pager && $current_page < $num_of_pages)
		{
			$output .= '<a href="' . get_pagenum_link($current_page + 1) . '" title="Seite ' . ($current_page + 1) . ' - Ältere Artikel">›</a>';
		}
		if($current_page < $num_of_pages - 1 && $current_page + $range < $num_of_pages && $num_of_display_pages < $num_of_pages)
		{
			$output .= '<a href="' . get_pagenum_link($num_of_pages) . '" title="Seite ' . $num_of_pages . ' - Älteste Artikel">»</a>';
		}

		$output .= '</div>';

        return $output;
    }else{
		$output = '<div id="pagination">';
		$output .= "<i class='fa'><img class='img-responsive' src='https://wshbr.de/wp-content/uploads/2017/01/main-icon.png' style='height:14px'></i><i> Mehr konnten wir leider nicht finden. </i><i class='fa'><img class='img-responsive' src='https://wshbr.de/wp-content/uploads/2017/01/main-icon.png' style='height:14px'></i>";
		$output .= '</div>';

		return $output;
	}
}
