<?php
/*
 * Template Name:  首页模板
 *
 * @file           home.php
 * @package        Legstrong
 * @author         legstrong
 * @copyright      2014 Legstrong
 * @version        Release: 1.0.0
 */
get_header(); ?>

<div class="row">
	<div class="span7">
		<?php echo do_shortcode("[metaslider id=644]"); ?>
	</div>
	<div class="span3 pull-right">
		<a href="/?p=839">
		<div>
			<img src="<?php echo get_template_directory_uri();?>/images/nianhui.png" width="100%">
		</div>
		</a>
		<div style="margin-top:4px;">
			<a href="/?p=700"><img src="<?php echo get_template_directory_uri();?>/images/tongdao.png" width="100%"></a>
		</div>
		<div style="margin-top:4px;">
			<a href="/?p=687"><img src="<?php echo get_template_directory_uri();?>/images/diaoyan.png" width="100%"></a>
		</div>
	</div>
</div>
<!--榜单发布&&论坛人物-->
<div class="row-fluid">
	<div class="span8">
		<div class="col-head">
			<span class="col-title">榜单发布</span>
			<a class="col-more" href="/?cat=5">更多</a>
		</div>
		<div class="col-body">
			<div class="span6">
				<h3 class=""><a href="/?p=510"><?php echo get_the_title(510); ?></a></h3>
				<div class="text-center"><?php echo get_the_post_thumbnail(510); ?></div>
			</div>
			<div class="span6 pull-right">
				<?php $posts = query_posts("cat=5&showposts=3"); ?>
				<?php while (have_posts()) : the_post(); ?>
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<p><?php if ($post->post_excerpt) { echo $post->post_excerpt;
						} else {
						echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 120,""); 
						}?>
					</p> <?php endwhile; ?>
			</div>
		</div>
	</div>
	<div class="span4">
		<div class="col-head">
			<span class="col-title">论坛人物</span>
			<span class="col-more"><a href="/?cat=14">更多</a></span>
		</div>
		<div class="col-body">
			<div class="row-fluid">
				<?php $posts = query_posts("cat=14&posts_per_page=4&offset=0"); ?>
				<div style="width:100%;float:left;">
				<?php while (have_posts()) : the_post(); ?>
					<?php if (has_post_thumbnail()) : ?>
						<div style="width:20%;float:right;">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail("medium"); ?>
                        </a>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
                <?php wp_reset_query(); ?>
                
				<?php $posts = query_posts("cat=14&posts_per_page=4&offset=4"); ?>
				<div style="width:100%;float:left;">
				<?php while (have_posts()) : the_post(); ?>
					<?php if (has_post_thumbnail()) : ?>
						<div style="width:20%;float:left;">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail("medium"); ?>
                        </a>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
                <?php wp_reset_query(); ?>

				<?php $posts = query_posts("cat=14&posts_per_page=4&offset=8"); ?>
				<div style="width:100%;float:left;">
				<?php while (have_posts()) : the_post(); ?>
					<?php if (has_post_thumbnail()) : ?>
						<div style="width:20%;float:right;">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail("medium"); ?>
                        </a>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
                <?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
</div>
<!--研究借鉴&&视频中心-->
<div class="row-fluid">
	<div class="span8">
		<div class="col-head">
			<span class="col-title">研究借鉴</span>
			<a class="col-more" href="/?cat=6">更多</a>
		</div>
		<div class="col-body">
			<!--图文结合-->
			<div class="row-fluid">
				<?php $posts = query_posts("cat=6&showposts=1&order=asc"); ?>
				<?php if (have_posts()) : the_post(); ?>
				<div class="span3 text-center" style="margint:0;padding:0;">
					<?php if (has_post_thumbnail()) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail("medium"); ?></a>
					<?php endif; ?>
				</div>
				<div class="span9 pull-right">
					<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
					<p><?php if ($post->post_excerpt) {
					echo $post->post_excerpt;
					} else {
					echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 240,""); 
					}?>
					</p>
				</div>
				<?php endif; ?>
				<?php wp_reset_query(); ?>

				<!--标题排列-->
				<?php $posts = query_posts("cat=6&showposts=8&offset=1&order=asc"); ?>
				<?php while (have_posts()) : the_post(); ?>
					<h3 class="half"><a class="title-a" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<?php endwhile;?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>

	<div class="span4">
		<div class="col-head">
			<span class="col-title">视频中心</span>
			<span class="col-more"><a href="/?cat=13">更多</a></span>
		</div>
		<div class="col-body">
			<div class="text-center">
				<?php $posts = query_posts("cat=13&showposts=1&order=desc"); ?>
				<?php if (have_posts()) : the_post(); ?>
				<?php if (has_post_thumbnail()) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail("full"); ?>
				</a>
				<?php else: ?>
				<img src="wp-content/themes/impulse-press/images/video.png">
				<?php endif; ?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
</div>
<!--广告位-->
<div class="row-fluid">
	<div class="span12 text-center">
		<?php if (!dynamic_sidebar('index-ad')) : ?>
		    <h3>广告位</h3>
		<?php endif;  ?>
	</div>
</div>
<!--旅游目的地-->
<div class="row-fluid">
	<div class="col-head">
		<span class="col-title">旅游目的地</span>
		<a class="col-more" href="/?cat=3">更多</a>
	</div>
	<div class="col-body">
		<?php query_posts("cat=3&numberposts=6"); ?>
		<?php while (have_posts()): the_post(); ?>
		<div class="third">
			<div class="span6 text-center topbot">
				<?php if (has_post_thumbnail()) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail("medium"); ?>
				</a>
				<?php endif; ?>
			</div>
			<div class="span6 letrig">
				<h3><a class="title-a" href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h3>
				<p><?php if ($post->post_excerpt) {
						echo $post->post_excerpt;
					} else {
						echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 75,""); 
					}?></p>
			</div>
		</div>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</div>
</div>
<!--友情链接-->
<div class="row-fluid">
	<h3>友情链接</h3>
	<?php dynamic_sidebar('partner-list');?>
</div>


<?php get_footer(); ?>