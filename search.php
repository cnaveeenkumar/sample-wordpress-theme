<?php get_header();?>
     <div class="wptheme-container">
    	<div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php if( have_posts() ){ ?>
						<h3><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
						<?php while( have_posts()){ the_post();?>                        
							<h3><?php The_title(); ?></h3>
							<?php if ( has_post_thumbnail() ) { ?>
							<div class="wptheme-image">
								<?php the_post_thumbnail('thumbnail',array('class'=>'img-responsive'));?>
							</div>
							<?php } ?>
							<div class="wptheme-content">
								<?php wpautop(the_excerpt());?>
							</div>
							<div class="clearfix"></div>
							<a href="<?php the_permalink();?>" class="btn btn-default">Read More</a>
						<?php } ?>
                    <?php } else { ?>
                        <h3><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
                        <div class="text-center">
                            <h3>Nothing Found Here...!</h3>
                            <h3>Please try Again...!</h3>
							<?php get_search_form(); ?>
                         </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();?>