<?php get_header(); ?>

<div class="shock-hero-container pt-36 pb-12 mb-12 bgprimary">
	<div class="hero-inner md-container">
		<h1 class="bg-secondary">
			<span class="text-primary"><?php the_title();?></span>
		</h1>
	</div>
</div>

<main class="md-container" id="shock-main-page-content">
	<div class="shock-content-container">
		<?php the_content(); ?>
	</div>
</main>

<?php get_footer(); ?>