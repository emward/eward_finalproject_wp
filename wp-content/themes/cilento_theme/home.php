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
			'id' => 'home-image',
			'orderby' => 'menu_order',
			'order' => 'ASC'
			);
			$loop = new WP_Query( $args ); ?>
				<ul>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<li class="session-thumb">
					<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>"><div class="home-image"><?php the_post_thumbnail();?></div></a>
					<?php endif; ?>  
					<a href="<?php the_permalink(); ?>"><h2 id="home-text"><?php the_title(); ?></h2></a>
					</li>
					<?php endwhile; ?>
				</ul>

	</div><!-- #content -->
</div><!-- #primary -->

<div id="home-footer">
	<?php get_footer(); ?>
</div>
