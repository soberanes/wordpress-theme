<?php
/**
 * @package WordPress
 * @subpackage Almeida-Mireles
 */

get_header(); ?>
<div id="primary">
	<div id="content">
	
			<?php get_template_part( 'loop', 'index' ); ?>
			<?php //echo do_shortcode("[isotope-posts]"); ?>	
	</div>
	<!-- #content -->
	<?php get_sidebar(); ?>
</div><!-- #primary -->


<?php get_footer(); ?>