<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<?php 
	if(!isset($args["navbar"])){
		get_template_part("template_parts/elements/navbar", "", array("isFrontpage" => is_frontpage()));
	}
?>

<body <?php body_class(); ?>> 
<?php wp_body_open(); ?>

<div id="main-content">
	<div id="main-content-menu-filtter" class="fixed h-full w-full top-0 left-0 bg-black bg-opacity-40" style="visibility: hidden">
	</div>
