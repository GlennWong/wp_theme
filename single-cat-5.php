<?php if (have_posts()):bootstrap_breadcrumb();?>
	<div class="row-fluid">
		<div class="span3">
			<?php if (!dynamic_sidebar('bdfb')):?>请在后台>外观>小工具>榜单发布<?php endif;?>
		</div>
		<div class="span9 post-entry pull-right">
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