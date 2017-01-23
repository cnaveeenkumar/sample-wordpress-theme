<?php get_header();?>
    <div class="wptheme-container">
    	<div class="container">
            <div class="row">
                <div class="col-sm-12">
					<?php if( have_posts() ) { the_post(); ?>
						<div id="page-<?php the_ID();?>">
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
            </div>
        </div>
    </div>
<?php get_footer();?>