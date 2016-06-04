<?php get_header(); ?>

<div class="row">

	<div class="col-md-8">
	
	<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="col-md-12">
				<h1><?php the_title(); ?></h1>	
				<p><em><?php the_time('l, F jS, Y'); ?></em></p>
				
				<?php the_content(); ?>
				<hr />
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<?php 
					
					$fields = Array(
						'author' => '<div class="form-group">
							<label class="sr-only">'. __('Name', 'domainreference').'</label>
							<input class="form-control input-sm" id="author" placeholder="Name" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" '.$aria_req.'>
						</div>',
						
						'email' => '<div class="form-group">
							<label class="sr-only">'. __('Email', 'domainreference').'</label>
							<input class="form-control input-sm" id="email" placeholder="Email" name="email" type="email" value="'.esc_attr($commenter['comment_author_email']).'" '.$aria_req.'>
						</div>',
						
						'url' => '<div class="form-group">
							<label class="sr-only">'. __('Website', 'domainreference').'</label>
							<input class="form-control input-sm" id="url" placeholder="Website" name="url" type="text" value="'.esc_attr($commenter['comment_author_url']).'">
						</div>',
						
					);
					
					$args = Array(
						'fields' => $fields,
						'comment_field' => '<div class="form-group">
							<label class="sr-only">'. __('Comment', 'noun').'</label>
							<textarea class="form-control input-sm" id="comment" placeholder="Comment" name="comment" aria-required="true" rows="8"></textarea>
						</div>',

					);
					
					comment_form($args); 
					
				?>
			</div>
		</div>

	<?php endwhile; else: ?>
		<p><?php _e("Sorry, this page does not exist."); ?></p>
	<?php endif; ?>

	</div>
	
	<div class="col-md-4">
		<div class="row">
			<ul class="list-group">
				<?php get_sidebar(); ?>
			</ul>
		</div>
	</div>
	
</div>

<?php get_footer(); ?>