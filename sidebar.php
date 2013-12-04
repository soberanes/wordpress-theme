<?php
/**
 * @package WordPress
 * @subpackage Almeida-Mireles
 */
?>
		<div id="navigation" class="widget-area">
			<div class="base_menu">
				<div id="pull_menu" class="pull"></div>
				<div id="menu" class="content_menu" >
					<span id="push_menu" class="push"></span>
					<div id="post_button"></div>
					<div class="categories">
						<ul class="menu_items">
							<li class="menswear">
								<a href="#" id="menswear" class="anchor" >Menswear</a>
							</li>
							<li class="art-design">
								<a href="#" id="art-design" class="anchor">Art &amp; Design</a>
							</li>
							<li class="architecture">
								<a href="#" id="architecture" class="anchor">Architecture</a>
							</li>
							<li class="photography">
								<a href="#"id="photography" class="anchor">Photography</a>
							</li>
							<li class="block"> - </li>
							<li class="about-us">
								<a href="<?= get_page_link(188);?>" id="about-us" class="anchor">About Us</a>
							</li>
							<li class="contact">
								<a href="#" id="contact" class="anchor">Contact</a>
							</li>
						</ul>
						<ul class="menu_items_childs">
							<ul id="menswear_ul">
								<?php wp_list_categories('orderby=id&child_of=6&&title_li='); ?>
							</ul>
							<ul id="art-design_ul">
								<?php wp_list_categories('orderby=id&child_of=7&&title_li='); ?>
							</ul>
							<ul id="architecture_ul">
								<?php wp_list_categories('orderby=id&child_of=8&&title_li='); ?>
							</ul>
							<ul id="photography_ul">
								<?php wp_list_categories('orderby=id&child_of=9&&title_li='); ?>
							</ul>
						</ul>
						<div class="clearfix"></div>
						<span class="separator"></span>
						<div class="clearfix"></div>
						<?php echo do_shortcode("[hoppercat]"); ?>
					</div>
				</div>
				<div class="logo"></div>
			</div>
		</div><!-- #secondary .widget-area -->