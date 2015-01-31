<?php

register_nav_menu( 'top-menu', 'Top Menu' );
register_nav_menu( 'footer-menu', 'Footer Menu' );

/*** 特色图像 ***/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 300, 250, true );
/*** 修改默认jquery版本 ***/
function add_scripts() { 
  wp_deregister_script( 'jquery' ); 
  wp_register_script( 'jquery', 'http://libs.baidu.com/jquery/1.9.1/jquery.min.js'); 
  wp_enqueue_script( 'jquery' ); 
}

add_action('wp_enqueue_scripts', 'add_scripts');
/*** Bootstrap Breadcrumb ***/

function bootstrap_breadcrumb() {

  $delimiter = '&raquo;';
  $name = '<a href="/">首页</a>'; //text for the 'Home' link
  $currentBefore = '<li class="active">';
  $currentAfter = '</li>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<ul class="breadcrumb">';
 
    global $post;
    $home = get_bloginfo('url');
    echo '' . $name . ' ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . '';
      single_cat_title();
      echo '' . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
      echo '' . get_the_time('F') . ' ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '' . get_the_title($page->ID) . '';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</ul>';
 
  }
}

/*** Bootstrap Breadcrumb ***/

function bootstrap_side_menu (){
  $tmp = get_the_category();
  $curcatid = $tmp[0]->category_parent;
  if($curcatid){
    wp_list_categories("hide_empty=0&style=list&title_li=&orderby=id&child_of=".$curcatid); 
  }else{
    return false;
  }
}

/*** Bootstrap Nav Menu ***/

class GWalker_Nav_Menu extends Walker_Nav_Menu {   

    public function start_lvl( &$output, $depth = 0, $args = array() ) {   
        $indent = str_repeat( "\t", $depth );   
        $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";   
    }   
  
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {   
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';   

        if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {   
            $output .= $indent . '<li role="presentation" class="divider">';   
        } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {   
            $output .= $indent . '<li role="presentation" class="divider">';   
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {   
            $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );   
        } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {   
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';   
        } else {   
  
            $class_names = $value = '';   
  
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;   
            $classes[] = 'menu-item-' . $item->ID;   
  
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );   
  
            if ( $args->has_children )   
                $class_names .= ' dropdown';   
  
            if ( in_array( 'current-menu-item', $classes ) )   
                $class_names .= ' active';   
  
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';   
  
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );   
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';   
  
            $output .= $indent . '<li' . $id . $value . $class_names .'>';   
  
            $atts = array();   
            $atts['title']  = ! empty( $item->title )   ? $item->title  : '';   
            $atts['target'] = ! empty( $item->target )  ? $item->target : '';   
            $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';   
  
            // If item has_children add atts to a.   
            if ( $args->has_children && $depth === 0 ) {   
                $atts['href']           = '#';   
                $atts['data-toggle']    = 'dropdown';   
                $atts['class']          = 'dropdown-toggle';   
                $atts['aria-haspopup']  = 'true';   
            } else {   
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';   
            }   
  
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );   
  
            $attributes = '';   
            foreach ( $atts as $attr => $value ) {   
                if ( ! empty( $value ) ) {   
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );   
                    $attributes .= ' ' . $attr . '="' . $value . '"';   
                }   
            }   
  
            $item_output = $args->before;   

            if ( ! empty( $item->attr_title ) )   
                $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';   
            else  
                $item_output .= '<a'. $attributes .'>';   
  
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;   
            $item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';   
            $item_output .= $args->after;   
  
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );   
        }   
    }   
  
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {   
        if ( ! $element )   
            return;   
  
        $id_field = $this->db_fields['id'];   
  
        // Display this element.   
        if ( is_object( $args[0] ) )   
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );   
  
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );   
    }   
 
    public static function fallback( $args ) {   
        if ( current_user_can( 'manage_options' ) ) {   
  
            extract( $args );   
  
            $fb_output = null;   
  
            if ( $container ) {   
                $fb_output = '<' . $container;   
  
                if ( $container_id )   
                    $fb_output .= ' id="' . $container_id . '"';   
  
                if ( $container_class )   
                    $fb_output .= ' class="' . $container_class . '"';   
  
                $fb_output .= '>';   
            }   
  
            $fb_output .= '<ul';   
  
            if ( $menu_id )   
                $fb_output .= ' id="' . $menu_id . '"';   
  
            if ( $menu_class )   
                $fb_output .= ' class="' . $menu_class . '"';   
  
            $fb_output .= '>';   
            $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';   
            $fb_output .= '</ul>';   
  
            if ( $container )   
                $fb_output .= '</' . $container . '>';   
  
            echo $fb_output;   
        }   
    }   
}  

/*** Bootstrap Customize Sidebar ***/

register_sidebar(array(
  'name' => '唐人指数',
  'description' => '唐人指数页面左侧栏菜单',
  'id' => 'trzs',
  'before_title' => '<div class="widget-title">',
  'after_title' => '</div>',
  'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
  'after_widget' => '</div>'
));
register_sidebar(array(
  'name' => '榜单发布',
  'description' => '榜单发布页面左侧栏菜单',
  'id' => 'bdfb',
  'before_title' => '<div class="widget-title">',
  'after_title' => '</div>',
  'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
  'after_widget' => '</div>'
));
register_sidebar(array(
  'name' => '研究借鉴',
  'description' => '研究借鉴',
  'id' => 'yjjj',
  'before_title' => '<div class="widget-title">',
  'after_title' => '</div>',
  'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
  'after_widget' => '</div>'
));
register_sidebar(array(
  'name' => '服务内容',
  'description' => '服务内容',
  'id' => 'fwnr',
  'before_title' => '<div class="widget-title">',
  'after_title' => '</div>',
  'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
  'after_widget' => '</div>'
));

/* The Hero Unit Simple */
register_sidebar(array(
  'name' => '广告',
  'description' => '首页->广告',
  'id' => 'index-ad',
  'before_title' => '<div class="widget-title">',
  'after_title' => '</div>',
  'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
  'after_widget' => '</div>'
));

/* The Hero Unit Large */
register_sidebar(array(
  'name' => '合作伙伴',
  'description' => '首页->合作伙伴',
  'id' => 'partner-list',
  'before_title' => '<div class="widget-title">',
  'after_title' => '</div>',
  'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
  'after_widget' => '</div>'
));

register_sidebar(array(
  'name' => '旅游目的地',
  'description' => '旅游目的地->文章页面->右侧栏',
  'id' => 'lymdd',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
  'after_widget' => '</div>'
));

register_sidebar(array(
  'name' => '推荐旅游目的地',
  'description' => '旅游目的地->文章页面->右侧栏',
  'id' => 'tjlymdd',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
  'after_widget' => '</div>'
));

/*** 热门话题 ***/

function lg_popular_posts(){
  wp_reset_query();
  echo "<h3>热门话题</h3>";
  query_posts('cat=7,8,17&showposts=10&orderby=comment_count&order=desc');
  echo "<ul class='post-siderbar'>";
  while (have_posts()) : the_post();
    echo "<li><a href='";
      the_permalink();
    echo "' title='";
      the_title();
    echo "'>";
      the_title();
    echo "</a></li>";
  endwhile;
  echo "</ul>";
  wp_reset_query();
}

/*** 相关文章 ***/

function lg_related_posts(){
  wp_reset_query();

  global $post;
  $cat = wp_get_post_categories($post->ID);
  if ($cat) {
    $args = array(
      'category__in' => array($cat[0]),
      'post__not_in' => array($post->ID),
      'showposts' => 4
      );
    query_posts($args);

    echo "<hr><h3>相关文章</h3>";

    echo "<ul class='post-bottom inline'>";
    while (have_posts()) {
      the_post();
      echo "<li><a href='";
        the_permalink();
      echo "' rel='bookmark' title='";
        the_title_attribute();
      echo "'>";
        the_title();
      echo "</a></li>";
    }
    echo "</ul>";
    wp_reset_query();
  }
}


?>