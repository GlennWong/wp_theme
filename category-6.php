<?php get_header(); ?>
<?php if (have_posts()):bootstrap_breadcrumb();?>

<div class="row-fluid">
	<div class="span2">
		<?php if (!dynamic_sidebar('yjjj')):?>请在后台>外观>小工具>研究借鉴<?php endif;?>
	</div>
	<!--The Large One-->
	<div class="span10 pull-right">
	<?php if (have_posts()) : the_post(); ?>
		<div class="row-fluid">
			<div class="text-center">
				<?php if (has_post_thumbnail()) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail("large"); ?></a>
				<?php endif; ?>
			</div><!-- end of post-image -->

			<h2 class="text-center topbot"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<!-- end of .post-title -->
			<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 300,""); ?></p>
			<!-- end of .post-excerpt -->
		</div>
		<br>
	<?php endif; ?>
	<!--The List -->
	<?php $posts = query_posts("cat=6&posts_per_page=4&offset=1&order=desc"); ?>
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
<?php endif;?>
<?php get_footer(); ?>