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

					<div id="slideshow">
						<?php do_action('slideshow_deploy'); ?>
					</div>

				<div id="session-description">
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