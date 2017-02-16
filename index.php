<?php get_header(); ?>
<!-- content-outer -->
<div id="content-wrap" class="clear" >
	<!-- content -->
   <div id="content">
   	<!-- main -->
	   <div id="main">     	 
<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		// Your loop code
?>
            <div class="post">

      		<div class="right">

            	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
               <?php if ( has_post_thumbnail() ) : ?>
                	<div class="image-section">
	                   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	                      <img src="<?php the_post_thumbnail_url(); ?>" height="200" width="500"/>
	                   </a>
                        </div>
               <?php endif; ?>                     	   
               <p>
                <?php
		$excerpt = $post->post_excerpt;
		if (empty($excerpt)) {
            echo deel_strimwidth(strip_tags(apply_filters('the_content', strip_shortcodes($post->post_content))) , 0, 180 , '');
        } else {
            echo deel_strimwidth(strip_tags(apply_filters('the_excerpt', strip_shortcodes($post->post_excerpt))) , 0, 180 , ''); 
        } ?>
               </p>
               <p><a class="more" href="<?php the_permalink(); ?>">继续阅读 &raquo;</a></p>
            </div>
            <div class="left">
            	<p class="dateinfo"><?php echo get_the_date("m"); ?><span><?php echo get_the_date("d"); ?></span></p>
               	<div class="post-meta">
                  	<h4>Post Info</h4>
                     	<ul>
<?php
        if (!is_author() && !$_author) { ?>
         <li class="user">
	<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php
        echo get_the_author() ?></a></li>
	<?php
    } ?>

         <li class="time"><a href="#"><?php echo get_the_date("H:i:s"); ?></a></li>
<?php
    if (!$_comment) { ?>  <li class="comment"><?php
        if (comments_open()) echo '<a target="_blank" href="' . get_comments_link() . '">' . get_comments_number('0', '1', '%') . '评论</a>'
?></li><?php } ?>
         <li class="permalink"><a href="<?php echo the_permalink(); ?>">本文链接</a></li>
                        </ul>
               </div>

            </div>

	</div>
<?php
	endwhile;
else :
	echo wpautop( '对不起，当前没有文章' );
endif;
?>
<?php
deel_paging(); ?>
</div>   
        <!-- /main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

