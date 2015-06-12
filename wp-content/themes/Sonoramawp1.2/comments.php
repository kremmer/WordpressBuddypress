<div class="comments-wrap" id="conversation">
	<?php comment_form(); ?>
	<div class="clear"></div>
	<h6 id="comments-title">
		<?php _e("Comments",'jellythemes'); ?> <span>( <?php comments_number('0','1','%'); ?> )</span>
	</h6>
	<ul class="comment-content">
		<?php wp_list_comments(array("callback"=> "jellythemes_comments_format")); ?>
	</ul>
	<div class="clear"></div>
	<?php paginate_comments_links(); ?>



	<!--end comments wrap-->
</div>
