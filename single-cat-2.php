<?php if (have_posts()):bootstrap_breadcrumb();?>
	<div class="row-fluid">
		<div class="span2">
			<?php if (!dynamic_sidebar('trzs')) : ?>唐人指数左边导航请在后台<?php endif;?>
		</div>
		<div class="post-entry span10 pull-right">
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

			<?php endif;?>
		</div>

	</div>
<?php endif;?>