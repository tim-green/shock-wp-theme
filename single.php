<?php get_header(); ?>

<main id="content-wrapper">

	<?php
	while ( have_posts() ) :
		the_post();
		?>
	
	<div class="container">

		<?php grnd_breadcrumbs(); ?>

		<div class="row py-5">

			<div id="article-wrapper" class="col">       

				<?php get_template_part( 'templates/content/single', '' ); ?>

				<nav class="nav">
					<?php
					previous_post_link( '<span class="nav-link me-auto">&laquo; %link</span>' );
						next_post_link( '<span class="nav-link ms-auto">%link &raquo;</span>' );
					?>
				</nav>
					
				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template(); }
				?>
			
			</div> <!-- #article-wrapper -->

			<?php get_sidebar(); ?>

		</div>

<?php 
get_header(); 
get_template_part( "template/parts/elements/page-header", "", array(
	"title" => get_the_title(),
	"subtitle" => get_field("subtitle"),
	"featured_image" => get_field("different_hero_image")["url"] ?? get_the_post_thumbnail_url()
	));
?>
	</div>
  
	<?php endwhile ?>

</main> <!-- #content-wrapper -->

<?php
get_footer();
