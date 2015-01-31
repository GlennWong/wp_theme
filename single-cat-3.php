<?php if (have_posts()):bootstrap_breadcrumb();?>
	<div class="row-fluid">
		<div class="post-entry span9">
			<?php if (have_posts()): the_post(); ?>

				<h1 class="post-title text-center"><?php the_title();?></h1>
				<!-- end of post-title -->

				<div class="post-meta text-center topbot muted">
					<small>日期：<?php the_date();?> | 编辑：<?php the_author();?></small>
				</div><!-- end of .post-meta -->
				<hr>

				<!-- end of post-image -->

				<div class="post-content">
					<?php the_content();?>
				</div><!-- end of post-content -->

				<?php lg_related_posts();?>

			<?php endif;?>
		</div>
		<div class="span3 pull-right">
			<?php if (!dynamic_sidebar('lymdd')):?>旅游目的地<?php endif;?>
			<?php if (!dynamic_sidebar('tjlymdd')):?>推荐旅游目的地<?php endif;?>
		</div>
	</div>


<?php endif; ?>