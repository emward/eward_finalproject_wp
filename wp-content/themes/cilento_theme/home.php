<?php

/*
Template Name: Home Page
*/

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package cilento_theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			<?php endwhile; // end of the loop. ?>

		<div id="seniors-main">
				<img src="<?php the_field('feature_image_1'); ?>" />
				<?php the_field('session_type_1'); ?>
		</div>
		
		<div id="family-main">
			<img src="<?php the_field('feature_image_2'); ?>" />
			<?php the_field('session_type_2'); ?>
		</div>

		<div id="wedding-main">
			<img src="<?php the_field('feature_image_3'); ?>" />
			<?php the_field('session_type_3'); ?>
		</div>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
