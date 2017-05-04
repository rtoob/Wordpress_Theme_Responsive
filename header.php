<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	
	<!-- Add jQuery library -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
	<!-- Add fancyBox -->
 	<link rel="stylesheet" href="assets/fancybox/dist/jquery.fancybox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="assets/fancybox/dist/jquery.fancybox.js"></script>

    <!-- bxSlider Javascript file -->
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.bxslider.min.js"></script>
	<!-- bxSlider CSS file -->
	<link href="<?php bloginfo('template_directory'); ?>/assets/css/jquery.bxslider.css" rel="stylesheet" />

	<!-- CSS stylesheet for sliding-swipe-menu -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/slide-and-swipe-menu.css">
	
	<!-- touchSwipe library -->
     <script src="http://labs.rampinteractive.co.uk/touchSwipe/jquery.touchSwipe.min.js"></script>

    <!-- Slider Javascript file -->
     <script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.slideandswipe.min.js"></script>

	<?php wp_head(); ?>
</head>
<body>

 <nav class="nav">
 	<?php 
 		wp_nav_menu('menu');
 	 ?>
 </nav>

<?php 
	if(is_home()):
 ?>
<div class="header">
	<div class="wrap">
		<h1><a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>">RAFATUB</a></h1>
			<!-- MENU -->
		<div class="menu-topo">
			<a href="#" class="ssm-toggle-nav" title="open nav">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</a>
		</div>
		<div class="infor">

		<?php 
		$args = array('post_type' => 'page', 'pagename' => 'about');
		$my_page = get_posts( $args );
		 ?>
		 <?php if($my_page) : foreach( $my_page as $post ) : setup_postdata( $post ); ?>

		 	<h2><?php the_title(); ?></h2>
		 	<?php the_excerpt(); ?>

		 	<a href="<?php the_permalink(); ?>" class="custom-boton">Read More</a>
		 <?php endforeach; ?>

		<?php else: ?>
			<p>No existe contenido para tal pagina.</p>
		<?php endif; ?>
		
		</div>

	</div>
</div>
<?php 
	else:
 ?>
	<div class="header-page">
		<div class="wrap">
			<h1><a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>">RAFATUB</a></h1>
		<!-- MENU -->
		<div class="menu-topo menu-inter">
				<a href="#" class="ssm-toggle-nav" title="open nav">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				</a>
			</div>
			<div class="clear"></div>
		</div>
		<div class="bg-page">
			<div class="wrap">
				<?php if(is_category()): ?>
				<h2>Blog</h2>
			<?php else: ?>
				<h2><?php the_title(); ?></h2>
			<?php endif; ?>
				<?php wp_custom_breadcrumbs(); ?>
			</div>	
		</div>
	</div>
<?php 
	endif;
 ?>

	
