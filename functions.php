<?php
//前台加载，看需要注释之；
add_action( 'wp_enqueue_scripts', 'devework_replace_open_sans' );
//后台加载，应该都需要的了
add_action('admin_enqueue_scripts', 'devework_replace_open_sans');
//隐藏admin Bar
add_filter( 'show_admin_bar', '__return_false' );
//注册侧单号航
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( '首页主导航' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
//显示文章摘要
function deel_strimwidth($str, $start, $width, $trimmarker) {
    $output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $start . '}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $width . '}).*/s', '\1', $str);
    return $output . $trimmarker;
}
//显示小工具
if (function_exists('register_sidebar')){
    register_sidebar(array(
        'before_widget' => '<div class="sidebox">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
//浏览次数
if (!function_exists('deel_views')):
    function deel_record_visitors() {
        if (is_singular()) {
            global $post;
            $post_ID = $post->ID;
            if ($post_ID) {
                $post_views = (int)get_post_meta($post_ID, 'views', true);
                if (!update_post_meta($post_ID, 'views', ($post_views + 1))) {
                    add_post_meta($post_ID, 'views', 1, true);
                }
            }
        }
    }
    add_action('wp_head', 'deel_record_visitors');
    function deel_views($after = '') {
        global $post;
        $post_ID = $post->ID;
        $views = (int)get_post_meta($post_ID, 'views', true);
        echo $views, $after;
    }
endif;
//
function aurelius_comment($comment, $args, $depth)    
{   
   $GLOBALS['comment'] = $comment; ?>   
   <li class="comment" id="li-comment-<?php comment_ID(); ?>">   
        <div class="gravatar"> 
      <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>   
 <?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
        </div>   
        <div class="comment_content" id="comment-<?php comment_ID(); ?>">      
            <div class="clearfix">   
                    <?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?>   
                    <div class="comment-meta commentmetadata">发表于：<?php echo get_comment_time('Y-m-d H:i'); ?></div>   
                    &nbsp;&nbsp;&nbsp;<?php edit_comment_link('修改'); ?>   
            </div>   
  
            <div class="comment_text">   
                <?php if ($comment->comment_approved == '0') : ?>   
                    <em>你的评论正在审核，稍后会显示出来！</em><br />   
        <?php endif; ?>   
        <?php comment_text(); ?>   
            </div>   
        </div>   
    </li>   
<?php 
}  
//首页分页
if (!function_exists('deel_paging')):
    function deel_paging() {
        $p = 4;
        if (is_singular()) return;
        global $wp_query, $paged;
        $max_page = $wp_query->max_num_pages;
        if ($max_page == 1) return;
        echo '<div class="pagination"><ul>';
        if (empty($paged)) $paged = 1;
        // echo '<span class="pages">Page: ' . $paged . ' of ' . $max_page . ' </span> ';
        echo '<li class="prev-page">';
        previous_posts_link('上一页');
        echo '</li>';
        if ($paged > $p + 1) p_link(1, '<li>第一页</li>');
        if ($paged > $p + 2) echo "<li><span>&middot;&middot;&middot;</span></li>";
        for ($i = $paged - $p; $i <= $paged + $p; $i++) {
            if ($i > 0 && $i <= $max_page) $i == $paged ? print "<li class=\"active\"><span>{$i}</span></li>" : p_link($i);
        }
        if ($paged < $max_page - $p - 1) echo "<li><span> ... </span></li>";
        //if ( $paged < $max_page - $p ) p_link( $max_page, '&raquo;' );
        echo '<li class="next-page">';
        next_posts_link('下一页');
        echo '</li>';
        // echo '<li><span>共 '.$max_page.' 页</span></li>';
        echo '</ul></div>';
    }
    function p_link($i, $title = '') {
        if ($title == '') $title = "第 {$i} 页";
        echo "<li><a href='", esc_html(get_pagenum_link($i)) , "'>{$i}</a></li>";
    }
endif;
