<?php 
	query_posts("cat=-2");
	if(have_posts()): while(have_posts()): the_post(); 
			
			if (has_term( '', 'imagen', $post->ID )) {
				    
				$taxonomies = get_the_terms($post->ID, 'imagen');
				$length_terms = count($taxonomies);
				
				if ( $length_terms > 1 ) { // si tiene más de una taxonomía
			        continue;
			    }

				//Get the categories
				$labels = "item ";
				$categories = "";
			    foreach((get_the_category()) as $category){
					$labels .= " ".$category->slug;
					$categories .= "<span data-href='".$category->term_id."'>".$category->name."</span><br/>";
					$link_cat = $category->term_id;
				}
				
				foreach ( $taxonomies as $term ) {
					$class = "term_".$term->slug;

		        	if ( has_post_thumbnail() ) { ?>
		        	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
		            <a href="#post-<?php print $post->ID; ?>" class="open-popup-link click <?php print $labels; ?> post"
		            	rel="lightbox[inline]" data-href="?p=<?php print $post->ID; ?>" >
		            	<article class="post <?php print $class; ?>"
			            	style="background: url(<?php print $url; ?>) no-repeat;" >
			            	
			        	</article>
			        	<div id="post-<?php print $post->ID; ?>" class="white-popup mfp-hide" data-size="<?php print $term->slug; ?>" >
							<div class="img_container">
								<div class="img" style="background: url(<?php print $url; ?>) no-repeat;display: inline-block;"></div>
							</div>
							<div class="img_details">
								<div class="tag"></div>
								<div class="article_text">
									<h3 class="titulo"><?php echo get_the_title($post->ID); ?> </h3>
									<p>-</p>
									<div class="left">
										<p class="details">Published by <?php the_author(); ?> - <br /><?php the_time('F j, Y'); ?></p>
									</div>
								</div>
								<div class="social_button">
									<p class="like fb-like">
									</p>
									<div class="pinterest" data-href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>
										&media=<?php print $url; ?>&description=Alemida Mireles" data-pin-do="buttonPin" data-pin-config="beside">
										
									</div>
									<div class="facebook" data-href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"></div>
									<div class="twitter" 
											data-href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>
											&text=I want to share this amazing photo: <?php the_permalink(); ?>&via=almeida_mireles">
									</div>
									<div class="mail" data-href="mailto:?subject=Almeida Mireles&body=I want to share this amazing photo: <?php the_permalink(); ?>.">
										
									</div>
									
								</div>
							</div>
							
						</div>
		            </a>
					<?php 
					}
				}

			}else{
				continue;
			}

	endwhile; 
	endif;
?>