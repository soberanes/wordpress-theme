<?php
/**
 * @package WordPress
 * @subpackage Almeida-Mireles
 */

get_header(); ?>

		<div id="page_about">
			<div id="content_about">
				<p id="text_about">
					<?php 
						$page = get_post(188, ARRAY_A);
						$content = $page['post_content'];

						echo $content;
					?>
				</p>
				<a href="<?= get_bloginfo('url').'?ref=logo'; ?>" id="logo_about"></a>
			</div>
		</div><!-- #primary -->
<?php get_footer(); ?>