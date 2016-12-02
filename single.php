<?php get_header(); ?>
	<div class="column-left">
           <article>
    
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
                <header>
                    <h1><?php the_title(); ?></h1>
    
                <div class="meta"><?php echo get_the_date(); ?><?php //_e('by','site5framework') ?> <?php //the_author(); ?>, <?php _e('category','site5framework') ?> <?php the_category(', '); ?></div>
    
                </header>
    
                <?php the_content(); ?>
                <?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
                    <?php if( $attachments->exist() ) : ?>
                      <h3>Document(s) li&eacute;(s)</h3>
                      <ul>
                        <?php while( $attachments->get() ) : ?>
                          <li class="attachment">
                            <?php echo $attachments->image( 'thumbnail' ); ?>&nbsp;<a href="<?php echo $attachments->url(); ?>" title="<?php echo $attachments->field( 'title' ); ?>" target="_blank"><?php echo $attachments->field( 'title' ); ?></a>&nbsp;(<?php echo $attachments->type(); ?> - <?php echo $attachments->filesize(); ?>)
                          </li>
                        <?php endwhile; ?>
                      </ul>
                    <?php endif; ?> 	
                     <div class="navigation clearfix">
                        <div class="alignright"><?php next_post_link( '%link', '%title &raquo;' ); ?></div>
                        <div class="alignleft"><?php previous_post_link( '%link', '&laquo; %title' ); ?></div>
                     </div>
    
                 </div>
    
                <?php endwhile; ?>
    
                <?php //comments_template(); ?>
    
                <?php endif;?>
    
            </article>
        
        </div>

		<div class="column-right">
		<?php get_sidebar(); ?>
        <a class="twitter-timeline" href="https://twitter.com/mickaelherbelin" data-widget-id="513733958740107265">Tweets de @mickaelherbelin</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
<?php get_footer(); ?>