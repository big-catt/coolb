<?php get_header() ?>
<!-- content-outer -->
<div id="content-wrap" class="clear" >
	<!-- content -->
   <div id="content">
   	<!-- main -->
	   <div id="main">   
               <?php
while (have_posts()):
    the_post(); ?>
          <header class="article-header">
			<h3 class="article-title"><a href="<?php
    the_permalink() ?>"><?php
    the_title(); ?></a></h3>
			<div class="meta">
				<span class="muted"><i class="fa fa-user"></i> <a href="<?php
    echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php
    echo get_the_author() ?></a></span>
				<time class="muted"><i class="fa fa-clock-o"></i> <?php
    echo get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ?></time>
				<span class="muted"><i class="fa fa-eye"></i> <?php
    deel_views('次浏览'); ?></span>
				<?php
    if (comments_open()) echo '<span class="muted"><i class="fa fa-comments-o"></i> <a href="' . get_comments_link() . '">' . get_comments_number('0', '1', '%') . '个评论</a></span>'; ?>
				<span class="muted"><?php
    edit_post_link('[编辑]'); ?></span>
			</div>
		</header>
               <div class="post">

                   <article class="article-content">
                
                <p>
                    <?php
    the_content(); ?>
                </p>
                <?php
    wp_link_pages(array(
        'before' => '<div class="fenye">',
        'after' => '',
        'next_or_number' => 'next',
        'previouspagelink' => '<span>上一页</span>',
        'nextpagelink' => ""
    )); ?>   <?php
    wp_link_pages(array(
        'before' => '',
        'after' => '',
        'next_or_number' => 'number',
        'link_before' => '<span>',
        'link_after' => '</span>'
    )); ?>   <?php
    wp_link_pages(array(
        'before' => '',
        'after' => '</div>',
        'next_or_number' => 'next',
        'previouspagelink' => '',
        'nextpagelink' => "<span>下一页</span>"
    )); ?>
                
                </article>
               </div>
               <?php
endwhile; ?>
               <footer class="article-footer">
			<?php
the_tags('<div class="article-tags"><i class="fa fa-tags"></i>', '', '</div>'); ?>
</footer>
               <?php comments_template(); ?>  
           </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

