<form method="get" class="form-search pull-right" action="<?php echo esc_url( home_url() ); ?>">
	<div class="input-group">
		<input type="text" class="form-control search-query" name="s"/>
		<span class="input-group-btn">
		<button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="<?php esc_attr_e('Go', 'impulse-press'); ?>">搜索</button>
		</span>
	</div>
</form>