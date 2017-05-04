<?php get_header(); ?>

<div class="blog">
	<div class="wrap">
		<h2>BLOG</h2>

		<div class="box-liste-posts">
			
			<?php 
				$args = array('post_type'=>'post', 'showposts'=> 2);
				$my_posts = get_posts( $args );
			 ?>
			<?php $cont = 1; if( $my_posts ) : foreach( $my_posts as $post ) : setup_postdata( $post ); ?>
				<div class="liste-posts <?php if( $cont == 2 ) echo "segundo-post"; ?>">
					
					<?php the_post_thumbnail(); ?>
						
					<div class="box-content-post">
						<h2><?php the_title(); ?></h2>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="custom-boton">More</a>
					</div>
				</div>
			<?php $cont ++ ; endforeach; endif; ?>
		</div>
	</div>
</div>

<!-- ROMPE DIV -->
<div class="clear"></div>

<div class="galeria">
	<div class="wrap">
			<?php 
				$args = array('post_type'=>'page', 'pagename'=>'galeria');
				$my_page = get_posts( $args );
			 ?>
			<?php $cont = 1; if( $my_page ) : foreach( $my_page as $post ) : setup_postdata( $post ); ?>

			<?php the_content(); ?>

			<?php $images = easy_image_gallery_get_image_ids(); ?>
			<?php if($images) : foreach ( $images as $attachment_id ):?>
				<?php $imagefull = wp_get_attachment_image_src ( $attachment_id, '' ); ?>
				<?php $image = wp_get_attachment_image_src ( $attachment_id, 'thumb-custom' ); ?>

			<a class="fancybox" rel="gallery1" href="<?php echo $imagefull[0]; ?>">
					
				<img src="<?php echo $image[0]; ?>">

			</a>

			<?php endforeach; endif; ?>	

		<?php $cont ++ ; endforeach; endif; ?>
	</div>
</div>

<div class="videos">
	<div class="wrap2">
	   <h2>Videos</h2>
		
		<ul class="bxslider">
		 	<!-- LOOP de Video youtube -->
			<?php 
				$args = array('post_type'=>'videos', 'showposts'=> 10);
				$my_slide_video = get_posts( $args );
			?>
			<?php if( $my_slide_video ) : foreach( $my_slide_video as $post ) : setup_postdata( $post ); ?>
			        
			    <?php
			        $textDescription = get_field('link_youtube');
			        $parsed     = parse_url($textDescription);
			        $hostname   = $parsed['host'];
			        $query      = $parsed['query'];
			        $path       = $parsed['path'];
			        $Arr = explode('v=',$query);
			        $videoIDwithString = $Arr[1];
			        $videoID = substr($videoIDwithString,0,11); // 5sRDHnTApSw
			        if( (isset($videoID)) && (isset($hostname)) && ($hostname=='www.youtube.com' || $hostname=='youtube.com')){?>
			            <li><iframe width="707" height="375" src="http://www.youtube.com/embed/<?php echo $videoID; ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe></li>
			    <?php }?>

			<?php endforeach; endif; wp_reset_postdata(); ?>

		</ul>

	</div>
</div>


<?php get_footer(); ?>