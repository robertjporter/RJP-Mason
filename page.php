<?php 
	get_header();

		if (have_posts()) :
			while (have_posts()) : the_post();
	?>
	<div class="banner-buffer"> </div>
		<article class="post page centered">
			<div class="page_content">
				<h2> 
					<?php the_title(); ?> 
				</h2>
				<p>
					<?php the_content(); ?>
				</p>
			</div>
		</article>
	</br>
		
	<?php 
		endwhile;
			
		else :
			echo '<p>No content found</p>';
		endif;
	?>
	
	<!-- CONTACT FORM-->
	<?php //RJP_Contact_section()	
	echo do_shortcode( '[sitepoint_contact_form]' );
	?>

<br>
<br>
	
	<?php	
	get_footer();
	
?>