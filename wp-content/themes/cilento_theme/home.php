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
		<?php $args = array( 
			'post_type' => 'session_page',
			'posts_per_page' => 10,
			'id' => 'home-images',
			'orderby' => 'menu_order',
			'order' => 'ASC'
			);
			$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?>
					<?php echo '<div class="entry-content">'; ?>
					<ul>
						<a href="<?php the_permalink(); ?>"><li id="home-image"><?php the_post_thumbnail(); } ?></li></a>
						<a href="<?php the_permalink(); ?>"><h2 id="home-text"><?php the_title(); ?></h2></a>
					</ul>
				<?php endwhile; ?>

	</div><!-- #content -->
</div><!-- #primary -->

<div id="home-footer">
	<?php get_footer(); ?>
</div>
