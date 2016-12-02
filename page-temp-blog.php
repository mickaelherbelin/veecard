<?php
/*
Template Name: Blog
*/
get_header(); ?>


		<div class="column-left">

			<h1><?php the_title() ?></h1>

			<?php
			// WP 3.0 PAGED BUG FIX
			if ( get_query_var('paged') )
			$paged = get_query_var('paged');
			elseif ( get_query_var('page') )
			$paged = get_query_var('page');
			else
			$paged = 1;

			$args = array(
			'post_type' => 'post',
			'paged' => $paged );

			query_posts($args);
			?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

				<?php if(has_post_thumbnail()): the_post_thumbnail('thumbnail', array('class'=>'blog-thumb')); ?><?php endif; ?>

				<header>
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<div class="meta">
						<?php echo get_the_date(); ?> | <?php the_category(', '); ?><?php //_e('by','site5framework') ?> <?php //the_author(); ?>
					</div>
				</header>

				<?php the_excerpt(); ?>

			</article>

			<?php endwhile; ?>


			<!-- begin #pagination -->
				<?php if (function_exists("emm_paginate")) {
						emm_paginate();
					 } else { ?>
				<div class="navigation">
			        <div class="alignleft"><?php next_posts_link('Older') ?></div>
			        <div class="alignright"><?php previous_posts_link('Newer') ?></div>
			    </div>
		    <?php } ?>
		    <!-- end #pagination -->

			<?php endif;?>
            
		<?php wp_reset_query(); ?>
        <a class="twitter-timeline" href="https://twitter.com/mickaelherbelin" data-widget-id="513733958740107265">Tweets de @mickaelherbelin</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>

		<div class="column-right">
		<?php get_sidebar(); ?>
		</div>

<?php get_footer(); ?>