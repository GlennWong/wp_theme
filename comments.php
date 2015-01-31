<?php if (post_password_required()) { ?>
    <p><?php echo '文章已经加密，不允许评论'; ?></p>
<?php return; } ?>


<?php if (have_comments()) : ?>

    <h3 id="comments"><?php comments_number(__('暂无评论'), __('1 个评论'), __('% 个评论')); ?></h3>
	<hr>
	
	<ol class="commentlist">
		<?php wp_list_comments('avatar_size=60&type=comment'); ?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="navigation">
			<div class="previous"><?php previous_comments_link(__( '上一页' )); ?></div><!-- end of .previous -->
			<div class="next"><?php next_comments_link(__( '下一页', 0 )); ?></div><!-- end of .next -->
		</div><!-- end of.navigation -->
	<?php endif; ?>

<?php endif; ?>


<?php if (comments_open()) :
    echo "<hr>";
    $fields = array(
			'author' =>
				'<div class="control-group">' .
				'<label for="author">姓名：</label>'.
				'<input type="text" id="author" name="author">'.
				'</div>',
			'email' =>
				'<div class="control-group">'.
				'<label for="email">邮箱：</label>'.
				'<input type="text" id="email" name="email">'.
				'</div>',
    );

    $args = array(
			'id_form' => 'commentform',
			'fields' => apply_filters('comment_form_default_fields', $fields),
			'comment_field'  =>
				'<div class="control-group">'.
				'<label for="comment">添加评论：</label>'.
				'<textarea id="comment" class="input-block-level" name="comment" rows="3"></textarea>'.
				'</div>',
			'comment_notes_before' => '',//去除您的信息不会被公开
			'comment_notes_after' => ''//去除使用html标签提示
    );
    comment_form($args);
?>
<?php endif; ?>