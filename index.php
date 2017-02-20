<?php get_header(); ?>
<div id="home"></div>

	<!-- HEADER SLIDER-->
	<?php get_sidebar( 'top_posts_slider' ); ?>

	<!-- -----------------MAIN BODY CONTENT-------------------- -->
<div class="site-content">
	
	
	<!-- PRODUCTS BLOG --> 
	
	<?php //get_sidebar( 'mason_blog' ); ?>
	
	<!-- MASON BLOG --> 
	<div class="mason-blog">
	<?php RJP_MasonBlog_section() ?>
	</div>
	
	<!-- TESTEMONIALS-->
	<?php RJP_testemonials_section() ?>
	<br>
	
	<!-- CONTACT FORM-->
	<?php //RJP_Contact_section()	
	//echo do_shortcode( '[sitepoint_contact_form]' );
	?>
	
	<div class="RJP_conatact_form_7 centered">
	<?php 
		echo do_shortcode( '[contact-form-7 id="1234" title="Contact form 1"]' ); 
	?>
	</div>
	
</div>

<div class="nav-buffer"  id="footer"></div>

<?php get_footer(); ?>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	