<?php get_header(); ?>
<?php if (have_posts()):bootstrap_breadcrumb();?>
	<div class="row-fluid">
		<div class="span9">
			<ul class="nav nav-pills text-center">
				<?php echo bootstrap_side_menu(); ?>
				<li class="pull-right"><a href="/wp-admin/post-new.php">我要发帖</a></li>
			</ul>
			<?php while (have_posts()): the_post(); ?>

			<div class="row-fluid topbot">
				<div class="span2 text-center">
					<?php echo get_avatar('','100');?>
					<?php echo get_the_author();?>
				</div>

				<div class="span10">

					<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

					<div class="post-excerpt topbot">
						<?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 370,""); ?>
					</div>

					<?php $comments = get_comments("number=3&post_id=".$post->ID);
						if ($comments) { ?>
							<div style="background-color:#EEEEEE;padding:5px 10px;">
								<?php foreach ($comments as $comments => $comment) { ?>
									<p style="border-bottom:1px dashed #BBBBBB;">
										<?php echo $comment->comment_author."：".$comment->comment_content; ?>
									</p>
								<?php }?>
							</div>
					<?php	} ?>

				</div>
			</div>

			<?php endwhile;?>
		</div>
		<div class="span3 pull-right">
			<?php lg_popular_posts();?>
		</div>
	</div>
<?php endif;?>
<?php get_footer(); ?>