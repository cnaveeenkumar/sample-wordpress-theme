<?php get_header();?>
    <div class="wptheme-container">
    	<div class="container">
            <div class="row">
                <div class="<?php if ( is_active_sidebar() ) { ?>col-sm-8<?php } else { ?>col-sm-12<?php } ?>">
					<?php if( have_posts() ) { the_post(); ?>
						<div id="post-<?php the_ID();?>" <?php post_class(); ?>>
							<h3><?php The_title(); ?></h3>
							<?php if ( has_post_thumbnail() ) { ?>
							<div class="wptheme-image">
								<?php the_post_thumbnail('full',array('class'=>'img-responsive'));?>
							</div>
							<?php } ?>
							<div class="wptheme-content">
								<?php wpautop(the_content());?>
							</div>
							<div class="clearfix"></div>
						</div>
					<?php } ?>
					<?php wp_reset_postdata(); ?>
                </div>
                <?php if ( is_active_sidebar() ) { ?>
                 <div class="col-sm-4">
                     <?php get_sidebar(); ?>    
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php get_footer();?>