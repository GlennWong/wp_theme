<?php get_header(); ?>

<?php if (have_posts()): bootstrap_breadcrumb();?>
	<div class="row-fluid">
		<div class="post-entry span12">
			<?php if (have_posts()): the_post(); ?>

				<h1 class="post-title text-center"><?php the_title();?></h1>
				<!-- end of post-title -->

				<div class="post-meta text-center topbot muted">
					<small>日期：<?php the_date();?> | 编辑：<?php the_author();?></small>
				</div><!-- end of .post-meta -->
				<hr>

				<div class="post-image">
					<?php if ( has_post_thumbnail()) : ?>
						<?php the_post_thumbnail("medium"); ?>
					<?php endif; ?>
				</div><!-- end of post-image -->


				<div class="post-content">
					<?php the_content();?>
				</div><!-- end of post-content -->

			<?php endif;?>
		</div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>