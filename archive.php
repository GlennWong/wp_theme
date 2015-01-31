<?php get_header(); ?>

<?php if (have_posts()):bootstrap_breadcrumb();?>

<div class="row-fluid">
<?php $tmp = get_the_category(); $tmp = $tmp[0]->category_parent;if($tmp):?>
	<div class="span2">
		<ul class="nav nav-pills nav-stacked text-center">
			<?php echo bootstrap_side_menu(); ?>
		</ul>
	</div>
	<div class="span10">
<?php else: ?>
	<div class="span12">
<?php endif;?>
	<!--查看是否有-->
	<?php while (have_posts()) : the_post(); ?>
		<div class="row-fluid">
			<div class="span3">
				<?php if (has_post_thumbnail()) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail("medium"); ?></a>
				<?php endif; ?>
			</div><!-- end of post-image -->

			<div class="span9">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<!-- end of .post-title -->
				<p>
				<?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 260,""); ?>
				</p>
				<!-- end of .post-excerpt -->
			</div>
		</div>
		<br>
	<?php endwhile; ?>

	<!--Paginations-->
	<?php if ($wp_query->max_num_pages > 1) : ?>
		<ul class="pager">
			<li class="next"><?php previous_posts_link('上一页 &#8250;'); ?></li>
			<li class="previous"><?php next_posts_link('&#8249; 下一页'); ?></li>
		</ul>
	<?php endif; ?>
	<!-- end of .navigation -->
	</div>
</div>

<?php endif; ?>
<?php get_footer(); ?>