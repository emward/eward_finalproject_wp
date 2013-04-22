<?php
/*
Template Name: Session Page
*/
?>

<?php
/**
 * The Template for displaying all single posts.
 *
 * @package cilento_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

				<div id="senior-page-text">
					<?php while ( have_posts() ) : the_post(); ?>
					<?php endwhile; // end of the loop. ?>
				</div>

				<h1><?php the_title(); ?></h1>

				<div id="social-links">
					
					<img id="facebook" src="<?php the_field('facebook_icon'); ?>" />
					<img id="twitter" src="<?php the_field('twitter_icon'); ?>" />

				</div>

				<div id="senior-slideshow" class="shadow">
					<?php
						$images = get_field('session_slideshow');
							if( $images ): ?>
								<div id="slider" class="flexslider">
									<ul class="slides">
										<?php foreach( $images as $image ): ?>
											<li>
												<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
												<p class="flex-caption"><?php echo $image['caption']; ?></p>
											</li>
										<?php endforeach; ?>
									</ul>
				</div>
				<?php endif; ?>

				</div>

				<div id="seniors-description">
					<?php the_field('section_description'); ?>
				</div>

				<div id="in-studio">
					<?php the_field('session_type_1'); ?>
				</div>

				<div id="on-location">
					<?php the_field('session_type_2'); ?>
				</div>

				<div id="combination">
					<?php the_field('session_type_3'); ?>
				</div>

				<div id="aside">
					<?php the_field('foot_note'); ?>
				</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>