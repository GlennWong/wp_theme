<?php get_header(); ?>

<?php if (have_posts()):bootstrap_breadcrumb();?>

<div class="row-fluid">
	<?php while (have_posts()) : the_post(); ?>
	<div class="third text-center" style="min-height:500px;">
		<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail("medium"); ?></a>
		<?php endif; ?>

		<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<p class="lefrig text-left"><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 240,""); ?></p>
	</div>
<?php endwhile;?>
</div>

<!--Paginations-->
<?php if ($wp_query->max_num_pages > 1) : ?>
	<ul class="pager">
		<li class="next"><?php previous_posts_link('上一页 &#8250;'); ?></li>
		<li class="previous"><?php next_posts_link('&#8249; 下一页'); ?></li>
	</ul>
<?php endif; ?>
<!-- end of .navigation -->

<?php endif; ?>

<?php get_footer(); ?>